<?php
namespace App\Modules\Price;

use App\UserSettings;

class Price
{
    private $total = 0;

    private $ratio;

    public static function add($price)
    {

    }



    private function __construct($price)
    {
        $this->getRatio();
    }

    private function getRatio()
    {
        $settings = UserSettings::where('user_id', Auth::id())->first();
        $this->ratio =  $settings->currency->ratio;
    }
}