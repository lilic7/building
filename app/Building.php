<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Building extends Model
{
    protected $fillable = ['category_id', 'type', 'price'];

    public function category()
    {
        return $this->belongsTo(BuildingCategory::class);
    }

    public function project()
    {
        return $this->hasMany(UserProject::class);
    }
//
//    public function getPriceAttribute($price)
//    {
//        $project = null !== session('project') ? session('project') : null;
//        if($project)
//        {
//            $currency = $project['currency_id'];
//            $ratio = Currency::where('id', $currency)->first();
//        } else {
//            $settings = UserSettings::where('user_id', Auth::id())->first();
//            dd($settings->currency);
//            $ratio = $settings->currency->ratio;
//        }
//
//        return $price * $ratio;
//    }
}
