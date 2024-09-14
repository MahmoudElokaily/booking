<x-guest-layout>
    <form method="POST" action="{{ route('admin.store-post') }}" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="Room" :value="__('Room')" />
            <x-text-input id="Room" class="block mt-1 w-full" type="number" name="Room" min="1" :value="old('Room')" required />
            <x-input-error :messages="$errors->get('Room')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Bathroom" :value="__('Bathroom')" />
            <x-text-input id="Bathroom" class="block mt-1 w-full" type="number" min="1" name="Bathroom" :value="old('Bathroom')" required />
            <x-input-error :messages="$errors->get('Bathroom')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Price" :value="__('Price')" />
            <x-text-input id="Price" class="block mt-1 w-full" type="number" min="1" name="Price"  :value="old('Price')" required />
            <x-input-error :messages="$errors->get('Price')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="city" :value="__('city')" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="description" :value="__('description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="image" :value="__('image')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="images[]" :value="old('image')" required multiple/>
            <x-input-error :messages="$errors->get('images')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Create') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
