<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Edit Branch - {{ $branch->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <fieldset class="p-5 border rounded-xl">
                        <legend class="p-2 text-lg font-bold">Edit Branch</legend>
                        <form method="POST" action="{{ route('branches.update', $branch->id) }}">
                            @method('patch')
                            @csrf
                            <div class="grid w-full grid-cols-2 gap-4">
                                <div class="w-full">
                                    <x-input-label>Name</x-input-label>
                                    <x-text-input value="{{ old('name', $branch->name) }}" class="w-full"
                                        name='name'></x-text-input>
                                    @error('name')
                                        <div class="font-bold text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- ... -->
                                <div class="w-full">
                                    <x-input-label>Location</x-input-label>
                                    <x-text-input value="{{ old('location', $branch->location) }}" class="w-full"
                                        name='location'></x-text-input>
                                    @error('location')
                                        <div class="font-bold text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <x-input-label>Company</x-input-label>
                                    <select name="company_id">
                                        <option disabled selected value="">Select Company</option>
                                        @foreach (App\Models\Company::orderBy('name')->pluck('name', 'id')->toArray() as $id => $name)
                                            <option
                                                {{ $id == old('company_id', $branch->company_id) ? 'selected' : '' }}
                                                value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
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
