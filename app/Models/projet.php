<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projet extends Model
{
    use HasFactory;
    protected $fillable = ['etudiant_id', 'formateur_id', 'projet', 'summary', 'message', 'file_path'];

    public function etudiant()
    {
        return $this->belongsTo(etudiant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formateur()
    {
        return $this->belongsTo(formateur::class);
    }

    public function soutenance()
    {
        return $this->hasOne(soutenance::class);
    }

    public function reunion()
    {
        return $this->hasMany(Reunion::class);
    }
}
