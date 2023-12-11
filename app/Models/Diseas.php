<?php

namespace App\Models;

use App\Models\Receptionist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Psy\CodeCleaner\ReturnTypePass;

class Diseas extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function receptionistes()
    {
        return $this->hasMany(Receptionist::class);
    }

    public function nurse()
    {
        return $this->hasMany(Nurse::class);
    }
    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }
}
