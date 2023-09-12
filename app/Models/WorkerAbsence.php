<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkerAbsence extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Worker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Attendence()
    {
        return $this->belongsTo(Attendence::class, 'attendence_id');
    }
}
