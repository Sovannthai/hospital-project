<?php

namespace App\Models;

use App\Models\User;
use App\Models\Diseas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function pataints()
    {
        return $this->belongsTo(Pataint::class, 'pataint_id');
    }
    public function disease()
    {
        return $this->belongsTo(Diseas::class, 'disease_id');
    }
    public function create()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
    public function laboratory()
    {
        return $this->belongsTo(Laboratory::class, 'labo_id');
    }
}
