<?php
/**
 * Created by PhpStorm.
 * User: devLilic
 * Date: 27-May-17
 * Time: 09:17
 */

namespace App\Modules\Storage;

use App\Building;
use App\Color;
use App\Component;
use App\Country;
use App\Currency;
use App\Material;
use App\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionStorage extends StorageAbstract
{
    private $project;

    public function __construct()
    {
        $project = [
            'building_id'   => 0,
            'country_id'    => null,
            'currency_id'   => null,
            'windows'       => 0,
            'doors'         => 0,
            'color_id'      => null,
            'material_id'   => null,
            'with_works'    => false,
            'works'         => [],
            'work_cat_ids'  => []
        ];

        $this->project = session('project') ? session('project') : $project;

//        dd($this->project);
    }

    public function save()
    {
        session([
            'project' => $this->project
        ]);
    }

    function getSettings(){
        if(!$this->project['country_id'] || !$this->project['currency_id'])
        {
            return null;
        }
        return [
            'country_id'    => (int) $this->project['country_id'],
            'currency_id'   => (int) $this->project['currency_id']
        ];
    }

    function saveSettings($country, $currency){

        $this->project['country_id'] = $country;
        $this->project['currency_id'] = $currency;

        $this->save();
    }

    function getProject(){
        return session('project');
    }

    function saveProject($projectId){
        $this->project['building_id'] = $projectId;

        session([
            'user_id' => Auth::id()
        ]);
        $this->save();
    }

    function updateProject($request, $countWorks){

        if(!$this->project['country_id'])
        {
            $country = Country::where('name', 'Albania')->first();
            $this->project['country_id'] = $country->id;
        }

        if(!$this->project['currency_id'])
        {
            $currency = Currency::where('name', 'USD')->first();
            $this->project['currency_id'] = $currency->id;
        }

        $this->project['windows']       = $request->windows_number ? $request->windows_number : 0;
        $this->project['doors']         = $request->doors_number ? $request->doors_number : 0;
        $this->project['color_id']      = $request->color;
        $this->project['material_id']   = $request->material;

        if($countWorks > 0)
        {
            $this->project['with_works'] = true;
        }

        $this->save();
    }

    function getWorkList(){
        $project = session('project');
        return $project['works'];
    }

    function deleteProject()
    {
        session(['project' => []]);
    }

    function setWork($work_id){
        $work_ids = $this->project['works'] ? $this->project['works'] : [];
        $work_categories_ids = $this->project['work_cat_ids'] ? $this->project['work_cat_ids'] : [];

        $currentWork = Work::where('id', $work_id)->first();
        $currentCategory = $currentWork->category->id;
        $position = array_search($currentCategory, $work_categories_ids);
        if($position !== false)
        {
            $work_ids[$position] = $work_id;
        } else {
            array_push($work_ids, $work_id);
            array_push($work_categories_ids, $currentCategory);
        }
        $this->project['works'] = $work_ids;
        $this->project['work_cat_ids'] = $work_categories_ids;

        $this->save();
    }

    function removeAllWorks()
    {
        $this->project['with_works']    = false;
        $this->project['works']         = [];
        $this->project['work_cat_ids']  = [];
        $this->save();
    }

    function getBuildingPrice()
    {
        $building = Building::where('id', $this->project['building_id'])->first();
        return $building->price;
    }

    function getColorPrice()
    {
        $color = Color::where('id', $this->project['color_id'])->first();
        return $color->price;
    }

    function getMaterialPrice()
    {
        $material = Material::where('id', $this->project['material_id'])->first();
        return $material->price;
    }

    function getBuildingCategory()
    {
        $building = Building::where('id', $this->project['building_id'])->first();
        return $building->category->category;
    }

    function getBuildingType()
    {
        $building = Building::where('id', $this->project['building_id'])->first();
        return $building->type;
    }

    function getRatio()
    {
        $currency = Currency::where('id', $this->project['currency_id'])->first();
        return $currency->ratio;
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
        $color_id = $this->project['color_id'];
        $color = Color::where('id', $color_id)->first();
        return $color->color;
    }

    function getMaterialName()
    {
        $material_id = $this->project['material_id'];
        $material = Color::where('id', $material_id)->first();
        return $material->material;
    }

}