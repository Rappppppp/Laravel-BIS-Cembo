<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacebookPostsModel extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'facebook_id',
        'title',
        'message',
        'full_picture',
        'created_time',
        'permalink_url',
        'tags',
        'posted_by'
    ];
}