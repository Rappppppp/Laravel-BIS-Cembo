<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentModel extends Model
{
    use HasFactory;

    protected $table = 'document_requests';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'document_type',
        'document_path',
        'inputs',
        'status',
        'requested_at',
        'approved_denied_at',
        'approved_denied_by',
    ];

    protected $casts = [
        'inputs' => 'array',
        'requested_at' => 'datetime',
        'approved_denied_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approvedDeniedBy()
    {
        return $this->belongsTo(User::class, 'approved_denied_by');
    }
}
