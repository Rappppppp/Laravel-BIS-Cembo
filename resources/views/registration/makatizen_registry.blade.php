<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <h1 class="text-2xl">Makatizen Registry</h1>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('makatizen.registration.post') }}">
            @csrf
            
            <div>
                <x-label>Registered Voter?</x-label>
                <x-input class="block mt-1" type="checkbox" name="is_voter" id="is_voter" value="1" />

                <x-label>Head of Household?</x-label>
                <x-input class="block mt-1" type="checkbox" name="is_head" id="is_head" value="1" />
            </div>

            <div>
                <x-label for="social_sector">Social Sector</x-label>
                <select class="block mt-1 w-full" type="text" name="social_sector" id="social_sector">
                    <option value="NA">NA</option>
                    <option value="Education">Education</option>
                    <option value="Health">Health</option>
                    <option value="Social Welfare">Social Welfare</option>
                    <option value="Sports">Sports</option>
                </select>
            </div>
            <!-- Completed -->
            <div>
                <x-label for="vaccine">Vaccine Status</x-label>
                <select class="block mt-1 w-full" type="text" name="vaccine" id="vaccine">
                    <option value="Single Dose">Single Dose</option>
                    <option value="Fully Vaccinated">Fully Vaccinated</option>
                    <option value="Vaccine Exempt">Vaccine Exempt</option>
                    <option value="Unvaccinated ">Unvaccinated</option>
                </select>
            </div>

            <div>
                <x-label for="years_makati">Years in Makati City</x-label>
                <x-input class="block mt-1 w-full" type="text" name="years_makati" id="years_makati" />
            </div>

            <div>
                <x-label for="years_cembo">Years in Barangay Cembo</x-label>
                <x-input class="block mt-1 w-full" type="text" name="years_cembo" id="years_cembo" />
            </div>

            <div>
                <x-label for="years_current">Years in Current Address</x-label>
                <x-input class="block mt-1 w-full" type="text" name="years_current" id="years_current" />
            </div>

            <div>
                <x-label for="num_household">Number of Household</x-label>
                <x-input class="block mt-1 w-full" type="text" name="num_household" id="num_household" />
            </div>

            <div>
                <x-label for="num_fam_household">Number of Families(Household)</x-label>
                <x-input class="block mt-1 w-full" type="text" name="num_fam_household" id="num_fam_household" />
            </div>

            <div>
                <x-label for="num_fam_members">Number of Members(Household)</x-label>
                <x-input class="block mt-1 w-full" type="text" name="num_fam_members" id="num_fam_members" />
            </div>

            <div>
                <x-label for="relationship">Relationship to the Homeowner</x-label>
                <select class="block mt-1 w-full" type="text" name="relationship" id="relationship">
                    <option value="Self">Self</option>
                    <option value="Spouse/Husband">Spouse/Husband</option>
                    <option value="Parent ">Parent</option>
                    <option value="Sibling ">Sibling</option>
                    <option value="Other ">Other</option>
                </select>
            </div>

            <h3>Cards</h3>
            <div>
            <table>
                <tr>
                    <th>Card Type</th>
                </tr>
                <tr>
                    <td>Yellow Card</td>
                    <td><x-input class="block mt-1" type="checkbox" name="yellow" id="yellow" value="1" /></td>
                </tr>
                <tr>
                    <td>Blue Card</td>
                    <td><x-input class="block mt-1" type="checkbox" name="blue" id="blue" value="1" /></td>
                </tr>
                <tr>
                    <td>White Card</td>
                    <td><x-input class="block mt-1" type="checkbox" name="white" id="white" value="1" /></td>
                </tr>
                <tr>
                    <td>Makatizen Card</td>
                    <td><x-input class="block mt-1" type="checkbox" name="makatizen" id="makatizen" value="1" /></td>
                </tr>
                <tr>
                    <td>Philhealth Card</td>
                    <td><x-input class="block mt-1" type="checkbox" name="philhealth" id="philhealth" value="1" /></td>
                </tr>
            </table>

            </div>

                <x-button class="mt-2">
                    Done
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
