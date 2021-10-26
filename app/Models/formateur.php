<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formateur extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'telephone', 'address', 'class_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classe()
    {
        return $this->belongsTo(classe::class, 'class_id');
    }

    public function projet()
    {
        return $this->hasMany(projet::class);
    }
}
