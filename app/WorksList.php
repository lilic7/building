<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorksList extends Model
{
    public $timestamps = false;
    protected $fillable = ['project_id', 'work_id', 'work_category_id'];
}
