<x-guest-layout>
    <form method="POST" action="{{ route('admin.store-post') }}" enctype="multipart/form-data">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="description" :value="__('description')" />
            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="mt-4">
            <select class="form-select w-full" aria-label="Default select example" required name="type">
                <option selected value="">Open this select menu</option>
                <option value="Offer">Offer</option>
                <option value="Looking">Looking</option>
            </select>
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
