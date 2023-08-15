<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
    public function manager()
    {
        return $this->hasOne(Manager::class);
    }
}
