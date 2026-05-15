<x-layouts.app>

    <div class="p-4">

        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Companies</h2>

            <button id="createCompanyBtn"
                    class="bg-[#ea2498] text-white px-4 py-2 rounded">
                Create
            </button>
        </div>

        <div class="overflow-x-auto bg-white rounded-xl shadow-md">

            <table class="w-full text-sm text-left text-gray-700 border-collapse">

                <thead>
                <tr class="bg-[#ea2498] text-white text-sm uppercase tracking-wider">

                    <th class="px-3 py-2">ID</th>

                    <th class="px-3 py-2">Image</th>

                    <th class="px-3 py-2">Company Name</th>

                    <th class="px-3 py-2">Created Date</th>

                    <th class="px-3 py-2 text-center">Actions</th>

                </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                @foreach($companies as $company)

                    <tr class="hover:bg-gray-50 transition-colors">

                        <td class="px-4 py-3 font-medium text-gray-900">
                            {{ $company->id }}
                        </td>

                        <td class="px-4 py-3">

                            @if($company->image)
                                <img src="{{ asset($company->image) }}"
                                     class="w-16 h-16 object-cover rounded border">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif

                        </td>

                        <td class="px-4 py-3">
                            {{ $company->name }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $company->created_at->format('d M Y, h:i A') }}
                        </td>

                        <td class="px-4 py-3 flex justify-center gap-4">

                            <!-- Edit -->
                            <button
                                class="text-blue-600 hover:text-blue-800 transition editCompanyBtn"

                                data-id="{{ $company->id }}"

                                data-name="{{ $company->name }}"

                                data-image="{{ $company->image }}">

                                <i class="fa-solid fa-pen-to-square"></i>

                            </button>

                            <!-- Delete -->
                            <button
                                class="text-red-600 hover:text-red-800 transition btnDeleteCompany"

                                data-id="{{ $company->id }}">

                                <i class="fa-solid fa-delete-left"></i>

                            </button>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

        {{-- Pagination --}}
        <div class="p-4">
            {{ $companies->links() }}
        </div>

        {{-- Modal --}}
        @include('admin.company.modal')

    </div>

</x-layouts.app>

<script src="{{ asset('admin/js/company.js') }}"></script>
