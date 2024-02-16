<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialite extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['specialite'];
    public function medicaments()
    {
        return $this->hasMany(Medicament::class, 'specialite_id');
    }
    public function medcine()
    {
        return $this->hasMany(User::class, 'specialite_id');
    }
}