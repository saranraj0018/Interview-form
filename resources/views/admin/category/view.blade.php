<x-layouts.app>
    <div class="p-4">
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Emails</h2>
            <button id="createCategoryBtn" class="bg-[#ea2498] text-white px-4 py-2 rounded">
                Create
            </button>
        </div>

        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">
                <thead>
                <tr class="bg-[#ea2498] text-white text-sm uppercase tracking-wider">
                    <th class="px-3 py-2">ID</th>
                    <th class="px-3 py-2">Email</th>
                    <th class="px-3 py-2">Person Name</th>
                    <th class="px-3 py-2">Designation</th>
                    <th class="px-3 py-2">Level</th>
                    <th class="px-3 py-2">Created Date</th>
                    <th class="px-3 py-2 text-center">Actions</th>
                </tr>
                </thead>

                <tbody id="categoryTableBody" class="divide-y divide-gray-200">
                @foreach($categories as $category)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3 font-medium text-gray-900">
                            {{ $category->id }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $category->email }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $category->person_name }}
                        </td>

                        <td class="px-4 py-3">
                            {{ $category->designation }}
                        </td>

                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs rounded bg-pink-100 text-pink-700">
                           Level {{ $category->level }}
                        </span>
                        </td>

                        <td class="px-4 py-3">
                            {{ $category->created_at->format('d M Y, h:i A') }}
                        </td>

                        <td class="px-4 py-3 flex justify-center gap-4">
                            <!-- Edit -->
                            <button
                                class="text-blue-600 hover:text-blue-800 transition editCategoryBtn"
                                data-id="{{ $category->id }}"
                                data-email="{{ $category->email }}"
                                data-person-name="{{ $category->person_name }}"
                                data-designation="{{ $category->designation }}"
                                data-level="{{ $category->level }}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <!-- Delete -->
                            <button
                                class="text-red-600 hover:text-red-800 transition btnDeleteCategory"
                                data-id="{{ $category->id }}">
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
            {{ $categories->links() }}
        </div>

        {{-- Modal --}}
        @include('admin.category.modal')
    </div>
</x-layouts.app>

<script src="{{ asset('admin/js/category.js') }}"></script>
