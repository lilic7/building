<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Color extends Model
{
    protected $fillable = ['color', 'price'];

//    public function getPriceAttribute($price)
//    {
//        $settings = UserSettings::where('user_id', Auth::id())->first();
//
//        $currency = $settings->currency;
//
//        return $price * $currency->ratio;
//    }
}
