<x-layouts.app>

    <div class="p-4">

        <div class="flex justify-between mb-4">
            <h2 class="text-xl font-bold">HR Interview Reviews</h2>
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
                        <th class="px-3 py-2">Status</th>
                        <th class="px-3 py-2 text-center">Action</th>

                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                    @foreach ($interviews as $interview)
                        <tr class="hover:bg-gray-50 transition-colors">

                            <td class="px-4 py-3">
                                {{ $interview->id }}
                            </td>

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

                            {{-- Single Interviewer --}}

                            <td class="px-4 py-3">
                                <div class="flex flex-col gap-2">
                                    @foreach ($interview->emails as $email)
                                        @php $feedback = $email->feedback; @endphp
                                        <div>
                                            @if ($feedback)
                                                @php
                                                    $rec = $feedback->final_recommendation;
                                                    $badgeClass = match ($rec) {
                                                        'selected' => 'bg-green-100 text-green-800',
                                                        'rejected' => 'bg-red-100 text-red-800',
                                                        'not_suitable' => 'bg-orange-100 text-orange-800',
                                                        'hold' => 'bg-yellow-100 text-yellow-800',
                                                        default => 'bg-gray-100 text-gray-600',
                                                    };
                                                @endphp
                                                <span
                                                    class="inline-block px-2 py-1 rounded text-xs font-semibold {{ $badgeClass }}">
                                                    {{ ucfirst(str_replace('_', ' ', $rec)) }}
                                                </span>
                                            @else
                                                <span
                                                    class="inline-block px-2 py-1 rounded text-xs font-semibold bg-gray-100 text-gray-500">
                                                    Pending
                                                </span>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </td>

                            <td class="px-4 py-3 text-center">
                                <div class="flex flex-col gap-2 items-center">
                                    @foreach ($interview->emails as $email)
                                        <a href="{{ route('admin.hr.show', $email->id) }}"
                                            class="inline-block px-3 py-1 rounded text-xs font-semibold bg-indigo-50 text-indigo-700 hover:bg-indigo-700 hover:text-white transition-colors duration-150">
                                            {{ $email->category->name }}
                                        </a>
                                    @endforeach
                                </div>
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

    </div>

</x-layouts.app>
