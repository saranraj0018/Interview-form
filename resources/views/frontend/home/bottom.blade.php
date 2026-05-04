<div class="px-4">
    <div class="max-w-[60rem] mb-8 bg-white mx-auto p-5 sm:p-6 
            border border-gray-200 rounded-2xl shadow-md text-sm">
        <!-- Overall Comments -->
        <div class="mb-6">
            <label class="font-semibold text-gray-700">Overall Comments</label>

            <textarea class="w-full mt-2 border border-gray-300 rounded-lg p-3 
               focus:ring-2 focus:ring-blue-400 outline-none 
               resize-none transition" rows="3" placeholder="Enter comments here..."></textarea>
        </div>

        <!-- Final Recommendations -->
        <div class="mb-6">
            <label class="font-semibold text-gray-700 block mb-3">
                Final Recommendations
            </label>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                @foreach([
                'selected' => 'Selected',
                'not_suitable' => 'Not suitable for the role',
                'rejected' => 'Rejected',
                'hold' => 'Hold for future reference'
                ] as $value => $label)

                <label class="flex items-center gap-3 border border-gray-200 
              rounded-lg p-3 cursor-pointer hover:border-blue-400">

                    <!-- input FIRST -->
                    <input type="radio" name="final_recommendation" value="{{ $value }}" class="radio-input hidden">

                    <!-- box IMMEDIATELY NEXT -->
                    <div class="box w-5 h-5 border border-gray-400 rounded 
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
                    <input type="text" class="w-full mt-1 border border-gray-300 rounded-lg p-2 
                          focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Expected Salary</label>
                    <input type="text" class="w-full mt-1 border border-gray-300 rounded-lg p-2 
                          focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Proposed Gross Salary</label>
                    <input type="text" class="w-full mt-1 border border-gray-300 rounded-lg p-2 
                          focus:ring-2 focus:ring-blue-400 outline-none">
                </div>

                <div>
                    <label class="text-sm text-gray-600">Proposed CTC Salary</label>
                    <input type="text" class="w-full mt-1 border border-gray-300 rounded-lg p-2 
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

                <tbody>
                    @for($i = 1; $i <= 3; $i++) <tr class="bg-gray-50 hover:bg-blue-50 transition">

                        <td class="p-2 text-center font-medium">{{ $i }}</td>

                        <td class="p-2">
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2 outline-none">
                        </td>

                        <td class="p-2">
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2 outline-none">
                        </td>

                        <td class="p-2">
                            <input type="date" class="w-full border border-gray-300 rounded-lg p-2 outline-none">
                        </td>

                        <td class="p-2">
                            <input type="text" class="w-full border border-gray-300 rounded-lg p-2 outline-none">
                        </td>

                        </tr>
                        @endfor
                </tbody>

            </table>
        </div>

    </div>
    <div class=" max-w-[60rem] mx-auto flex justify-end mt-6 mb-6">
        <button class="bg-gradient-to-r from-blue-600 to-indigo-600 
                   hover:from-blue-700 hover:to-indigo-700 
                   text-white px-8 py-3 rounded-xl shadow-lg 
                   transition duration-300">
            Submit Assessment
        </button>
    </div>
</div>

<style>
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