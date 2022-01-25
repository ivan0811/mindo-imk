<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;
    protected $fillable = ['trainer_id', 'category_id', 'name', 'type', 'description', 'cover', 'price'];
    
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function category()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function participantTraining()
    {
        return $this->hasMany(Participant::class, 'training_id');
    }
}
