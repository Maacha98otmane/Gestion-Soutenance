<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiant extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'CIN', 'datenaissance',
    'ville', 'telephone', 'class_id', ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projet()
    {
        return $this->hasOne(projet::class);
    }

    public function classe()
    {
        return $this->belongsTo(classe::class, 'class_id');
    }
}
