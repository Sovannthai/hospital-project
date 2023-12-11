<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function disease()
    {
        return $this->belongsTo(Diseas::class, 'disease_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_doctor_id', 'user_nurse_id');
    }
    public function doctor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function nurse()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
