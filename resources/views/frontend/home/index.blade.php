<div class="max-w-5xl mx-auto my-8 px-4 sm:px-6 lg:px-8">

    {{-- HEADER --}}
    <div class="text-center mb-8">

        <div class="flex justify-center mb-3">
            <img src="{{ asset('assets/images/rathinamgroup.png') }}" alt="Logo" class="h-14 w-auto drop-shadow-sm">
        </div>

        <h1 class="text-xl font-bold text-gray-800 tracking-wide">
            RATHINAM GROUP OF INSTITUTION
        </h1>

        <p class="text-blue-600 font-medium mt-1">
            Interview Assessment Form
        </p>

    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-4 mb-6">

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">

            <div>
                <p class="text-gray-500">Name of Candidate</p>
                <p class="font-semibold text-gray-800">John Doe</p>
            </div>

            <div>
                <p class="text-gray-500">Department</p>
                <p class="font-semibold text-gray-800">Computer Science</p>
            </div>

            <div>
                <p class="text-gray-500">Position</p>
                <p class="font-semibold text-gray-800">Frontend Developer</p>
            </div>

            <div>
                <p class="text-gray-500">Date of Interview</p>
                <p class="font-semibold text-gray-800">05 May 2026</p>
            </div>

        </div>

    </div>

    @php
    $attributes = [
    "Job Knowledge",
    "Experience (Relevance, Quality etc.)",
    "Past Achievements",
    "Academics (Division, % Consistency, Scholarships)",
    "Clarity of Thought",
    "Communication",
    "Motivation / Attitudes",
    "Likely Stability",
    "Appearance (Dress Code, Grooming etc.)",
    "Presentation Skill",
    "Computer Skills",
    "Overall Rating"
    ];
    @endphp

    <!-- ✅ MOBILE VIEW -->
    <div class="block sm:hidden space-y-4">

        @foreach($attributes as $key => $item)
        <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4">

            <div class="flex justify-between mb-2">
                <span class="font-semibold text-gray-700">{{ $key + 1 }}.</span>
                <span class="text-xs text-gray-400">Rating</span>
            </div>

            <p class="mb-3 font-medium text-gray-800">{{ $item }}</p>

            <div class="grid grid-cols-2 gap-2">

                @foreach(['excellent','good','average','below'] as $value)
                <label
                    class="option flex items-center gap-2 border border-gray-200 p-2 rounded-lg cursor-pointer transition">

                    <input type="radio" name="rating[{{ $key }}]" value="{{ $value }}" class="radio-input hidden">

                    <div class="box w-4 h-4 border border-gray-400 rounded flex items-center justify-center">
                        <span class="check-icon text-white text-xs hidden">✔</span>
                    </div>

                    <span class="capitalize text-sm text-gray-700">{{ $value }}</span>

                </label>
                @endforeach

            </div>
        </div>
        @endforeach

    </div>

    <!-- ✅ DESKTOP TABLE -->
    <div class="hidden sm:block overflow-x-auto bg-white rounded-2xl shadow-md border border-gray-200 p-4">

        <table class="w-full text-sm border-separate border-spacing-y-2">

            <thead>
                <tr class="text-gray-600">
                    <th class="p-2">S.No</th>
                    <th class="p-2 text-left">Attributes</th>
                    <th class="p-2">Excellent</th>
                    <th class="p-2">Good</th>
                    <th class="p-2">Average</th>
                    <th class="p-2">Below Avg</th>
                </tr>
            </thead>

            <tbody>
                @foreach($attributes as $key => $item)
                <tr class="bg-gray-50 hover:bg-blue-50 transition rounded-lg">

                    <td class="p-2 text-center font-medium text-gray-700">
                        {{ $key + 1 }}
                    </td>

                    <td class="p-2 text-gray-800 font-medium">
                        {{ $item }}
                    </td>

                    @foreach(['excellent','good','average','below'] as $value)
                    <td class="text-center">
                        <label class="cursor-pointer flex justify-center">

                            <input type="radio" name="rating[{{ $key }}]" value="{{ $value }}"
                                class="radio-input hidden">

                            <div
                                class="box w-5 h-5 border border-gray-400 rounded flex items-center justify-center transition">
                                <span class="check-icon text-white text-xs hidden">✔</span>
                            </div>

                        </label>
                    </td>
                    @endforeach

                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>

<style>
.radio-input:checked+.box {
    background-color: #2563eb;
    /* blue */
    border-color: #2563eb;
}

.main {
    background-color: #f3f4f6;
}

.radio-input:checked+.box .check-icon {
    display: block;
}

/* when selected → full card highlight */
.radio-input:checked+.box {
    background-color: #2563eb;
    border-color: #2563eb;
}

.radio-input:checked+.box .check-icon {
    display: block;
}

/* 🔥 highlight full option */
.radio-input:checked~span {
    font-weight: 600;
}

/* 🔥 highlight parent label */
.option:has(.radio-input:checked) {
    background-color: #eff6ff;
    border-color: #2563eb;
}
</style>