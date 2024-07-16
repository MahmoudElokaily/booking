<x-guest-layout>
    @if(auth()->user()->role == "owner")
        <form method="POST" action="{{ route('admin.store-owner-post') }}" enctype="multipart/form-data">
            @csrf
            <!-- Name -->
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
    @elseif(auth()->user()->role == "tenant")
        <form method="POST" action="{{ route('admin.store-tenants-post') }}">
            @csrf
            <!-- Name -->
            <div>
                <x-input-label for="description" :value="__('description')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Create') }}
                </x-primary-button>
            </div>
        </form>
    @endif


</x-guest-layout>
