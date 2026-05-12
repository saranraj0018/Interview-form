<x-layouts.app>
    <div class="p-4">
        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">Interviews</h2>
            <button id="createInterviewBtn" class="bg-[#ea2498] text-white px-4 py-2 rounded">
                Create
            </button>
        </div>

        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="w-full text-sm text-left text-gray-700 border-collapse">
                <thead>
                    <tr class="bg-[#ea2498] text-white text-sm uppercase tracking-wider">
                        <th class="px-3 py-2">ID</th>
                        <th class="px-3 py-2">Candidate</th>
                        <th class="px-3 py-2">Position</th>
                        <th class="px-3 py-2">Department</th>
                        <th class="px-3 py-2">Interview Date</th>
                        <th class="px-3 py-2">Interview By</th>
                        <th class="px-3 py-2 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody id="interviewTableBody" class="divide-y divide-gray-200">
                    @foreach ($interviews as $interview)
                        <tr class="hover:bg-gray-50 transition-colors">

                            <td class="px-4 py-3">{{ $interview->id }}</td>

                            <td class="px-4 py-3">
                                {{ $interview->candidate_name }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $interview->position }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $interview->department }}
                            </td>

                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse($interview->interview_date)->format('d M Y') }}
                            </td>

                            <!-- 🔥 Interview By -->
                            <td class="px-4 py-3">

                                <div class="flex flex-wrap gap-2 max-w-[250px]">

                                    @foreach ($interview->categories as $cat)
                                        <span
                                            class="inline-flex items-center
                         bg-gray-100 text-gray-700
                         border border-gray-300
                         rounded-lg px-2.5 py-1
                         text-xs font-medium">

                                            <i class="fa-solid fa-user mr-1 text-[10px]"></i>

                                            {{ $cat->name }}

                                        </span>
                                    @endforeach

                                </div>

                            </td>

                            <td class="px-4 py-3 flex justify-center gap-4">

                                <!-- Edit -->
                                {{-- <button
                                class="text-blue-600 hover:text-blue-800 editInterviewBtn"
                                data-id="{{ $interview->id }}"
                                data-position="{{ $interview->position }}"
                                data-department="{{ $interview->department }}"
                                data-candidate="{{ $interview->candidate_name }}"
                                data-date="{{ $interview->interview_date }}"
                                data-institution="{{ $interview->institution }}"
                                data-categories='@json($interview->categories->pluck("id"))'>
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button> --}}

                                <!-- Delete -->
                                <button class="text-red-600 hover:text-red-800 btnDeleteInterview"
                                    data-id="{{ $interview->id }}">
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
            {{ $interviews->links() }}
        </div>

        {{-- Modal --}}
        @include('admin.interview.modal')

    </div>
</x-layouts.app>

<script src="{{ asset('admin/js/interview.js') }}"></script>
