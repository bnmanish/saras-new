<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;


    public function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function type(){
        return $this->belongsTo(Type::class,'type_id','id');
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'project_amenities');
    }

    public function sliderimages()
    {
        return $this->hasMany(ProjectSlider::class);
    }

    public function floorplan()
    {
        return $this->hasMany(FloorPlan::class);
    }
}
