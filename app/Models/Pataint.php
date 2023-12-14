<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pataint extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
