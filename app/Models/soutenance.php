<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class soutenance extends Model
{
    use HasFactory;
    protected $fillable = ['projet_id', 'president_id', 'examinateur_id', 'invite_id', 'dateDefense', 'validate', 'mailenvoie'];

    public function jury()
    {
        return $this->belongsTo(jury::class);
    }

    public function projet()
    {
        return $this->belongsTo(projet::class);
    }
}
