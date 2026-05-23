<x-layouts.app>

    <div class="p-4">

        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Employee Details</h2>
        </div>

        <div class="overflow-x-auto bg-white rounded-xl shadow-md">

            <table class="w-full text-sm text-left text-gray-700 border-collapse">

                <thead>
                    <tr class="bg-[#ea2498] text-white text-sm uppercase tracking-wider">

                        <th class="px-3 py-2">ID</th>
                        <th class="px-3 py-2">Employee Name</th>
                        <th class="px-3 py-2">Designation</th>
                        <th class="px-3 py-2">Department</th>
                        <th class="px-3 py-2">Contact</th>
                        <th class="px-3 py-2">Joining Date</th>
                        <th class="px-3 py-2">Family Members</th>
                        <th class="px-3 py-2 text-center">Status</th>
                        <th class="px-3 py-2 text-center">Action</th>

                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                    @foreach ($employees as $employee)

                        <tr class="hover:bg-gray-50 transition-colors">

                            <td class="px-4 py-3">
                                {{ $employee->id }}
                            </td>

                            <td class="px-4 py-3 font-medium">
                                {{ $employee->name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $employee->designation }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $employee->department }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $employee->contact }}
                            </td>

                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse($employee->doj)->format('d M Y') }}
                            </td>

                            <td class="px-4 py-3">

                                <span class="inline-block px-2 py-1 rounded text-xs font-semibold bg-pink-100 text-pink-700">

                                    {{ $employee->familyDetails->count() }}

                                </span>

                            </td>

                            <td class="px-4 py-3 text-center">

                                @if($employee->marital_status == 'married')

                                    <span class="inline-block px-2 py-1 rounded text-xs font-semibold bg-green-100 text-green-700">

                                        Married

                                    </span>

                                @else

                                    <span class="inline-block px-2 py-1 rounded text-xs font-semibold bg-yellow-100 text-yellow-700">

                                        Unmarried

                                    </span>

                                @endif

                            </td>

                            <td class="px-4 py-3 text-center">

                                <a href="{{ route('admin.employee.show', $employee->id) }}"
                                   class="inline-block px-3 py-1 rounded text-xs font-semibold bg-indigo-50 text-indigo-700 hover:bg-indigo-700 hover:text-white transition-colors duration-150">

                                    View

                                </a>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        {{-- Pagination --}}
        <div class="p-4">
            {{ $employees->links() }}
        </div>

    </div>

</x-layouts.app>
