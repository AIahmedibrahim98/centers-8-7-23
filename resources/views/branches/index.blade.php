<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Branches
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-end">
                        <div>
                            <x-primary-link class="bg-blue-700" href="{{ route('branches.create') }}">Add New
                                Branch</x-primary-link>
                        </div>
                    </div>
                    <!-- component -->
                    <div class="p-5">
                        @if (session()->has('added'))
                            <div>
                                <div
                                    class="flex items-center justify-center px-2 py-1 m-1 font-medium text-green-100 bg-green-700 border border-green-700 rounded-md ">
                                    <div slot="avatar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="w-5 h-5 mx-2 feather feather-check-circle">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                    </div>
                                    <div class="flex-initial max-w-full text-xl font-normal">
                                        <div class="py-2">This is a success messsage
                                            <div class="text-sm font-base">
                                                {{ session('added') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-row-reverse flex-auto">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-5 h-5 ml-2 rounded-full cursor-pointer feather feather-x hover:text-green-400">
                                                <line x1="18" y1="6" x2="6" y2="18">
                                                </line>
                                                <line x1="6" y1="6" x2="18" y2="18">
                                                </line>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                    <!-- component -->
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="w-full">
                                        <thead class="bg-white border-b">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                                    #
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                                    Name
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                                    location
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                                    company
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                                    Created At
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($branches as $key => $branch)
                                                <tr class="bg-gray-100 border-b">
                                                    <td
                                                        class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                        {{ $key + $branches->firstItem() }}</td>
                                                    <td
                                                        class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                        {{ $branch->name }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                        {{ $branch->location }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                        {{ $branch->company->name }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                        {{ date_format(date_create($branch->created_at), 'Y-m-d h:i:s a') }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                        <div class="flex justify-evenly">
                                                            <div>
                                                                <a href="{{ route('branches.edit', $branch->id) }}"><i
                                                                        class="text-lg fa-solid fa-pen-to-square"></i></a>
                                                            </div>
                                                            <div>
                                                                <form method="POST"
                                                                    action="{{ route('branches.destroy', $branch->id) }}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit">
                                                                        <i class="text-lg fa-solid fa-trash"
                                                                            style="color: #fa0000;"></i>
                                                                    </button>
                                                                </form>


                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr colspan='4' class="bg-gray-100 border-b">
                                                    No Result Yet
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ $branches->links() }}
                    {{-- {{ $branches->links('pagination::simple-tailwind') } --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
