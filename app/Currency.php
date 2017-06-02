<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public $timestamps;
    public $fillable = ['name', 'ratio'];

    public function userSettings()
    {
        return $this->hasMany(UserSettings::class);
    }
}
