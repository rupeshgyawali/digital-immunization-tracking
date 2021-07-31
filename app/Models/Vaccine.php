<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'description',];

    public function children()
    {
        return $this->belongsToMany(Child::class);
    }
}
