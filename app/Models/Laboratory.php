<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}
