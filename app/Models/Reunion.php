<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    use HasFactory;
    protected $fillable = ['projet_id', 'dateReunion', 'message'];

    public function projet()
    {
        return $this->belongsTo(projet::class);
    }
}
