<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'no_wa'];
    
    public function training()
    {
        return $this->hasMany(Training::class, 'training_id');
    }
}
