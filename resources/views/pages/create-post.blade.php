<x-guest-layout>
    <form method="POST" action="{{ route('admin.store-post') }}" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="description" :value="__('Description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required/>
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="price" :value="__('Price')" />
            <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price" :value="old('price')" required/>
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="room" :value="__('Num Of Room')" />
            <x-text-input id="room" class="block mt-1 w-full" type="number" name="room" :value="old('room')" required/>
            <x-input-error :messages="$errors->get('room')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="bathroom" :value="__('Num Of Bathroom')" />
            <x-text-input id="bathroom" class="block mt-1 w-full" type="number" name="bathroom" :value="old('bathroom')" required/>
            <x-input-error :messages="$errors->get('bathroom')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="type" :value="__('Type Of Post')" />
            <select class="form-select w-full" aria-label="Default select example" required name="type">
                <option selected value="">Open this select menu</option>
                <option value="Offer">Offer</option>
                <option value="Looking">Looking</option>
            </select>
        </div>

        <div class="mt-4">
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="images[]" :value="old('image')" multiple/>
            <x-input-error :messages="$errors->get('images')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
