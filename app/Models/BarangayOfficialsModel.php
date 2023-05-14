<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayOfficialsModel extends Model
{
    use HasFactory;

    protected $table = 'officials';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'position',
        'photo',
    ];
}