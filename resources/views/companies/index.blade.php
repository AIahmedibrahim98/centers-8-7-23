<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Companies
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
                                                    Owner
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                                    Tex Number
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-4 text-sm font-medium text-left text-gray-900">
                                                    Created At
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($companies as $company)
                                                <tr class="bg-gray-100 border-b">
                                                    <td
                                                        class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                        {{ $loop->iteration }}</td>
                                                    <td
                                                        class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                        {{ $company->name }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                        {{ $company->owner }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                        {{ $company->tax_number }}
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 text-sm font-light text-gray-900 whitespace-nowrap">
                                                        {{ date_format(date_create($company->created_at), 'Y-m-d h:i:s a') }}
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
