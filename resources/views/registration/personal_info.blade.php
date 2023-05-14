<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <h1 class="text-2xl">Personal Information</h1>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('info.registration.post') }}">
            @csrf
            
            <div>
                <x-label for="gender">Gender</x-label>
                <select class="block mt-1 w-full" name="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Gay">Gay</option>
                    <option value="Lesbian">Lesbian</option>
                    <option value="Others">Others</option>
                </select>
            </div>

            <div>
                <x-label for="date_of_birth">Date of Birth</x-label>
                <x-input class="block mt-1 w-full" type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" required max="{{ \Carbon\Carbon::now()->subYears(18)->format('Y-m-d') }}" />
            </div>

            <div>
                <x-label for="place_of_birth">Place of Birth</x-label>
                <x-input class="block mt-1 w-full" type="text" name="place_of_birth" id="place_of_birth" value="{{ old('place_of_birth') }}" />
            </div>

            @php
            $nationals = array('Afghan','Albanian','Algerian','American','Andorran','Angolan','Antiguans','Argentinean','Armenian','Australian','Austrian','Azerbaijani','Bahamian','Bahraini','Bangladeshi','Barbadian','Barbudans','Batswana','Belarusian','Belgian','Belizean','Beninese','Bhutanese','Bolivian','Bosnian','Brazilian','British','Bruneian','Bulgarian','Burkinabe','Burmese','Burundian','Cambodian','Cameroonian','Canadian','Cape Verdean','Central African','Chadian','Chilean','Chinese','Colombian','Comoran','Congolese','Costa Rican','Croatian','Cuban','Cypriot','Czech','Danish','Djibouti','Dominican','Dutch','East Timorese','Ecuadorean','Egyptian','Emirian','Equatorial Guinean','Eritrean','Estonian','Ethiopian','Fijian','Filipino','Finnish','French','Gabonese','Gambian','Georgian','German','Ghanaian','Greek','Grenadian','Guatemalan','Guinea-Bissauan','Guinean','Guyanese','Haitian','Herzegovinian','Honduran','Hungarian','I-Kiribati','Icelander','Indian','Indonesian','Iranian','Iraqi','Irish','Israeli','Italian','Ivorian','Jamaican','Japanese','Jordanian','Kazakhstani','Kenyan','Kittian and Nevisian','Kuwaiti','Kyrgyz','Laotian','Latvian','Lebanese','Liberian','Libyan','Liechtensteiner','Lithuanian','Luxembourger','Macedonian','Malagasy','Malawian','Malaysian','Maldivan','Malian','Maltese','Marshallese','Mauritanian','Mauritian','Mexican','Micronesian','Moldovan','Monacan','Mongolian','Moroccan','Mosotho','Motswana','Mozambican','Namibian','Nauruan','Nepali','New Zealander','Nicaraguan','Nigerian','Nigerien','North Korean','Northern Irish','Norwegian','Omani','Pakistani','Palauan','Panamanian','Papua New Guinean','Paraguayan','Peruvian','Polish','Portuguese','Qatari','Romanian','Russian','Rwandan','Saint Lucian','Salvadoran','Samoan','San Marinese','Sao Tomean','Saudi','Scottish','Senegalese','Serbian','Seychellois','Sierra Leonean','Singaporean','Slovakian','Slovenian','Solomon Islander','Somali','South African','South Korean','Spanish','Sri Lankan','Sudanese','Surinamer','Swazi','Swedish','Swiss','Syrian','Taiwanese','Tajik','Tanzanian','Thai','Togolese','Tongan','Trinidadian/Tobagonian','Tunisian','Turkish','Tuvaluan','Ugandan','Ukrainian','Uruguayan','Uzbekistani','Venezuelan','Vietnamese','Welsh','Yemenite','Zambian','Zimbabwean');
            @endphp

            <div>
                <x-label for="nationality">Nationality</x-label>
                <select class="block mt-1 w-full" name="nationality" id="nationality">
                    @foreach ($nationals as $national)
                        <option value="{{ $national }}" @if ($national === 'Filipino') selected @endif>{{ $national }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <x-label for="religion">Religion</x-label>
                <select class="block mt-1 w-full" type="text" name="religion" id="religion">
                    <option value="Roman Catholic">Roman Catholic</option>
                    <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                    <option value="Muslim">Muslim</option>
                    <option value="Born Again">Born Again</option>
                    <option value="Seventh Day Adventist">Seventh Day Adventist
                    </option>
                    <option value="Saksi ni Jehovah">Saksi ni Jehovah</option>
                    <option value="Mormons">Mormons</option>
                    <option value="Buddhist">Buddhist</option>
                    <option value="Others">Others</option>
                </select>
            </div>
            
            <div>
                <x-label for="civil_status">Civil Status</x-label>
                <select class="block mt-1 w-full" type="text" name="civil_status" id="civil_status">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Widowed">Widowed</option>
                    <option value="Live-in">Live-in</option>
                    <option value="Separated">Separated</option>
                </select>
            </div>

            <div>
                <x-label for="occupation">Occupation</x-label>
                <x-input class="block mt-1 w-full" type="text" name="occupation" id="occupation" />
            </div>

            <div>
                <x-label for="educational_attainment">Educational Attainment</x-label>
                <select class="block mt-1 w-full" type="text" name="educational_attainment" id="educational_attainment">
                    <option>Elementary</option>
                    <option>High School</option>
                    <option>College</option>
                    <option>Master's / Doctorate Degree</option>
                </select>
            </div>
                <x-button class="mt-2">
                    Next
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
