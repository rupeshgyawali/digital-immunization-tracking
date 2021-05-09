<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $table = 'children';

    /**
     * The vaccines that child is vaccinated with
     */
    public function vaccines()
    {
        return $this->belongsToMany(Vaccine::class);
    }
}
