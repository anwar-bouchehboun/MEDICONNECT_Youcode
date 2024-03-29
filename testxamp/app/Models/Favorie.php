<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorie extends Model
{
    use HasFactory;
    public function medecin()
    {
        return $this->belongsTo(User::class, 'medecin_id');
    }
}