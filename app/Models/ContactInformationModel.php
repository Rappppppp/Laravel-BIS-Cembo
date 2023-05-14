<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInformationModel extends Model
{
    use HasFactory;

    protected $table = 'contact_information';
    protected $primaryKey = 'contact_id';
    protected $fillable = [
        'user_id',
        'contact_number',
        'house_number',
        'street_name',
        'barangay_name',
        'city_name',
        'prov_house_number',
        'prov_street_name',
        'prov_barangay_name',
        'prov_city_name',
        'province_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}