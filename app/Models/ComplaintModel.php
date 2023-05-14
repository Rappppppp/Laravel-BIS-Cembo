<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintModel extends Model
{
    use HasFactory;
    protected $table = 'complaints';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'name_of_respondent',
        'nature_of_complaint',
        'location',
        'description',
        'supporting_evidence',
        'status',
        'approved_denied_at',
        'approved_denied_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}