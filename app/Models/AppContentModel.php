<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppContentModel extends Model
{
    use HasFactory;

    protected $table = 'app_content';
    protected $primaryKey = 'id';
    protected $fillable = [
        'html_content'
    ];
}