<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Company
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <fieldset class="p-5 border rounded-xl">
                        <legend class="p-2 text-lg font-bold">Edit Company</legend>
                        <form method="POST" action="{{ route('companies.update', $company->id) }}">
                            @method('patch')
                            @csrf
                            <div class="grid w-full grid-cols-2 gap-4">
                                <div class="w-full">
                                    <x-input-label>Name</x-input-label>
                                    <x-text-input value="{{ old('name', $company->name) }}" class="w-full"
                                        name='name'></x-text-input>
                                    @error('name')
                                        <div class="font-bold text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- ... -->
                                <div class="w-full">
                                    <x-input-label>Owner</x-input-label>
                                    <x-text-input value="{{ old('owner', $company->owner) }}" class="w-full"
                                        name='owner'></x-text-input>
                                    @error('owner')
                                        <div class="font-bold text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <x-input-label>Tax Number</x-input-label>
                                    <x-text-input value="{{ old('tax_number', $company->tax_number) }}" class="w-full"
                                        name='tax_number'></x-text-input>
                                    @error('tax_number')
                                        <div class="font-bold text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <div class="flex justify-end mt-7">
                                        <x-primary-button type='submit'>Save</x-primary-button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
