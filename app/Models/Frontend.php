<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frontend extends Model
{
    use HasFactory;

    public function doctors()
    {
        return $this->belongsTo(User::class,'doctor_id');
    }
}
