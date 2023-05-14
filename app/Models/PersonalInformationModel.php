<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformationModel extends Model
{
    use HasFactory;
    protected $table = 'personal_information';
    protected $primaryKey = 'information_id';
    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'date_of_birth',
        'place_of_birth',
        'nationality',
        'religion',
        'civil_status',
        'occupation',
        'educational_attainment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}