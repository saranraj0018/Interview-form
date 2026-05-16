<div class="min-h-screen py-10 px-4">
    <div class="max-w-[1100px] mx-auto bg-white rounded-3xl shadow-xl border border-gray-200 overflow-hidden">

        <!-- Header -->
        <div class="px-8 py-6 border-b border-gray-200 text-center">
            <img src="{{ asset('assets/images/rathinamgroup.png') }}" alt="Logo" class="w-16 mx-auto mb-3">
            <h1 class="text-2xl font-bold text-gray-800">
                Candidate Personal Data Sheet
            </h1>
        </div>

        <!-- Form -->
        <div class="p-8 space-y-8">

            <!-- Top Details -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                <div>
                    <label class="text-sm font-medium text-gray-700">Date</label>
                    <input type="date"
                        class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Time</label>
                    <input type="time"
                        class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Source</label>
                    <input type="text" placeholder="Enter source"
                        class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Position Applied For</label>
                    <input type="text" placeholder="Position"
                        class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">
                </div>
            </div>

            <!-- Name -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- First Name -->
                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Enter Your Full Name
                    </label>

                    <input type=" text" placeholder="Enter Your Full Name"
                        class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">
                </div>

                <!-- Contact Address -->
                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Contact Address
                    </label>

                    <textarea rows="1" placeholder="Enter Your Address"
                        class=" w-full mt-2 border border-gray-300 rounded-xl px-4 py-3"></textarea>
                </div>

            </div>

            <!-- Contact -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                <div>
                    <label class="text-sm font-medium text-gray-700">Pin Code</label>
                    <input type="number" placeholder="Enter Your Pin Code"
                        class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Email ID</label>
                    <input type="email" placeholder="Enter Your Email" class=" w-full mt-2 border border-gray-300
                        rounded-xl px-4 py-3">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Phone</label>
                    <input type="number" placeholder="Enter Your Phone Number" class=" w-full mt-2 border border-gray-300
                        rounded-xl px-4 py-3">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Mobile</label>
                    <input type="number" placeholder="Enter Your Mobile Number"
                        class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">
                </div>
            </div>

            <!-- Basic Details -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                <div>
                    <label class="text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Age</label>
                    <input type="number" placeholder="Enter Your Age"
                        class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Gender</label>
                    <select class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">
                        <option>Select</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Marital Status</label>
                    <select class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">
                        <option>Select</option>
                        <option>Single</option>
                        <option>Married</option>
                    </select>
                </div>
            </div>

            <!-- Salary -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Current Gross (Per Annum)
                    </label>
                    <input type="text" placeholder="Enter Your Current Gross" class=" w-full mt-2 border border-gray-300 rounded-xl
                        px-4 py-3">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Expected Gross (Per Annum)
                    </label>
                    <input type="text" placeholder="Enter Your Expected Gross"
                        class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Total Years of Experience
                    </label>
                    <input type="number" placeholder="Enter Your Years of Experience"
                        class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">
                </div>
            </div>

            <!-- Notice Period -->
            <div>
                <label class="text-sm font-medium text-gray-700">
                    Current Company Notice Period
                </label>

                <input type="text" placeholder="Enter The Notice Period"
                    class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">
            </div>

            <!-- Educational Qualification -->
            <div>

                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">

                    <h2 class="text-lg font-semibold text-gray-800">
                        Educational Qualifications
                    </h2>

                    <!-- Button -->
                    <div class="flex gap-3">

                        <button type="button" id="addRowBtn" class="bg-blue-600 hover:bg-blue-700
                text-white
                px-4 py-2
                rounded-xl
                text-xs sm:text-sm
                w-full sm:w-auto
                transition-all duration-300">
                            Add Row
                        </button>

                    </div>

                </div>

                <!-- Table -->
                <div class="w-full overflow-x-auto rounded-2xl border border-gray-200 shadow-sm">

                    <table class="min-w-[950px] w-full text-sm" id="educationTable">

                        <!-- Head -->
                        <thead class="bg-[#f8fafc] text-gray-700">

                            <tr>

                                <th class="p-3 sm:p-4 border whitespace-nowrap">
                                    Degree
                                </th>

                                <th class="p-3 sm:p-4 border whitespace-nowrap">
                                    Division
                                </th>

                                <th class="p-3 sm:p-4 border whitespace-nowrap">
                                    College
                                </th>

                                <th class="p-3 sm:p-4 border whitespace-nowrap">
                                    Board / University
                                </th>

                                <th class="p-3 sm:p-4 border whitespace-nowrap">
                                    % Marks
                                </th>

                                <th class="p-3 sm:p-4 border whitespace-nowrap">
                                    Major Subjects
                                </th>

                                <th class="p-3 sm:p-4 border whitespace-nowrap">
                                    Year of Passing
                                </th>

                                <th class="p-3 sm:p-4 border text-center whitespace-nowrap">
                                    Action
                                </th>

                            </tr>

                        </thead>

                        <!-- Body -->
                        <tbody id="educationBody">

                            <!-- Default Row -->
                            <tr class="hover:bg-gray-50 transition-all duration-200">

                                <td class="border p-2">

                                    <input type="text" placeholder="Enter Degree" class="w-full
                            min-w-[120px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <td class="border p-2">

                                    <input type="text" placeholder="Division" class="w-full
                            min-w-[120px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <td class="border p-2">

                                    <input type="text" placeholder="College" class="w-full
                            min-w-[180px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <td class="border p-2">

                                    <input type="text" placeholder="University" class="w-full
                            min-w-[180px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <td class="border p-2">

                                    <input type="text" placeholder="%" class="w-full
                            min-w-[100px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <td class="border p-2">

                                    <input type="text" placeholder="Subjects" class="w-full
                            min-w-[180px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <td class="border p-2">

                                    <input type="text" placeholder="Year" class="w-full
                            min-w-[120px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <td class="border p-2 text-center">

                                    <button type="button" class="removeRow
                            bg-red-500 hover:bg-red-600
                            text-white
                            w-8 h-8
                            rounded-lg
                            text-sm
                            transition-all duration-300">
                                        ✕
                                    </button>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- Work Experience -->
            <div>

                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">

                    <h2 class="text-lg font-semibold text-gray-800">
                        Work Experience
                    </h2>

                    <!-- Button -->
                    <div class="flex gap-3">

                        <button type="button" id="addExperienceRowBtn" class="bg-blue-600 hover:bg-blue-700
                text-white
                px-4 py-2
                rounded-xl
                text-xs sm:text-sm
                w-full sm:w-auto
                transition-all duration-300">
                            Add Row
                        </button>

                    </div>

                </div>

                <!-- Responsive Table -->
                <div class="w-full overflow-x-auto rounded-2xl border border-gray-200 shadow-sm">

                    <table class="min-w-[1050px] w-full text-sm" id="experienceTable">

                        <!-- Head -->
                        <thead class="bg-[#f8fafc] text-gray-700">

                            <tr>

                                <th class="p-3 sm:p-4 border whitespace-nowrap">
                                    Organization
                                </th>

                                <th class="p-3 sm:p-4 border whitespace-nowrap">
                                    Designation
                                </th>

                                <th class="p-3 sm:p-4 border whitespace-nowrap">
                                    From
                                </th>

                                <th class="p-3 sm:p-4 border whitespace-nowrap">
                                    To
                                </th>

                                <th class="p-3 sm:p-4 border whitespace-nowrap">
                                    Gross Salary PM
                                </th>

                                <th class="p-3 sm:p-4 border whitespace-nowrap">
                                    Annual CTC
                                </th>

                                <th class="p-3 sm:p-4 border whitespace-nowrap">
                                    Reason for Leaving
                                </th>

                                <th class="p-3 sm:p-4 border text-center whitespace-nowrap">
                                    Action
                                </th>

                            </tr>

                        </thead>

                        <!-- Body -->
                        <tbody id="experienceBody">

                            <!-- Default Row -->
                            <tr class="hover:bg-gray-50 transition-all duration-200">

                                <td class="border p-2">

                                    <input type="text" name="organization[]" placeholder="Organization" class="w-full
                            min-w-[180px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <td class="border p-2">

                                    <input type="text" name="designation[]" placeholder="Designation" class="w-full
                            min-w-[150px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <td class="border p-2">

                                    <input type="date" name="from_date[]" class="w-full
                            min-w-[150px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <td class="border p-2">

                                    <input type="date" name="to_date[]" class="w-full
                            min-w-[150px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <td class="border p-2">

                                    <input type="text" name="gross_salary[]" placeholder="Gross Salary" class="w-full
                            min-w-[160px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <td class="border p-2">

                                    <input type="text" name="annual_ctc[]" placeholder="Annual CTC" class="w-full
                            min-w-[160px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <td class="border p-2">

                                    <input type="text" name="reason_for_leaving[]" placeholder="Reason" class="w-full
                            min-w-[220px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <td class="border p-2 text-center">

                                    <button type="button" class="removeExperienceRow
                            bg-red-500 hover:bg-red-600
                            text-white
                            w-8 h-8
                            rounded-lg
                            text-sm
                            transition-all duration-300">
                                        ✕
                                    </button>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- Career Break -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Career Break -->
                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Career Break (If Any)
                    </label>

                    <textarea rows="2"
                        class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <!-- Certifications -->
                <div>
                    <label class="text-sm font-medium text-gray-700">
                        Certifications if Any
                        (E.g.: Oracle, Java, Network etc.)
                    </label>

                    <textarea rows="2"
                        class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

            </div>


            <!-- Language Known -->
            <div class="mt-10">

                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">
                        Language Known
                    </h2>

                    <div class="text-xs text-gray-500">
                        R - Read | W - Write | S - Speak | U - Understand
                    </div>
                </div>

                <div class="overflow-x-auto rounded-2xl border border-gray-200 shadow-sm">

                    <table class="w-full text-sm text-center">

                        <thead class="bg-[#f8fafc] text-gray-700">

                            <tr>
                                <th class="border border-gray-200 p-3 font-semibold">S. No.</th>
                                <th class="border border-gray-200 p-3 font-semibold">Language</th>
                                <th class="border border-gray-200 p-3 font-semibold">R</th>
                                <th class="border border-gray-200 p-3 font-semibold">W</th>
                                <th class="border border-gray-200 p-3 font-semibold">S</th>
                                <th class="border border-gray-200 p-3 font-semibold">U</th>

                                <th class="border border-gray-200 p-3 font-semibold">S. No.</th>
                                <th class="border border-gray-200 p-3 font-semibold">Language</th>
                                <th class="border border-gray-200 p-3 font-semibold">R</th>
                                <th class="border border-gray-200 p-3 font-semibold">W</th>
                                <th class="border border-gray-200 p-3 font-semibold">S</th>
                                <th class="border border-gray-200 p-3 font-semibold">U</th>
                            </tr>

                        </thead>

                        <tbody class="bg-white">

                            @for ($i = 1; $i <= 3; $i++) <tr class="hover:bg-gray-50 transition">

                                <td class="border border-gray-200 p-3 font-medium text-gray-600">
                                    {{ $i }}
                                </td>

                                <td class="border border-gray-200 p-2">
                                    <input type="text"
                                        class="w-full rounded-lg px-3 py-2 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                </td>

                                @for ($j = 1; $j <= 4; $j++) <td class="border border-gray-200 p-3">
                                    <input type="checkbox"
                                        class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    </td>
                                    @endfor

                                    <td class="border border-gray-200 p-3 font-medium text-gray-600">
                                        {{ $i + 3 }}
                                    </td>

                                    <td class="border border-gray-200 p-2">
                                        <input type="text"
                                            class="w-full rounded-lg px-3 py-2 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    </td>

                                    @for ($j = 1; $j <= 4; $j++) <td class="border border-gray-200 p-3">
                                        <input type="checkbox"
                                            class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        </td>
                                        @endfor

                                        </tr>

                                        @endfor

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- Family Details -->
            <div class="mt-10">

                <!-- Header -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">

                    <h2 class="text-lg font-semibold text-gray-800">
                        Family Details
                    </h2>

                    <!-- Buttons -->
                    <div class="flex gap-3">

                        <button type="button" id="addFamilyRowBtn" class="bg-blue-600 hover:bg-blue-700
                text-white
                px-4 py-2
                rounded-xl
                text-xs sm:text-sm
                w-full sm:w-auto
                transition-all duration-300">
                            Add Row
                        </button>

                    </div>

                </div>

                <!-- Responsive Table -->
                <div class="w-full overflow-x-auto rounded-2xl border border-gray-200 shadow-sm">

                    <table class="min-w-[1100px] w-full text-sm" id="familyTable">

                        <thead class="bg-[#f8fafc] text-gray-700">

                            <tr>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    S. No.
                                </th>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    Name
                                </th>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    Age
                                </th>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    Relationship
                                </th>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    Occupation
                                </th>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    Dependent
                                </th>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    Contact No
                                </th>

                                <th class="border border-gray-200 p-3 text-center whitespace-nowrap">
                                    Action
                                </th>

                            </tr>

                        </thead>

                        <tbody class="bg-white" id="familyBody">

                            <!-- Default Row -->
                            <tr class="hover:bg-gray-50 transition-all duration-200">

                                <!-- Serial -->
                                <td class="border border-gray-200 p-3 text-center font-medium text-gray-600 serialNo">
                                    1
                                </td>

                                <!-- Name -->
                                <td class="border border-gray-200 p-2">

                                    <input type="text" name="family_name[]" placeholder="Enter Name" class="w-full
                            min-w-[180px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <!-- Age -->
                                <td class="border border-gray-200 p-2">

                                    <input type="text" name="family_age[]" placeholder="Age" class="w-full
                            min-w-[100px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <!-- Relationship -->
                                <td class="border border-gray-200 p-2">

                                    <input type="text" name="family_relationship[]" placeholder="Relationship" class="w-full
                            min-w-[180px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <!-- Occupation -->
                                <td class="border border-gray-200 p-2">

                                    <input type="text" name="family_occupation[]" placeholder="Occupation" class="w-full
                            min-w-[180px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <!-- Dependent -->
                                <td class="border border-gray-200 p-2">

                                    <select name="family_dependent[]" class="w-full
                            min-w-[140px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                        <option>Select</option>
                                        <option>Yes</option>
                                        <option>No</option>

                                    </select>

                                </td>

                                <!-- Contact -->
                                <td class="border border-gray-200 p-2">

                                    <input type="text" name="family_contact[]" placeholder="Contact Number" class="w-full
                            min-w-[160px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <!-- Action -->
                                <td class="border border-gray-200 p-2 text-center">

                                    <button type="button" class="removeFamilyRow
                            bg-red-500 hover:bg-red-600
                            text-white
                            w-8 h-8
                            rounded-lg
                            text-sm
                            transition-all duration-300">
                                        ✕
                                    </button>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- Other Details -->
            <div class="mt-10 space-y-8">

                <div class="bg-[#f8fafc] rounded-2xl p-6 border border-gray-200">

                    <label class="text-sm font-medium text-gray-700 block">
                        Are you willing to work on Sundays?
                    </label>

                    <div class="mt-4 flex gap-8">

                        <label class="flex items-center gap-3 text-sm text-gray-700 cursor-pointer">
                            <input type="radio" name="sunday_work" class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                            Yes
                        </label>

                        <label class="flex items-center gap-3 text-sm text-gray-700 cursor-pointer">
                            <input type="radio" name="sunday_work" class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                            No
                        </label>

                    </div>

                </div>

                <div class="flex flex-col">
                    <label class="text-sm font-medium text-gray-700">Joining Date required</label>
                    <input type="date"
                        class="w-full sm:max-w-[30%] mt-2 border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>

                    <label class="text-sm font-medium text-gray-700 leading-6">
                        Is there any litigation pending against you filed by
                        (a) Any relative (b) Otherwise?
                        If Yes, Please provide details.
                    </label>

                    <textarea rows="1"
                        class="w-full mt-3 border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

                </div>

            </div>

            <!-- References -->
            <div class="mt-10">

                <!-- Heading -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">

                    <h2 class="text-lg font-semibold text-gray-800">
                        References (From your current Organization)
                    </h2>

                </div>

                <!-- Responsive Table -->
                <div class="w-full overflow-x-auto rounded-2xl border border-gray-200 shadow-sm">

                    <table class="min-w-[750px] w-full text-sm">

                        <!-- Table Head -->
                        <thead class="bg-[#f8fafc] text-gray-700">

                            <tr>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    S. No.
                                </th>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    Name
                                </th>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    Designation
                                </th>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    Mobile
                                </th>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    Phone
                                </th>

                            </tr>

                        </thead>

                        <!-- Table Body -->
                        <tbody class="bg-white">

                            @for ($i = 1; $i <= 2; $i++) <tr class="hover:bg-gray-50 transition-all duration-200">

                                <!-- Serial -->
                                <td class="border border-gray-200 p-3 text-center font-medium text-gray-600">
                                    {{ $i }}
                                </td>

                                <!-- Name -->
                                <td class="border border-gray-200 p-2">

                                    <input type="text" placeholder="Enter Name" class="w-full
                            min-w-[200px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <!-- Designation -->
                                <td class="border border-gray-200 p-2">

                                    <input type="text" placeholder="Enter Designation" class="w-full
                            min-w-[200px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <!-- Mobile -->
                                <td class="border border-gray-200 p-2">

                                    <input type="text" placeholder="Enter Mobile Number" class="w-full
                            min-w-[180px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <!-- Phone -->
                                <td class="border border-gray-200 p-2">

                                    <input type="text" placeholder="Enter Phone Number" class="w-full
                            min-w-[180px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                </tr>

                                @endfor

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- Refer Friends -->
            <div class="mt-10">

                <!-- Heading -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">

                    <h2 class="text-lg font-semibold text-gray-800">
                        Please Refer your friends who would like to join us
                    </h2>

                </div>

                <!-- Responsive Table -->
                <div class="w-full overflow-x-auto rounded-2xl border border-gray-200 shadow-sm">

                    <table class="min-w-[750px] w-full text-sm">

                        <!-- Table Head -->
                        <thead class="bg-[#f8fafc] text-gray-700">

                            <tr>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    S. No.
                                </th>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    Name
                                </th>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    Relationship
                                </th>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    Mobile
                                </th>

                                <th class="border border-gray-200 p-3 whitespace-nowrap">
                                    Phone
                                </th>

                            </tr>

                        </thead>

                        <!-- Table Body -->
                        <tbody class="bg-white">

                            @for ($i = 1; $i <= 2; $i++) <tr class="hover:bg-gray-50 transition-all duration-200">

                                <!-- Serial -->
                                <td class="border border-gray-200 p-3 text-center font-medium text-gray-600">
                                    {{ $i }}
                                </td>

                                <!-- Name -->
                                <td class="border border-gray-200 p-2">

                                    <input type="text" placeholder="Enter Name" class="w-full
                            min-w-[200px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <!-- Relationship -->
                                <td class="border border-gray-200 p-2">

                                    <input type="text" placeholder="Enter Relationship" class="w-full
                            min-w-[200px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <!-- Mobile -->
                                <td class="border border-gray-200 p-2">

                                    <input type="text" placeholder="Enter Mobile Number" class="w-full
                            min-w-[180px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                <!-- Phone -->
                                <td class="border border-gray-200 p-2">

                                    <input type="text" placeholder="Enter Phone Number" class="w-full
                            min-w-[180px]
                            rounded-lg
                            px-3 py-2
                            border border-gray-200
                            focus:outline-none
                            focus:ring-2
                            focus:ring-blue-500">

                                </td>

                                </tr>

                                @endfor

                        </tbody>

                    </table>

                </div>

            </div>

            <!-- Employee Reference -->
            <div class="mt-10">

                <label class="text-sm font-medium text-gray-700 leading-6">
                    Do you know any Rathinam Employees?
                    Yes / No
                    If Yes Please mention the name and your relationship with them:
                </label>

                <textarea rows="1"
                    class="w-full mt-3 border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

            </div>

            <!-- Declaration -->
            <div class="mt-12 bg-[#f8fafc] rounded-2xl border border-gray-200 p-6">

                <p class="text-sm text-gray-700 leading-7">
                    I hereby solemnly declare that all the details furnished above are true
                    to the best of my knowledge.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-12">

                    <div>
                        <label class="text-sm font-medium text-gray-700">Date</label>
                        <input type="date"
                            class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Place</label>
                        <input type="text" placeholder="Enter Your Place"
                            class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Signature</label>
                        <input type="text" placeholder="Enter Your Signature"
                            class="w-full mt-2 border border-gray-300 rounded-xl px-4 py-3">
                    </div>

                </div>

            </div>

            <!-- Submit Button -->
            <div class="mt-10 flex justify-center sm:justify-end">

                <button type="submit" class="w-full sm:w-auto
        bg-gradient-to-r
        from-[#0b2c5f]
        to-[#123d7d]
        hover:scale-[1.02]
        text-white
        font-semibold
        text-sm sm:text-base
        px-8 py-3.5
        rounded-2xl
        shadow-lg
        transition-all duration-300">

                    Submit Form

                </button>

            </div>

            <!-- Footer -->
            <div class="mt-10 text-xs text-gray-500 text-center border-t border-gray-200 pt-4">
                Doc Ref: RGI/HR/FR 001 Rev:02 -
                Date of Issue: 01-06-2025
            </div>

        </div>
    </div>
</div>



<!-- Script -->
<script>
const addRowBtn = document.getElementById('addRowBtn');
const educationBody = document.getElementById('educationBody');

const maxRows = 3;

// Add Row
addRowBtn.addEventListener('click', () => {

    const currentRows = educationBody.querySelectorAll('tr').length;

    if (currentRows >= maxRows) {

        alert('Maximum 3 rows only allowed');
        return;

    }

    const newRow = `

        <tr class="hover:bg-gray-50 transition-all duration-200">

            <td class="border p-2">

                <input type="text"
                    placeholder="Enter Degree"
                    class="w-full
                    min-w-[120px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <td class="border p-2">

                <input type="text"
                    placeholder="Division"
                    class="w-full
                    min-w-[120px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <td class="border p-2">

                <input type="text"
                    placeholder="College"
                    class="w-full
                    min-w-[180px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <td class="border p-2">

                <input type="text"
                    placeholder="University"
                    class="w-full
                    min-w-[180px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <td class="border p-2">

                <input type="text"
                    placeholder="%"
                    class="w-full
                    min-w-[100px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <td class="border p-2">

                <input type="text"
                    placeholder="Subjects"
                    class="w-full
                    min-w-[180px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <td class="border p-2">

                <input type="text"
                    placeholder="Year"
                    class="w-full
                    min-w-[120px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <td class="border p-2 text-center">

                <button type="button"
                    class="removeRow
                    bg-red-500 hover:bg-red-600
                    text-white
                    w-8 h-8
                    rounded-lg
                    text-sm
                    transition-all duration-300">
                    ✕
                </button>

            </td>

        </tr>

    `;

    educationBody.insertAdjacentHTML('beforeend', newRow);

});

// Remove Row
educationBody.addEventListener('click', function(e) {

    if (e.target.classList.contains('removeRow')) {

        const rows = educationBody.querySelectorAll('tr');

        // Prevent removing last row
        if (rows.length === 1) {

            alert('At least one row is required');
            return;

        }

        e.target.closest('tr').remove();

    }

});
</script>

<!-- Script -->
<script>
const addExperienceRowBtn = document.getElementById('addExperienceRowBtn');
const experienceBody = document.getElementById('experienceBody');

const maxExperienceRows = 3;

// Add Row
addExperienceRowBtn.addEventListener('click', () => {

    const currentRows = experienceBody.querySelectorAll('tr').length;

    if (currentRows >= maxExperienceRows) {

        alert('Maximum 3 rows only allowed');
        return;

    }

    const newRow = `

        <tr class="hover:bg-gray-50 transition-all duration-200">

            <td class="border p-2">

                <input type="text"
                    name="organization[]"
                    placeholder="Organization"
                    class="w-full
                    min-w-[180px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <td class="border p-2">

                <input type="text"
                    name="designation[]"
                    placeholder="Designation"
                    class="w-full
                    min-w-[150px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <td class="border p-2">

                <input type="date"
                    name="from_date[]"
                    class="w-full
                    min-w-[150px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <td class="border p-2">

                <input type="date"
                    name="to_date[]"
                    class="w-full
                    min-w-[150px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <td class="border p-2">

                <input type="text"
                    name="gross_salary[]"
                    placeholder="Gross Salary"
                    class="w-full
                    min-w-[160px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <td class="border p-2">

                <input type="text"
                    name="annual_ctc[]"
                    placeholder="Annual CTC"
                    class="w-full
                    min-w-[160px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <td class="border p-2">

                <input type="text"
                    name="reason_for_leaving[]"
                    placeholder="Reason"
                    class="w-full
                    min-w-[220px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <td class="border p-2 text-center">

                <button type="button"
                    class="removeExperienceRow
                    bg-red-500 hover:bg-red-600
                    text-white
                    w-8 h-8
                    rounded-lg
                    text-sm
                    transition-all duration-300">
                    ✕
                </button>

            </td>

        </tr>

    `;

    experienceBody.insertAdjacentHTML('beforeend', newRow);

});

// Remove Row
experienceBody.addEventListener('click', function(e) {

    if (e.target.classList.contains('removeExperienceRow')) {

        const rows = experienceBody.querySelectorAll('tr');

        // Prevent removing last row
        if (rows.length === 1) {

            alert('At least one row is required');
            return;

        }

        e.target.closest('tr').remove();

    }

});
</script>



<!-- Script -->
<script>
const addFamilyRowBtn = document.getElementById('addFamilyRowBtn');
const familyBody = document.getElementById('familyBody');

const maxFamilyRows = 15;

// Update Serial Numbers
function updateFamilySerialNumbers() {

    const rows = familyBody.querySelectorAll('tr');

    rows.forEach((row, index) => {

        row.querySelector('.serialNo').textContent = index + 1;

    });

}

// Add Row
addFamilyRowBtn.addEventListener('click', () => {

    const currentRows = familyBody.querySelectorAll('tr').length;

    if (currentRows >= maxFamilyRows) {

        alert('Maximum 15 rows only allowed');
        return;

    }

    const newRow = `

        <tr class="hover:bg-gray-50 transition-all duration-200">

            <!-- Serial -->
            <td class="border border-gray-200 p-3 text-center font-medium text-gray-600 serialNo">
                ${currentRows + 1}
            </td>

            <!-- Name -->
            <td class="border border-gray-200 p-2">

                <input type="text"
                    name="family_name[]"
                    placeholder="Enter Name"
                    class="w-full
                    min-w-[180px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <!-- Age -->
            <td class="border border-gray-200 p-2">

                <input type="text"
                    name="family_age[]"
                    placeholder="Age"
                    class="w-full
                    min-w-[100px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <!-- Relationship -->
            <td class="border border-gray-200 p-2">

                <input type="text"
                    name="family_relationship[]"
                    placeholder="Relationship"
                    class="w-full
                    min-w-[180px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <!-- Occupation -->
            <td class="border border-gray-200 p-2">

                <input type="text"
                    name="family_occupation[]"
                    placeholder="Occupation"
                    class="w-full
                    min-w-[180px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <!-- Dependent -->
            <td class="border border-gray-200 p-2">

                <select name="family_dependent[]"
                    class="w-full
                    min-w-[140px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

                    <option>Select</option>
                    <option>Yes</option>
                    <option>No</option>

                </select>

            </td>

            <!-- Contact -->
            <td class="border border-gray-200 p-2">

                <input type="text"
                    name="family_contact[]"
                    placeholder="Contact Number"
                    class="w-full
                    min-w-[160px]
                    rounded-lg
                    px-3 py-2
                    border border-gray-200
                    focus:outline-none
                    focus:ring-2
                    focus:ring-blue-500">

            </td>

            <!-- Action -->
            <td class="border border-gray-200 p-2 text-center">

                <button type="button"
                    class="removeFamilyRow
                    bg-red-500 hover:bg-red-600
                    text-white
                    w-8 h-8
                    rounded-lg
                    text-sm
                    transition-all duration-300">
                    ✕
                </button>

            </td>

        </tr>

    `;

    familyBody.insertAdjacentHTML('beforeend', newRow);

});

// Remove Row
familyBody.addEventListener('click', function(e) {

    if (e.target.classList.contains('removeFamilyRow')) {

        const rows = familyBody.querySelectorAll('tr');

        if (rows.length === 1) {

            alert('At least one row is required');
            return;

        }

        e.target.closest('tr').remove();

        updateFamilySerialNumbers();

    }

});
</script>