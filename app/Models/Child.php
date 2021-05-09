<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $table = 'children';

    protected $fillable = [
        'name',
        'dob',
        'birth_place',
        'father_name',
        'mother_name',
        'father_phn',
        'mother_phn',
        'temporary_addr',
        'permanent_addr',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * The vaccines that child is vaccinated with
     */
    public function vaccines()
    {
        return $this->belongsToMany(Vaccine::class);
    }
}
