<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Add New Course
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <fieldset class="p-5 border rounded-xl">
                        <legend class="p-2 text-lg font-bold">Add New Course</legend>
                        <form method="POST" action="{{ route('courses.store') }}">
                            @csrf
                            <div class="grid w-full grid-cols-2 gap-4">
                                <div class="w-full">
                                    <x-input-label>Name</x-input-label>
                                    <x-text-input value="{{ old('name') }}" class="w-full"
                                        name='name'></x-text-input>
                                    @error('name')
                                        <div class="font-bold text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- ... -->
                                <div class="w-full">
                                    <x-input-label>hours</x-input-label>
                                    <x-text-input value="{{ old('hours') }}" class="w-full"
                                        name='hours'></x-text-input>
                                    @error('hours')
                                        <div class="font-bold text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <x-input-label>price</x-input-label>
                                    <x-text-input value="{{ old('price') }}" class="w-full"
                                        name='price'></x-text-input>
                                    @error('price')
                                        <div class="font-bold text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <x-input-label>Vendor</x-input-label>
                                    <select name="vendor_id" class="w-full">
                                        <option selected disabled>Select From List</option>
                                        @foreach (App\Models\Vendor::all() as $vendor)
                                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('vendor_id')
                                        <div class="font-bold text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <x-input-label>Category</x-input-label>
                                    <select name="main_category_id" id="category" class="w-full">
                                        <option selected disabled>Select From List</option>
                                        @foreach (App\Models\Category::whereNull('category_id')->get() as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="font-bold text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <x-input-label>Sub Category</x-input-label>
                                    <select name="sub_category_id" id="subcategory" class="w-full">
                                    </select>
                                    @error('category_id')
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
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#category').on('change', function(e) {
                var cat_id = e.target.value;
                //console.log(cat_id)
                $.ajax({
                    url: "{{ route('get_sub_categories') }}",
                    type: "POST",
                    data: {
                        category_id: cat_id
                    },

                    success: function(data) {
                        // console.log('success')
                        //console.log(data.sub_categories)

                        $('#subcategory').empty();
                        $('#subcategory').append('<option value="">Select Category</option>');
                        $.each(data.sub_categories, function(index,
                            subcategory) {
                            $('#subcategory').append('<option value="' + subcategory
                                .id + '">' + subcategory.name + '</option>');
                        })
                    }
                })
            });
        });
    </script>
</x-app-layout>
