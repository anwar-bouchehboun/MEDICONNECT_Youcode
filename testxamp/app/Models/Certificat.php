<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificat extends Model
{
    use HasFactory;
    protected $fillable =   [
        'patient_id',
         'medecin_id',
           'nomberjr',
        'date_consultation'
];
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    public function medecin()
    {
        return $this->belongsTo(User::class, 'medecin_id');
    }
}
