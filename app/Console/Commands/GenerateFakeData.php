<?php

namespace App\Console\Commands;

use App\Models\ContactInformationModel;
use App\Models\MakatizenRegistryModel;
use App\Models\PersonalInformationModel;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class GenerateFakeData extends Command
{

    protected $signature = 'fake:data';

    protected $description = 'Generate fake data records';

    private function generateBarangayID($firstName, $lastName)
    {
        $fn = strtoupper(substr($firstName, 0, 1));
        $ln = strtoupper(substr($lastName, 0, 1));
        $randomNum = rand(100, 999);
        $randomDate = substr((string) time(), 5, 5);
        return $fn . $ln . $randomNum . $randomDate;
    }


    public function handle()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 200; $i++) {
            $firstName = $faker->firstName;
            $middleName = $faker->lastName;
            $lastName = $faker->lastName;

            $gender = $faker->randomElement(['Male', 'Female', 'Gay', 'Lesbian', 'Bisexual', 'Pansexual', 'Non-binary', 'Others']);
            $religion = $faker->randomElement(['Roman Catholic', 'Iglesia ni Cristo', 'Muslim', 'Born Again', 'Seventh Day Adventist', 'Saksi ni Jehovah', 'Mormons', 'Buddhist', 'Others']);
            $status = $faker->randomElement(['Single', 'Married', 'Widowed', 'Live-in', 'Separated', 'Divorced']);
            $occupation = $faker->randomelement([
                'Accountant',
                'Architect',
                'Chef',
                'Dentist',
                'Doctor',
                'Engineer',
                'Graphic Designer',
                'Lawyer',
                'Nurse',
                'Photographer',
                'Software Developer',
                'Teacher',
            ]);

            $education = $faker->randomelement([
                'Elementary',
                'High School',
                'College',
                "Master's / Doctorate Degree",
            ]);

            $social_sector = $faker->randomElement(['NA', 'Education', 'Health', 'Social Welfare', 'Sports']);

            $vaccine = $faker->randomElement(['Single Dose', 'Fully vaccinated', 'Unvaccinated', 'Vaccine Exempt']);

            $relationship_head = $faker->randomelement(['Self', 'Spouse/Husband', 'Sibling', 'Parent', 'Other']);

            $random_num_household = $faker->numberBetween(1, 10);
            $random_num_families_household = $faker->numberBetween(1, 10);
            $random_num_family_members = $faker->numberBetween(1, 10);

            $random_years = $faker->numberBetween(5, 30);
            $isHead = $faker->randomElement([0, 1]);
            $BarangayID = $this->generateBarangayID($firstName, $lastName);

            $user = User::create([
                'barangay_id' => $BarangayID,
                'role' => 'Resident',
                'name' => $firstName . " " . $middleName . " " . $lastName,
                'email' => $faker->email,
                'password' => Hash::make($faker->password(8, 12)),
            ]);

            $user->personalInformation()->create([
                'user_id' => $user->id,
                'first_name' => $firstName,
                'middle_name' => $middleName,
                'last_name' => $lastName,
                'gender' => $gender,
                'date_of_birth' => $faker->dateTime()->format('Y-m-d'),
                'place_of_birth' => $faker->city(),
                'nationality' => 'Filipino',
                'religion' => $religion,
                'civil_status' => $status,
                'occupation' => $occupation,
                'educational_attainment' => $education
            ]);

            if ($isHead == 0) {
                $random_num_household = 0;
                $random_num_families_household = 0;
                $random_num_family_members = 0;
                $relationship_head = $faker->randomelement(['Spouse/Husband', 'Sibling', 'Parent', 'Other']);
            }

            $user->contactInformation()->create([
                'user_id' => $user->id,
                'contact_number' => '09' . $faker->numerify('#########'),
                'house_number' => $faker->buildingNumber(),
                'street_name' => $faker->streetName(),
                'barangay_name' => 'Cembo',
                'city_name' => 'Makati',
                'prov_house_number' => $faker->buildingNumber(),
                'prov_street_name' => $faker->streetName(),
                'prov_barangay_name' => $faker->streetName(),
                'prov_city_name' => $faker->city(),
                'province_name' => $faker->state(),
            ]);

            $user->makatizenRegistry()->create([
                'user_id' => $user->id,
                'registered_voter' => $faker->randomElement([0, 1]),
                'head_of_household' => $faker->randomElement([0, 1]),
                'social_sector' => $social_sector,
                'vaccine_status' => $vaccine,
                'years_makati' => $random_years,
                'years_barangay_cembo' => $random_years,
                'years_current_address' => $random_years,
                'num_household' => $random_num_household,
                'num_families_household' => $random_num_families_household,
                'num_family_members' => $random_num_family_members,
                'relationship_head_family' => $relationship_head,
                'yellow_card' => $faker->randomElement([0, 1]),
                'blue_card' => $faker->randomElement([0, 1]),
                'white_card' => $faker->randomElement([0, 1]),
                'makatizen_card' => $faker->randomElement([0, 1]),
                'philhealth_card' => $faker->randomElement([0, 1]),
            ]);
        }

        return Command::SUCCESS;
    }
}