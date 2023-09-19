<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class);
    }
    public function instractor()
    {
        return $this->belongsTo(User::class);
    }
}
