<?php

namespace App\Models;

use App\Models\WorkerAbsence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendence extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function WorkerAbsence()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Absence()
    {
        return $this->hasMany(WorkerAbsence::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
