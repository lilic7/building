<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkCategory extends Model
{
    protected $fillable = ['category', 'short_name'];

    public function works()
    {
        return $this->hasMany(Work::class, 'category_id');
    }
}
