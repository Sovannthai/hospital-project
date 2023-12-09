<?php

namespace App\Models;

use App\Models\Receptionist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Diseas extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function receptionist()
    {
        return $this->belongsTo(Receptionist::class,'');
    }
}
