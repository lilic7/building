<?php

namespace App\Http\Controllers;

use App\BuildingCategory;
use App\Color;
use App\Component;
use App\Country;
use App\Currency;
use App\Material;
use App\Modules\Storage\StorageFactory;
use App\Work;
use App\WorkCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CalcController extends Controller
{
    private $storage = null;

    function __construct()
    {
        // foloseste autentificarea
        $this->middleware('auth');
    }

    function index()
    {
        return view('calculator.index');
    }

    function ilc(StorageFactory $storage)
    {
        // creaza variabilele care vor fi utilizate la afisarea informatiei
        $vars = [
            'countries'  => Country::all(),
            'currencies' => Currency::all(),
            'selections' => null
        ];

        // obtinem setarile utilizatorului curent
        $user_settings = $storage->create()->getSettings();

        // daca exista aceste setari, le pregatim pentru afisare
        if($user_settings)
        {
            $vars['selections'] = $user_settings;
        }

        // generam pagina ilc si transmitem variabilele necesare pentru afisare
        return view('calculator.ilc', $vars);
    }

    // salvam setarile utilizatorului curent
    function ilc_save(Request $request, StorageFactory $storage)
    {
        // salvam in sursa de stocare (DB sau SESSION) tara si valuta selectate
        $storage->create()->saveSettings($request['country'], $request['currency']);

        // redirectionam utilizatorul la urmatoarea pagina
        return redirect()->action('CalcController@sbt');
    }

    // pagina selectarii tipului de cladire
    function sbt(StorageFactory $storage)
    {
        // creaza variabilele care vor fi utilizate la afisarea informatiei
        $vars = [
            'categories'    => BuildingCategory::all(),
            'building_id'   => null
        ];

        // identificam proiectul utilizatorului curent
        $project = $storage->create()->getProject();

        // daca exista, il scriem in lista variabilelor necesare pentru afisare in pagina
        if($project)
        {
            $vars['building_id'] = $project['building_id'];
        }

        return view('calculator.sbt', $vars);
    }

    // salvam datele selectate (tipul de cladire) de catre utilizator
    function sbt_save(Request $request, StorageFactory $storage)
    {
        // verificam toate datele transmise din forma pentru a gasi tipu cladirii selectate
        // daca in forma a fost selectat un tip de cladire, $id va fi egal cu id-ul tipului respectiv de cladire
        // celelalte vor fi egale cu -1, adica nu vor fi selectate

        // daca exista o cladire selectata, aceasta va fi salvata in informatia despre proiect
        foreach ($request->all() as $key=>$id)
            if($key !== '_token' && $id != -1)
            {
                $storage->create()->saveProject($id);
            }
        return redirect()->action('CalcController@dpr');
    }

    // pagina unde se vor selecta tipurile de lucrari
    function dpr(StorageFactory $storage)
    {
        // creaza variabilele care vor fi utilizate la afisarea informatiei
        $vars = [
            'categories'    => WorkCategory::with('works')->get(),
            'colors'        => Color::all(),
            'materials'     => Material::all(),
            'project'       => null,
            'works'         => null
        ];

        // identificam proiectul utilizatorului curent
        $project = $storage->create()->getProject();


        if ($project)
        {
            // obtinem lista lucrarilor care pot fi efectuate
            $works = $storage->create()->getWorkList();

            $vars['project']    = $project;
            $vars['works']      = $works;
        }

        return view('calculator.dpr', $vars);
    }

    // salvam tipul lucrarilor selectate
    function dpr_save(Request $request, StorageFactory $storage)
    {
        // selectam categoriile de lucrari
        $workCategories = WorkCategory::all();

        // identificam proiectul utilizatorului curent
        $project = $storage->create()->getProject();

        // daca utilizatorul nu are definit nici un proiect, el va fi redirectioinat la pagina
        // principala a calculatorului si ii va fi afisat mesajul respectiv
        if(!$project){
            return redirect()->action('CalcController@index')
                            ->with('message', "You have to select a building first");
        }

        $countWorks = 0;

        // stergem toate lucrarile care au fost inscrise mai devreme
        // Aceasta se face pentru a nu avea selectate in STORAGE doua tipuri de lucrari la aceeasi categorie
        $storage->create()->removeAllWorks();

        // pentru fiecare categorie de lucrari cautam daca a fost selectat vreun tip de lucrare
        // daca e selectat, il salvam in STORAGE
        foreach ($workCategories as $category)
        {
            $work_id = $request[$category->short_name];
            if($work_id)
            {
                $storage->create()->setWork($work_id);
                $countWorks++;
            }
        }

        // reinoim datele proiectului, adaugand informatia privind cantitatea, materialulsi culoarea usilor si ferestrelor
        $storage->create()->updateProject($request, $countWorks);

        return redirect()->action('CalcController@cpc');
    }

    // pagina de afisare a datelor selectate si calcularea preturilor
    function cpc(StorageFactory $storage)
    {
        // facem o scurtatura pentru crearea variabilei STORAGE
        $storage    = $storage->create();

        // identificam proiectul utilizatorului curent
        $project    = $storage->getProject();

        // daca utilizatorul nu are definit nici un proiect, el va fi redirectioinat la pagina
        // principala a calculatorului si ii va fi afisat mesajul respectiv
        if(!$project)
        {
            return redirect()   ->action('CalcController@index')
                                ->with('message', 'You don\'t have any projects');
        }

        // pregatim variabilele necesare pentru afisare
        $window     = Component::where('component', 'window')->first();
        $door       = Component::where('component', 'door')->first();

        $total      = $storage->getBuildingPrice();
        $ratio      = $storage->getRatio();

        $buildingCategory   = $storage->getBuildingCategory();
        $buildingType       = $storage->getBuildingType();
        $buildingPrice      = $storage->getBuildingPrice();
        $windowPrice        = $storage->getWindowPrice();
        $doorPrice          = $storage->getDoorPrice();
        $color              = $storage->getColorName();
        $colorPrice         = $storage->getColorPrice();
        $material           = $storage->getMaterialName();
        $materialPrice      = $storage->getMaterialPrice();
        $works = [];
        // daca au fost selectate careva lucrari, se calculeaza suma acestor lucrari
        if($project['with_works'])
        {
            $total +=  $this->addToPrice($windowPrice, $project['windows'], $colorPrice, $materialPrice);
            $total +=  $this->addToPrice($doorPrice, $project['doors'], $colorPrice, $materialPrice);

            $work_ids = $storage->getWorkList();

            foreach ($work_ids as $work_id)
            {
                $work = Work::where('id', $work_id)->first();
                array_push($works, $work);
                $total += $work->price;
            }
        }

        // obtinem setarile utilizatorului curent
        $settings = $storage->getSettings();

        // obtinem datete privind valuta selectata de catre utilizator
        $currency = Currency::where('id', $settings['currency_id'])->first();

        // transmitem varibilele necesare reprezentarii in pagina
        return view('calculator.cpc', [
            'buildingCategory'  => $buildingCategory,
            'buildingType'      => $buildingType,
            'buildingPrice'     => $buildingPrice * $ratio,
            'windowPrice'       => $windowPrice * $ratio,
            'doorPrice'         => $doorPrice * $ratio,
            'color'             => $color,
            'colorPrice'        => $colorPrice * $ratio,
            'material'          => $material,
            'materialPrice'     => $materialPrice * $ratio,
            'currency'          => $currency,
            'project'           => $project,
            'works'             => $works,
            'total'             => $total * $ratio,
            'window'            => $window,
            'door'              => $door,
            'ratio'             => $ratio
        ]);
    }

    // stergerea proiectului si informatiei ce tine de acest proiect
    function delete_project(StorageFactory $storage)
    {
        $storage->create()->deleteProject();

        return redirect()->action('CalcController@index');
    }

    // functie privata de calculare a sumei pentru fereste sau usi, luand in cosideratie si materialul si culoarea selectate
    private function addToPrice($priceForPiece, $pieces, $colorPrice, $materialPrice)
    {
        $price = 0;

        if ($pieces)
        {
            $price += ($priceForPiece  + $colorPrice + $materialPrice) * $pieces;
        }

        return $price;
    }
}