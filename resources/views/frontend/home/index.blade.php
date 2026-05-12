<form method="POST" action="{{ url('/interview/submit/' . $token) }}">
    @csrf
    <div class="max-w-5xl mx-auto my-8 px-4 sm:px-6 lg:px-8">

        {{-- HEADER --}}
        <div class="text-center mb-8">

            <div class="flex justify-center mb-3">
                <img src="{{ asset('assets/images/rathinamgroup.png') }}" alt="Logo"
                    class="h-14 w-auto drop-shadow-sm">
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
                    <p class="font-semibold text-gray-800">{{ $interview->candidate_name }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Department</p>
                    <p class="font-semibold text-gray-800">{{ $interview->department }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Position</p>
                    <p class="font-semibold text-gray-800">{{ $interview->position }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Date of Interview</p>
                    <p class="font-semibold text-gray-800">{{ $interview->interview_date }}</p>
                </div>

            </div>

        </div>

        @php
            $attributes = [
                'Job Knowledge',
                'Experience (Relevance, Quality etc.)',
                'Past Achievements',
                'Academics (Division, % Consistency, Scholarships)',
                'Clarity of Thought',
                'Communication',
                'Motivation / Attitudes',
                'Likely Stability',
                'Appearance (Dress Code, Grooming etc.)',
                'Presentation Skill',
                'Computer Skills',
            ];
        @endphp

        @if ($errors->any())

            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">

                <ul class="list-disc pl-5">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif
        <!-- ✅ MOBILE VIEW -->
        <div class="block sm:hidden space-y-4">

            @foreach ($attributes as $key => $item)
                <div class="bg-white rounded-xl shadow-md border border-gray-200 p-4">

                    <div class="flex justify-between mb-2">
                        <span class="font-semibold text-gray-700">{{ $key + 1 }}.</span>
                        <span class="text-xs text-gray-400">Rating</span>
                    </div>

                    <p class="mb-3 font-medium text-gray-800">{{ $item }}</p>

                    <div class="grid grid-cols-2 gap-2">

                        @foreach ([
        'excellent' => 5,
        'good' => 4,
        'average' => 3,
        'below' => 2,
    ] as $value => $mark)
                            <label
                                class="option flex items-center gap-2 border border-gray-200 p-2 rounded-lg cursor-pointer transition">

                                <input type="radio" name="rating[{{ $key }}]" value="{{ $mark }}"
                                    class="radio-input hidden rating-radio">

                                <div
                                    class="box w-4 h-4 border border-gray-400 rounded flex items-center justify-center">
                                    <span class="check-icon text-white text-xs hidden">✔</span>
                                </div>

                                <span class="capitalize text-sm text-gray-700">
                                    {{ $value }} ({{ $mark }})
                                </span>

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
                        <th class="p-2">Excellent (5)</th>
                        <th class="p-2">Good (4)</th>
                        <th class="p-2">Average (3)</th>
                        <th class="p-2">Below Avg (2)</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($attributes as $key => $item)
                        <tr class="bg-gray-50 hover:bg-blue-50 transition rounded-lg">

                            <td class="p-2 text-center font-medium text-gray-700">
                                {{ $key + 1 }}
                            </td>

                            <td class="p-2 text-gray-800 font-medium">
                                {{ $item }}
                            </td>

                            @foreach ([
        'excellent' => 5,
        'good' => 4,
        'average' => 3,
        'below' => 2,
    ] as $val => $mark)
                                <td class="text-center">
                                    <label class="cursor-pointer flex justify-center">

                                        <input type="radio" name="rating[{{ $key }}]"
                                            value="{{ $mark }}" data-label="{{ ucfirst($val) }}"
                                            class="radio-input hidden rating-radio">

                                        <div
                                            class="box w-5 h-5 border border-gray-400 rounded flex items-center justify-center transition">
                                            <span class="check-icon text-white text-xs hidden">✔</span>
                                        </div>

                                    </label>
                                </td>
                            @endforeach

                        </tr>
                    @endforeach

                    <tr class="bg-blue-50 border-t border-blue-200">

                        <td colspan="2" class="p-3 text-right font-bold text-gray-800">
                            Overall Rating
                        </td>

                        <td colspan="4" class="p-3 text-center">

                            <span class="text-2xl font-bold text-blue-700">
                                <span id="totalMarks">0</span> / 55
                            </span>

                        </td>

                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <div class="px-4">
        <div
            class="max-w-[60rem] mb-8 bg-white mx-auto p-5 sm:p-6
            border border-gray-200 rounded-2xl shadow-md text-sm">
            <!-- Overall Comments -->
            <div class="mb-6">
                <label class="font-semibold text-gray-700">Overall Comments</label>

                <textarea name="comments"
                    class="w-full mt-2 border border-gray-300 rounded-lg p-3
               focus:ring-2 focus:ring-blue-400 outline-none
               resize-none transition"
                    rows="3" placeholder="Enter comments here..."></textarea>
            </div>

            <!-- Final Recommendations -->
            <div class="mb-6">
                <label class="font-semibold text-gray-700 block mb-3">
                    Final Recommendations
                </label>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                    @foreach ([
        'selected' => 'Selected',
        'not_suitable' => 'Not suitable for the role',
        'rejected' => 'Rejected',
        'hold' => 'Hold for future reference',
    ] as $value => $label)
                        <label
                            class="flex items-center gap-3 border border-gray-200
              rounded-lg p-3 cursor-pointer hover:border-blue-400">

                            <!-- input FIRST -->
                            <input type="radio" name="final_recommendation" value="{{ $value }}"
                                class="radio-input hidden">

                            <!-- box IMMEDIATELY NEXT -->
                            <div
                                class="box w-5 h-5 border border-gray-400 rounded
                flex items-center justify-center">

                                <span class="check-icon text-white text-xs hidden">✔</span>
                            </div>

                            <span class="text-gray-700">
                                {{ $label }}
                            </span>

                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Salary Details -->
            <div class="mb-6">
                <h2 class="font-semibold text-gray-700 mb-3">Salary Details</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <div>
                        <label class="text-sm text-gray-600">Present Salary</label>
                        <input type="number"
    name="present_salary"
    min="0"
    step="any"
    class="w-full mt-1 border border-gray-300 rounded-lg p-2
    focus:ring-2 focus:ring-blue-400 outline-none">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Expected Salary</label>
                        <input type="number"
    name="expected_salary"
    min="0"
    step="any"
    class="w-full mt-1 border border-gray-300 rounded-lg p-2
    focus:ring-2 focus:ring-blue-400 outline-none">

                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Proposed Gross Salary</label>
                       <input type="number"
    name="proposed_gross"
    min="0"
    step="any"
    class="w-full mt-1 border border-gray-300 rounded-lg p-2
    focus:ring-2 focus:ring-blue-400 outline-none">
                    </div>

                    <div>
                        <label class="text-sm text-gray-600">Proposed CTC Salary</label>
                        <input type="number"
    name="proposed_ctc"
    min="0"
    step="any"
    class="w-full mt-1 border border-gray-300 rounded-lg p-2
    focus:ring-2 focus:ring-blue-400 outline-none">
                    </div>

                </div>
            </div>

            <!-- Panel Members -->
            <div class="overflow-x-auto">

                <h2 class="font-semibold text-gray-700 mb-3">Panel Members</h2>

                <table class="w-full text-sm border-separate border-spacing-y-2 min-w-[700px]">

                    <thead>
                        <tr class="text-gray-600">
                            <th class="p-2">S No</th>
                            <th class="p-2">Name & Designation</th>
                            <th class="p-2">Signature</th>
                            <th class="p-2">Date</th>
                            <th class="p-2">Comments</th>
                        </tr>
                    </thead>

                    <!-- ✅ FIRST ROW ONLY REQUIRED -->

                    <tbody>
                        @for ($i = 1; $i <= 3; $i++)
                            <tr class="bg-gray-50 hover:bg-blue-50 transition">

                                <td class="p-2 text-center font-medium">
                                    {{ $i }}
                                </td>

                                <!-- Name -->
                               <td class="p-2">
    <input type="text" name="panel[{{ $i }}][name]"
        class="w-full border border-gray-300 rounded-lg p-2 outline-none">
</td>

<!-- Signature -->
<td class="p-2">
    <input type="text" name="panel[{{ $i }}][signature]"
        class="w-full border border-gray-300 rounded-lg p-2 outline-none">
</td>

<!-- Date -->
<td class="p-2">
    <input type="date" name="panel[{{ $i }}][date]"
        class="w-full border border-gray-300 rounded-lg p-2 outline-none">
</td>

<!-- Comments -->
<td class="p-2">
    <input type="text" name="panel[{{ $i }}][comments]"
        class="w-full border border-gray-300 rounded-lg p-2 outline-none">
</td>

                            </tr>
                        @endfor
                    </tbody>

                </table>
            </div>

        </div>
        <div class=" max-w-[60rem] mx-auto flex justify-end mt-6 mb-6">
            <button
                class="bg-gradient-to-r from-blue-600 to-indigo-600
                   hover:from-blue-700 hover:to-indigo-700
                   text-white px-8 py-3 rounded-xl shadow-lg
                   transition duration-300">
                Submit Assessment
            </button>
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

        .radio-input:checked+.box {
            background-color: #16a34a;
            /* green */
            border-color: #16a34a;
        }

        .radio-input:checked+.box .check-icon {
            display: block;
        }

        .radio-input:checked+.box+span {
            font-weight: 600;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const form = document.querySelector("form");

            const radios = document.querySelectorAll(".rating-radio");

            const totalMarks = document.getElementById("totalMarks");

            // ✅ Overall Rating Count
            function calculateTotal() {

                let total = 0;

                radios.forEach(radio => {

                    if (radio.checked) {

                        total += parseInt(radio.value);

                    }

                });

                totalMarks.innerText = total;
            }

            // ✅ Trigger on radio change
            radios.forEach(radio => {

                radio.addEventListener("change", calculateTotal);

            });

            // ✅ Toast
            function showToast(message) {

                const oldToast = document.querySelector(".custom-toast");

                if (oldToast) {
                    oldToast.remove();
                }

                const toast = document.createElement("div");

                toast.className =
                    "custom-toast fixed top-5 right-5 bg-red-500 text-white px-5 py-3 rounded-lg shadow-lg z-50";

                toast.innerText = message;

                document.body.appendChild(toast);

                setTimeout(() => {
                    toast.remove();
                }, 2500);
            }

            // ✅ Form Validation
            form.addEventListener("submit", function(e) {

                // Ratings
                for (let i = 0; i < 11; i++) {

                    const checked = document.querySelector(
                        `input[name="rating[${i}]"]:checked`
                    );

                    if (!checked) {

                        e.preventDefault();

                        showToast(
                            `Please select rating for Question ${i + 1}`
                        );

                        return;
                    }
                }

                // Comments
                const comments = document.querySelector(
                    'textarea[name="comments"]'
                );

                if (!comments.value.trim()) {

                    e.preventDefault();

                    showToast("Comments field is required");

                    comments.focus();

                    return;
                }

                // Final Recommendation
                const finalRecommendation = document.querySelector(
                    'input[name="final_recommendation"]:checked'
                );

                if (!finalRecommendation) {

                    e.preventDefault();

                    showToast("Please select final recommendation");

                    return;
                }

                // Salary Fields
                const salaryFields = {
                    present_salary: "Present salary is required",
                    expected_salary: "Expected salary is required",
                    proposed_gross: "Proposed gross salary is required",
                    proposed_ctc: "Proposed CTC salary is required"
                };

                for (const field in salaryFields) {

                    const input = document.querySelector(
                        `[name="${field}"]`
                    );

                    if (!input.value.trim()) {

                        e.preventDefault();

                        showToast(salaryFields[field]);

                        input.focus();

                        return;
                    }
                }

               const panelFields = {
    'panel[1][name]': 'Panel member name is required',
    'panel[1][signature]': 'Panel signature is required',
    'panel[1][date]': 'Panel date is required',
    'panel[1][comments]': 'Panel comments is required'
};

for (const field in panelFields) {

    const input = document.querySelector(
        `[name="${field}"]`
    );

    if (!input || !input.value.trim()) {

        e.preventDefault();

        showToast(panelFields[field]);

        input?.focus();

        return;
    }
}

            });

        });
    </script>
