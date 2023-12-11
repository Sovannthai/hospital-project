<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function disease()
    {
        return $this->belongsTo(Diseas::class,'disease_id');
    }
}
