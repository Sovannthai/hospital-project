<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usertype extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'type_name',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
