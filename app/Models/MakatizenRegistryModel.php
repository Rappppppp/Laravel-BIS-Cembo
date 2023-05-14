<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakatizenRegistryModel extends Model
{
    use HasFactory;

    protected $table = 'makatizen_registry';
    protected $primaryKey = 'registry_id';
    protected $fillable = [
        'user_id',
        'registered_voter',
        'head_of_household',
        'social_sector',
        'vaccine_status',
        'years_makati',
        'years_barangay_cembo',
        'years_current_address',
        'num_household',
        'num_families_household',
        'num_family_members',
        'relationship_head_family',
        'yellow_card',
        'blue_card',
        'white_card',
        'makatizen_card',
        'philhealth_card',
        'monthly_household_income',
        'monthly_household_expenses',
        'monthly_mean_income',
        'monthly_net_income',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}