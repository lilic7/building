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
        $this->middleware('auth');
    }

    function index()
    {
        return view('calculator.index');
    }

    function ilc(StorageFactory $storage)
    {
        $vars = [
            'countries'  => Country::all(),
            'currencies' => Currency::all(),
            'selections' => null
        ];

        $user_settings = $storage->create()->getSettings();

        if($user_settings)
        {
            $vars['selections'] = $user_settings;
        }

        return view('calculator.ilc', $vars);
    }

    function ilc_save(Request $request, StorageFactory $storage)
    {
        $storage->create()->saveSettings($request['country'], $request['currency']);

        return redirect()->action('CalcController@sbt');
    }

    function sbt(StorageFactory $storage)
    {

        $vars = [
            'categories'    => BuildingCategory::all(),
            'building_id'   => null
        ];

        $project = $storage->create()->getProject();

        if($project)
        {
            $vars['building_id'] = $project['building_id'];
        }

        return view('calculator.sbt', $vars);
    }

    function sbt_save(Request $request, StorageFactory $storage)
    {
        foreach ($request->all() as $key=>$id)
            if($key !== '_token' && $id != -1)
            {
                $storage->create()->saveProject($id);
            }
        return redirect()->action('CalcController@dpr');
    }

    function dpr(StorageFactory $storage)
    {


        $vars = [
            'categories'    => WorkCategory::with('works')->get(),
            'colors'        => Color::all(),
            'materials'     => Material::all(),
            'project'       => null,
            'works'         => null
        ];

        $project = $storage->create()->getProject();

        if ($project)
        {
            $works = $storage->create()->getWorkList();

            $vars['project']    = $project;
            $vars['works']      = $works;
        }

        return view('calculator.dpr', $vars);
    }

    function dpr_save(Request $request, StorageFactory $storage)
    {
        $workCategories = WorkCategory::all();

        $project = $storage->create()->getProject();

        if(!$project){
            return redirect()->action('CalcController@index')
                            ->with('message', "You have to select a building first");
        }

        $countWorks = 0;

        $storage->create()->removeAllWorks();

        foreach ($workCategories as $category)
        {
            $work_id = $request[$category->short_name];
            if($work_id)
            {
                $storage->create()->setWork($work_id);
                $countWorks++;
            }
        }
        $storage->create()->updateProject($request, $countWorks);

        return redirect()->action('CalcController@cpc');
    }

    function cpc(StorageFactory $storage)
    {
        $storage    = $storage->create();

        $project    = $storage->getProject();

        if(!$project)
        {
            return redirect()   ->action('CalcController@index')
                                ->with('message', 'You don\'t have any projects');
        }

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

        $settings = $storage->getSettings();

        $currency = Currency::where('id', $settings['currency_id'])->first();

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

    function delete_project(StorageFactory $storage)
    {
        $storage->create()->deleteProject();

        return redirect()->action('CalcController@index');
    }

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