<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Exception;
use Mail;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    private function generateBarangayID($firstName, $lastName)
    {
        $fn = strtoupper(substr($firstName, 0, 1));
        $ln = strtoupper(substr($lastName, 0, 1));
        $randomNum = rand(100, 999);
        $randomDate = substr((string) time(), 5, 5);
        return $fn . $ln . $randomNum . $randomDate;
    }

    private function computeNetIncome($totalIncome, $totalExpenses)
    {
        $tax = 1000; // input taxes here
        $netIncome = $totalIncome - $totalExpenses - $tax;
        return $netIncome;
    }

    public function create(array $input): User
    {
        $validator = Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'unique:users,email',
            ],
            'password' => $this->passwordRules(),
        ], [
                'email.unique' => 'The email address is already registered.',
            ]);

        if ($validator->fails()) {
            throw ValidationException::withMessages($validator->errors()->toArray());
        } {

            $BarangayID = $this->generateBarangayID($input['first_name'], $input['last_name']);

            $user = User::create([
                'role' => 'Resident',
                'barangay_id' => $BarangayID,
                'email' => $input['email'],
                'name' => $input['first_name'] . " " . $input['middle_name'] . " " . $input['last_name'],
                'password' => Hash::make($input['password']),
            ]);

            $user->personalInformation()->create([
                'user_id' => $user->id,
                'first_name' => $input['first_name'],
                'middle_name' => $input['middle_name'],
                'last_name' => $input['last_name'],
                'date_of_birth' => $input['date_of_birth'],
                'place_of_birth' => $input['place_of_birth'],
                'nationality' => $input['nationality'],
                'religion' => $input['religion'],
                'civil_status' => $input['civil_status'],
                'occupation' => $input['occupation'],
                'educational_attainment' => $input['educational_attainment'],
            ]);

            $user->contactInformation()->create([
                'user_id' => $user->id,
                'contact_number' => $input['contact_number'],
                'house_number' => $input['house_number'],
                'street_name' => $input['street_name'],
                'barangay_name' => 'Cembo',
                'city_name' => 'Makati',
                'prov_house_number' => $input['prov_house_number'],
                'prov_street_name' => $input['prov_street_name'],
                'prov_barangay_name' => $input['prov_barangay_name'],
                'prov_city_name' => $input['prov_city_name'],
                'province_name' => $input['province_name'],
            ]);

            $user->makatizenRegistry()->create([
                'user_id' => $user->id,
                'registered_voter' => $input['is_voter'],
                'head_of_household' => $input['is_head'],
                'social_sector' => $input['social_sector'],
                'vaccine_status' => $input['vaccine'],
                'years_makati' => $input['years_makati'],
                'years_barangay_cembo' => $input['years_cembo'],
                'years_current_address' => $input['years_current'],
                'num_household' => $input['num_household'],
                'num_families_household' => $input['num_fam_household'],
                'num_family_members' => $input['num_fam_members'],
                'relationship_head_family' => $input['relationship'],
                'yellow_card' => isset($input['yellow']) ? $input['yellow'] : 0,
                'blue_card' => isset($input['blue']) ? $input['blue'] : 0,
                'white_card' => isset($input['white']) ? $input['white'] : 0,
                'makatizen_card' => isset($input['makatizen']) ? $input['makatizen'] : 0,
                'philhealth_card' => isset($input['philhealth']) ? $input['philhealth'] : 0,

                // Nullable - will add if necessary
                // 'monthly_household_income' => $input['prov_street_name'],
                // 'monthly_household_expenses' => $input['prov_barangay_name'],
                // 'monthly_mean_income' => $input['prov_city_name'],
                // 'monthly_net_income' => $input['province_name'],
            ]);

            // will remove this because it sends twice
            //event(new Registered($user));
            return $user;

        }

    }
}