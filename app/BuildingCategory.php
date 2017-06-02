<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuildingCategory extends Model
{
    protected $fillable = ['category'];

    public function buildings()
    {
        return $this->hasMany(Building::class, 'category_id', 'id');
    }
}
