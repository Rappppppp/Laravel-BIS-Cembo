<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class UserRegistrationModel extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public function personalInformation()
    {
        return $this->hasOne(PersonalInformationModel::class);
    }

// public function contactInformation()
// {
//     return $this->hasOne(ContactInformationModel::class);
// }

// public function makatizenRegistry()
// {
//     return $this->hasOne(MakatizenRegistryModel::class);
// }
}