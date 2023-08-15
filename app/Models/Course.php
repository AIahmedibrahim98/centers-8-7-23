<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    public function students()
    {
        return $this->belongsToMany(User::class, 'user_schedules');
    }
    public function instractors()
    {
        return $this->belongsToMany(User::class, 'schedules');
    }
}
