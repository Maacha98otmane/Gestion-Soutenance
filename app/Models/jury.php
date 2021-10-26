<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jury extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'role'];

    public function soutenance()
    {
        return $this->hasMany(soutenance::class);
    }
}
