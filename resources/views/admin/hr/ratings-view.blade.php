<x-layouts.app>

<div class="p-6">

   <div class="flex items-center justify-between mb-6">

    <h2 class="text-2xl font-bold">
        Interview Ratings Summary
    </h2>

    <a href="{{ route('admin.hr.view') }}"
        class="bg-pink-100 text-pink-700 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-pink-600 hover:text-white transition">

        ← Back

    </a>

</div>

    {{-- Candidate Info --}}
    <div class="bg-white rounded-xl shadow p-4 mb-6">

        <div class="grid grid-cols-4 gap-4">

            <div>
                <div class="text-xs text-gray-500">Candidate</div>
                <div class="font-semibold">
                    {{ $interview->candidate->full_name }}
                </div>
            </div>

            <div>
                <div class="text-xs text-gray-500">Position</div>
                <div class="font-semibold">
                    {{ $interview->candidate->position_applied ?? '-' }}
                </div>
            </div>

            <div>
                <div class="text-xs text-gray-500">Department</div>
                <div class="font-semibold">
                    {{ $interview->department }}
                </div>
            </div>

            <div>
                <div class="text-xs text-gray-500">Date</div>
                <div class="font-semibold">
                    {{ \Carbon\Carbon::parse($interview->interview_date)->format('d M Y') }}
                </div>
            </div>

        </div>

    </div>

   {{-- Ratings Comparison Table --}}
<div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-pink-100">

    {{-- Header --}}
    <div class="bg-gradient-to-r from-pink-500 to-fuchsia-600 px-6 py-4">

        <h2 class="text-white text-xl font-bold">
            Interview Ratings Comparison
        </h2>

    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">

        <table class="w-full border-collapse">

            {{-- Head --}}
            <thead>

                <tr class="bg-pink-50">

                    <th class="px-6 py-4 text-left text-sm font-bold text-pink-700 border-b">
                        Skills
                    </th>

                    @foreach($interview->emails as $email)

                        <th class="px-6 py-4 text-center border-b min-w-[180px]">

                            <div class="text-sm font-bold text-gray-800">
                                {{ $email->category->person_name }}
                            </div>

                            <div class="text-xs text-gray-500 mt-1">
                                {{ $email->category->designation }}
                            </div>

                        </th>

                    @endforeach

                </tr>

            </thead>

            {{-- Body --}}
            <tbody>

                @php
                    $questions = $interview->emails->first()?->ratings;
                @endphp

                @foreach($questions as $index => $question)

                    <tr class="hover:bg-pink-50 transition duration-200">

                        {{-- Question --}}
                        <td class="px-6 py-4 border-b font-medium text-gray-700">

                            {{ $question->question }}

                        </td>

                        {{-- Each Interviewer Rating --}}
                        @foreach($interview->emails as $email)

                            @php
                                $rating = $email->ratings[$index]->rating ?? '-';
                            @endphp

                            <td class="px-6 py-4 text-center border-b">

                                <span class="
                                    inline-flex items-center justify-center
                                    min-w-[60px]
                                    px-3 py-1
                                    rounded-full
                                    text-sm font-bold
                                    bg-pink-100 text-pink-700
                                ">

                                    {{ $rating }}/5

                                </span>

                            </td>

                        @endforeach

                    </tr>

                @endforeach

            </tbody>

            {{-- Footer --}}
            <tfoot>

                <tr class="bg-gray-50">

                    <td class="px-6 py-4 font-bold text-gray-800">
                        Total Score
                    </td>

                    @foreach($interview->emails as $email)

                        @php
                            $total = $email->ratings->sum('rating');
                            $max = $email->ratings->count() * 5;
                        @endphp

                        <td class="px-6 py-4 text-center">

                            <span class="
                                inline-block
                                bg-gradient-to-r from-pink-500 to-fuchsia-600
                                text-white
                                px-4 py-2
                                rounded-xl
                                text-sm font-bold
                                shadow
                            ">

                                {{ $total }}/{{ $max }}

                            </span>

                        </td>

                    @endforeach

                </tr>

            </tfoot>

        </table>

    </div>

</div>

</div>

</x-layouts.app>