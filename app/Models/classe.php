<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    use HasFactory;
    protected $fillable = ['class', 'campus_id'];

    public function campus()
    {
        return $this->belongsTo(campus::class);
    }

    public function etudiant()
    {
        return $this->hasMany(etudiant::class);
    }

    public function formateur()
    {
        return $this->hasOne(formateur::class);
    }
}
