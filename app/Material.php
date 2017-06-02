<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Material extends Model
{
    protected $fillable = ['material', 'material'];

//    public function getPriceAttribute($price)
//    {
//        $settings = UserSettings::where('user_id', Auth::id())->first();
//
//        $currency = $settings->currency;
//
//        return $price * $currency->ratio;
//    }
}
