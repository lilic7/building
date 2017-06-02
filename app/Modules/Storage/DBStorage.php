<?php
/**
 * Created by PhpStorm.
 * User: devLilic
 * Date: 27-May-17
 * Time: 09:16
 */

namespace App\Modules\Storage;


use App\Color;
use App\Component;
use App\UserProject;
use App\UserSettings;
use App\Work;
use App\WorksList;
use Illuminate\Support\Facades\Auth;

class DBStorage extends StorageAbstract
{
    function getSettings()
    {
        $settings = UserSettings::where('user_id', Auth::id())->first();

        return [
            'country_id'    => isset($settings->country_id) ? $settings->country_id : null,
            'currency_id'   => isset($settings->currency_id) ? $settings->currency_id : null
        ];
    }

    function saveSettings($country, $currency)
    {
        $u_settings = UserSettings::firstOrNew(['user_id' => Auth::id()]);

        $u_settings->country_id     = $country;
        $u_settings->currency_id    = $currency;

        $u_settings->save();
    }

    function getProject()
    {
        return UserProject::where('user_id', Auth::id())->first();
    }

    function saveProject($projectId)
    {
        $u_project = UserProject::firstOrNew(['user_id' => Auth::id()]);

        $u_project->user_id = Auth::id();
        $u_project->building_id = $projectId;

        $u_project->save();

        return $u_project->id;
    }

    function updateProject($request, $countWorks)
    {
        $project = UserProject::where('user_id', Auth::id())->first();

        $project->windows       = $request->windows_number ? $request->windows_number : 0;
        $project->doors         = $request->doors_number ? $request->doors_number : 0;
        $project->color_id      = $request->color;
        $project->material_id   = $request->material;
        $project->with_works    = $countWorks ? true : false;

        $project->save();
    }

    function getWorkList()
    {
        $project =$this->getProject();
        $list = WorksList::where('project_id', $project->id)->select('work_id')->get();
        $ids = [];

        if($list)
        {
            foreach ($list as $work)
            {
                array_push($ids, $work->work_id);
            }
        }

        return $ids;
    }

    function deleteProject()
    {
        UserProject::where('user_id', Auth::id())->delete();
    }

    function setWork($work_id)
    {
        //selectam lucrarea care trebuie efectuata
        $workToEdit = Work::where('id', $work_id)->first();
        $project = $this->getProject();

        // verificam daca aceasta lucrare nu a fost setata mai devreme
        $workItem =  WorksList::where([
            ['project_id', $project->id],
            ['work_category_id', $workToEdit->category->id]
        ])->first();

        // daca a fost setata, o modificam pe aceasta,
        // in caz contrar, adaugam o inregistrare noua
        $work = $workItem ? $workItem : new WorksList;

        $work->project_id = $project->id;
        $work->work_id = $work_id;
        $work->work_category_id = $workToEdit->category->id;
        $work->save();
    }

    function removeAllWorks()
    {
        $project = $this->getProject();

        WorksList::where('project_id', $project->id)->delete();
    }

    function getBuildingPrice()
    {
        $project = $this->getProject();
        return $project->building->price;
    }

    function getBuildingCategory()
    {
        $project = $this->getProject();
        return $project->building->category->category;
    }

    function getBuildingType()
    {
        $project = $this->getProject();
        return $project->building->type;
    }

    function getRatio()
    {
        $settings = UserSettings::where('user_id', Auth::id())->first();
        return $settings->currency->ratio;
    }

    function getColorPrice()
    {
        $project = $this->getProject();
        return $project->color->price;
    }

    function getMaterialPrice()
    {
        $project = $this->getProject();
        return $project->material->price;
    }

    function getWindowPrice()
    {
        $window = Component::where('component', 'window')->first();
        return $window->price;
    }

    function getDoorPrice()
    {
        $door = Component::where('component', 'door')->first();
        return $door->price;
    }

    function getColorName()
    {
        $project = $this->getProject();
        return $project->color->color;
    }

    function getMaterialName()
    {
        $project = $this->getProject();
        return $project->material->material;
    }

}