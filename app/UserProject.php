<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    public $timestamps = false;
    protected $fillable = ['id', 'user_id', 'building_id', 'windows', 'doors', 'color_id', 'material_id', 'with_works'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function works()
    {
        return $this->belongsToMany(Work::class, 'works_lists', 'project_id');
    }
}
