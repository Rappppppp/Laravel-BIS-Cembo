<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
           <h1 class="text-2xl">Contact Information</h1>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('contact.registration.post') }}">
            @csrf
            
            <div>
                <x-label for="email">Email Address</x-label>
                <x-input id="email" class="block w-full" type="text" value="{{ $user_email }}" disabled/>
            </div>

            <div class="mt-2">
                <x-label for="contact_number">Contact no.</x-label>
                <x-input class="block w-full" type="number" name="contact_number" id="contact_number" />
            </div>

            <x-label class="text-xl mt-3">Current Address</x-label>
            <!-- Address -->
            <div>
                <x-label for="house_number">House no.</x-label>
                <x-input class="block w-full" type="text" name="house_number" id="house_number" />
            </div>

            <div class="mt-2">
                <x-label for="street_name">Street</x-label>
                <x-input class="block w-full" type="text" name="street_name" id="street_name" />
            </div>

            <div class="mt-2">
                <x-label for="prov_barangay_name">Barangay</x-label>
                <x-input class="block w-full" type="text" value="Cembo" disabled/>
            </div>

            <div class="mt-2">
                <x-label for="city_name">City</x-label>
                <x-input class="block w-full" type="text" value="Makati City" disabled/>
            </div>

            <!-- Provincial Address -->
            <x-label class="text-xl mt-3">Provincial Address</x-label>
            <div>
            <div class="mt-2">
                <x-label for="prov_house_number">House no.</x-label>
                <x-input class="block w-full" type="text" name="prov_house_number" id="prov_house_number"/>
            </div>

            <div class="mt-2">
                <x-label for="prov_street_name">Street</x-label>
                <x-input class="block w-full" type="text" name="prov_street_name" id="prov_street_name"/>
            </div>

            <div class="mt-2">
                <x-label for="prov_barangay_name">Barangay</x-label>
                <x-input class="block w-full" type="text"  name="prov_barangay_name" id="prov_barangay_name"/>
            </div>

            <div class="mt-2">
                <x-label for="prov_city_name">City</x-label>
                <x-input class="block w-full" type="text"  name="prov_city_name" id="prov_city_name"/>
            </div>

            <div class="mt-2">
                <x-label for="province_name">Province</x-label>
                <x-input class="block w-full" type="text"  name="province_name" id="province_name"/>
            </div>

            <x-button class="mt-2">
                Next
            </x-button>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    const contactNumberInput = document.getElementById('contact_number');
    
    contactNumberInput.addEventListener('input', (event) => {
        if (event.target.value.length > 11) {
            event.target.value = event.target.value.substring(0, 11);
        }
    });
</script>