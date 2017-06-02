<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Work extends Model
{
    public $timestamps = false;
    protected $fillable = ['category_id', 'class', 'title', 'price'];

    public function category()
    {
        return $this->belongsTo(WorkCategory::class);
    }

    public function projects()
    {
        return $this->belongsToMany(UserProject::class, 'works_lists');
    }

//    public function getPriceAttribute($price)
//    {
//        $settings = UserSettings::where('user_id', Auth::id())->first();
//
//        $currency = $settings->currency;
//
//        return $price * $currency->ratio;
//    }
}
