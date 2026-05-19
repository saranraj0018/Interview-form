<div id="step1" class="min-h-screen bg-gradient-to-br from-[#f4f7fb] to-[#eef3f9] py-10 px-4">

    <div class="max-w-5xl mx-auto bg-white shadow-2xl rounded-[32px] overflow-hidden border border-gray-200">

        <!-- HEADER -->
        <div class="bg-gradient-to-r from-[#0b2c5f] to-[#174a96]
            px-4 sm:px-8 py-5
            flex flex-col sm:flex-row
            items-center sm:items-center
            justify-center sm:justify-between
            gap-4 text-center sm:text-left">

            <!-- LOGO (TOP on mobile, right on desktop) -->
            <img src="{{ asset('assets/images/rathinamgroup.png') }}"
                class="w-20 h-20 sm:w-20 sm:h-20 object-contain bg-white p-2 rounded-2xl shadow-lg order-1 sm:order-2">

            <!-- TEXT -->
            <div class="order-2 sm:order-1">
                <h1 class="text-xl sm:text-3xl font-bold text-white tracking-wide">
                    Employee Information Form
                </h1>

                <p class="text-blue-100 mt-1 text-xs sm:text-sm">
                    Fill all employee and family details carefully
                </p>
            </div>

        </div>

        <div class="p-0 md:p-8 space-y-0 md:space-y-10">

            <!-- PERSONAL DETAILS -->
            <div class="bg-white p-6">

                <div class="flex items-center gap-3 mb-6">
                    <div class="w-2 h-8 bg-[#0b2c5f] rounded-full"></div>
                    <h2 class="text-2xl font-bold text-gray-800">Personal Details</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="text-sm font-semibold text-gray-700">Employee Name</label>
                        <input type="text" placeholder="Enter employee name"
                            class="w-full mt-2 border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#174a96] outline-none transition">
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700">Designation</label>
                        <input type="text" placeholder="Enter designation"
                            class="w-full mt-2 border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#174a96] outline-none transition">
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700">Date of Joining</label>
                        <input type="date"
                            class="w-full mt-2 border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#174a96] outline-none transition">
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700">Date of Birth</label>
                        <input type="date"
                            class="w-full mt-2 border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#174a96] outline-none transition">
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700">Contact Number</label>
                        <input type="number" placeholder="Enter contact number"
                            class="w-full mt-2 border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#174a96] outline-none transition">
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700">Emergency Contact Number</label>
                        <input type="number" placeholder="Enter emergency contact"
                            class="w-full mt-2 border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#174a96] outline-none transition">
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700">Father's Name & DOB</label>
                        <input type="text" placeholder="Enter details"
                            class="w-full mt-2 border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#174a96] outline-none transition">
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700">Mother's Name & DOB</label>
                        <input type="text" placeholder="Enter details"
                            class="w-full mt-2 border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#174a96] outline-none transition">
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700">Spouse Name & DOB</label>
                        <input type="text" placeholder="Enter details"
                            class="w-full mt-2 border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#174a96] outline-none transition">
                    </div>

                    <!-- MARITAL -->
                    <div>
                        <label class="text-sm font-semibold text-gray-700">Marital Status</label>
                        <div class="flex gap-6 mt-4">

                            <label class="flex items-center gap-2 text-gray-700">
                                <input type="radio" name="marital"> Married
                            </label>

                            <label class="flex items-center gap-2 text-gray-700">
                                <input type="radio" name="marital"> Unmarried
                            </label>

                        </div>
                    </div>

                    <!-- GENDER -->
                    <div>
                        <label class="text-sm font-semibold text-gray-700">Gender</label>
                        <div class="flex gap-6 mt-4">

                            <label class="flex items-center gap-2 text-gray-700">
                                <input type="radio" name="gender"> Male
                            </label>

                            <label class="flex items-center gap-2 text-gray-700">
                                <input type="radio" name="gender"> Female
                            </label>

                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700">Aadhaar Number</label>

                        <input type="text" id="aadhaar" maxlength="14" placeholder="XXXX XXXX XXXX" inputmode="numeric"
                            class="w-full mt-2 border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#174a96] outline-none transition">
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700">PAN Number</label>
                        <input type="text" placeholder="ABCDE1234F"
                            class="w-full mt-2 border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#174a96] outline-none transition">
                    </div>

                    <div class="md:col-span-2">
                        <label class="text-sm font-semibold text-gray-700">Driving License Number & Valid
                            Through</label>
                        <input type="text" placeholder="Enter Driving License Number"
                            class="w-full mt-2 border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#174a96] outline-none transition">
                    </div>

                    <div class="md:col-span-2">
                        <label class="text-sm font-semibold text-gray-700">Present Address</label>
                        <textarea rows="2" placeholder="Enter full address"
                            class="w-full mt-2 border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#174a96] outline-none transition"></textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label class="text-sm font-semibold text-gray-700">Permanent Address</label>
                        <textarea rows="2" placeholder="Enter full address"
                            class="w-full mt-2 border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#174a96] outline-none transition"></textarea>
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700">Blood Group</label>
                        <input type="text" placeholder="Enter Blood Group"
                            class="w-full mt-2 border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#174a96] outline-none transition">
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700">Nominee & Relationship</label>
                        <input type="text" placeholder="Enter The Nominee"
                            class="w-full mt-2 border border-gray-300 rounded-2xl px-5 py-3 focus:ring-2 focus:ring-[#174a96] outline-none transition">
                    </div>

                </div>
            </div>

            <!-- BANK DETAILS -->
            <div class="bg-white p-6">

                <div class="flex items-center gap-3 mb-6">
                    <div class="w-2 h-8 bg-[#0b2c5f] rounded-full"></div>
                    <h2 class="text-2xl font-bold text-gray-800">Bank Account Details</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <input type="text" placeholder="Bank Account Number"
                        class="w-full border border-gray-300 rounded-2xl px-5 py-3">

                    <input type="text" placeholder="Bank Name"
                        class="w-full border border-gray-300 rounded-2xl px-5 py-3">

                    <input type="text" placeholder="Branch Name"
                        class="w-full border border-gray-300 rounded-2xl px-5 py-3">

                    <input type="text" placeholder="IFSC Code"
                        class="w-full border border-gray-300 rounded-2xl px-5 py-3">

                    <textarea rows="3" placeholder="Bank Address"
                        class="md:col-span-2 w-full border border-gray-300 rounded-2xl px-5 py-3"></textarea>

                </div>
            </div>

            <!-- FAMILY DETAILS -->
            <div class="bg-white p-6">

                <!-- Header -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-8 bg-[#0b2c5f] rounded-full"></div>
                        <h2 class="text-2xl font-bold text-gray-800">Family Details</h2>
                    </div>

                    <button type="button" id="addFamilyRow"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-sm transition">
                        Add Row
                    </button>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto rounded-2xl border border-gray-200">

                    <table class="w-full min-w-[900px] text-sm">

                        <thead class="bg-gradient-to-r from-[#0b2c5f] to-[#174a96] text-white">
                            <tr>
                                <th class="px-4 py-4 text-left">SL.NO</th>
                                <th class="px-4 py-4 text-left">Name</th>
                                <th class="px-4 py-4 text-left">DOB</th>
                                <th class="px-4 py-4 text-center">Residing With</th>
                                <th class="px-4 py-4 text-left">Relationship</th>
                                <th class="px-4 py-4 text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody id="familyBody">

                            <!-- Default Row -->
                            <tr class="border-b hover:bg-blue-50 transition">

                                <td class="px-4 py-3 sn">1</td>

                                <td class="px-4 py-3">
                                    <input type="text" name="family[name][]" placeholder="Enter The Name"
                                        class="w-full border border-gray-300 rounded-xl px-3 py-2">
                                </td>

                                <td class="px-4 py-3">
                                    <input type="date" name="family[dob][]"
                                        class="w-full border border-gray-300 rounded-xl px-3 py-2">
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <label class="mr-3">
                                        <input type="radio" name="family[reside_0]" value="Yes"> Yes
                                    </label>
                                    <label>
                                        <input type="radio" name="family[reside_0]" value="No"> No
                                    </label>
                                </td>

                                <td class="px-4 py-3">
                                    <input type="text" name="family[relationship][]"
                                        placeholder="Enter The Relationship"
                                        class="w-full border border-gray-300 rounded-xl px-3 py-2">
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <button type="button"
                                        class="removeFamilyRow bg-red-500 hover:bg-red-600 text-white w-8 h-8 rounded-lg">
                                        ✕
                                    </button>
                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>
            </div>

            <!-- BUTTON -->
            <div class="text-end py-6 pr-6">

                <button id="nextBtn" class="bg-gradient-to-r from-[#0b2c5f] to-[#174a96]
                    hover:scale-[1.02]
                    text-white px-10 py-4 rounded-2xl
                    text-lg font-semibold shadow-xl transition-all duration-300">

                    Next

                </button>

            </div>

        </div>
    </div>
</div>


<div id="step2" class="hidden opacity-0 translate-y-10 transition-all duration-700 ease-in-out">
    <div class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 py-10 px-4">

        <div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-200">

            <!-- HEADER -->
            <div class="bg-gradient-to-r from-[#0b2c5f] to-[#174a96] p-6 text-center">
                <h1 class="text-2xl md:text-3xl font-bold text-white">
                    Application for ID Card
                </h1>

                <p class="text-blue-100 text-sm mt-1">
                    Employee Information Form
                </p>
            </div>

            <!-- FORM -->
            <div class="p-6 md:p-10">

                <div class="flex flex-col lg:flex-row gap-8 w-full">

                    <!-- BASIC DETAILS -->
                    <div class="w-full lg:w-[90%]">

                        <h2 class="text-lg font-semibold text-gray-700 mb-6 border-b pb-2">
                            Basic Details
                        </h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                            <!-- Employee Name -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Employee Name
                                </label>

                                <input type="text" placeholder="Enter employee name"
                                    class="w-full h-12 border border-gray-300 rounded-xl px-4 text-sm outline-none transition focus:ring-2 focus:ring-[#174a96]">
                            </div>

                            <!-- Designation -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Designation
                                </label>

                                <input type="text" placeholder="Enter designation"
                                    class="w-full h-12 border border-gray-300 rounded-xl px-4 text-sm outline-none transition focus:ring-2 focus:ring-[#174a96]">
                            </div>

                            <!-- Department -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Department
                                </label>

                                <input type="text" placeholder="Enter department"
                                    class="w-full h-12 border border-gray-300 rounded-xl px-4 text-sm outline-none transition focus:ring-2 focus:ring-[#174a96]">
                            </div>

                            <!-- DOJ -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Date of Joining
                                </label>

                                <input type="date"
                                    class="w-full h-12 border border-gray-300 rounded-xl px-4 text-sm outline-none transition focus:ring-2 focus:ring-[#174a96]">
                            </div>

                            <!-- Employee Code -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Employee Code
                                </label>

                                <input type="text" placeholder="Enter employee code"
                                    class="w-full h-12 border border-gray-300 rounded-xl px-4 text-sm outline-none transition focus:ring-2 focus:ring-[#174a96]">
                            </div>

                            <!-- DOB -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Date of Birth
                                </label>

                                <input type="date"
                                    class="w-full h-12 border border-gray-300 rounded-xl px-4 text-sm outline-none transition focus:ring-2 focus:ring-[#174a96]">
                            </div>

                        </div>

                    </div>

                    <!-- Upload Section -->
                    <div class="w-full lg:w-[25%] flex justify-center lg:justify-start items-end">

                        <div class="text-center mb-6 md:mb-0">

                            <label
                                class="w-full max-w-[220px] h-56 mx-auto cursor-pointer border-2 border-dashed border-gray-400 rounded-2xl bg-gray-50 flex items-center justify-center hover:bg-gray-100 transition px-4">

                                <span class="text-gray-400 text-sm text-center leading-6">
                                    Upload <br> Passport Size Photo
                                </span>

                                <input type="file" accept="image/*" class="hidden">
                            </label>

                            <p class="text-xs text-gray-500 mt-3">
                                JPG, PNG accepted
                            </p>

                        </div>

                    </div>

                </div>
                <!-- ADDRESS -->
                <div class="mb-10">

                    <h2 class="text-lg font-semibold text-gray-700 mb-6 border-b pb-2">
                        Address Details
                    </h2>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Employee Address
                        </label>

                        <textarea rows="3" placeholder="Enter full address"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 resize-none outline-none transition focus:ring-2 focus:ring-[#174a96]"></textarea>
                    </div>

                </div>

                <!-- OTHER DETAILS -->
                <div class="mb-10">

                    <h2 class="text-lg font-semibold text-gray-700 mb-6 border-b pb-2">
                        Other Details
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Blood Group -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Blood Group
                            </label>

                            <input type="text" placeholder="Enter blood group"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 outline-none transition focus:ring-2 focus:ring-[#174a96]">
                        </div>

                        <!-- Contact Number -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Contact Number
                            </label>

                            <input type="number" placeholder="Enter contact number"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 outline-none transition focus:ring-2 focus:ring-[#174a96]">
                        </div>

                    </div>

                </div>

                <!-- EMERGENCY CONTACT -->
                <div class="mb-10">

                    <h2 class="text-lg font-semibold text-gray-700 mb-6 border-b pb-2">
                        Emergency Contact Details
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                        <!-- Parents -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Parents
                            </label>

                            <input type="number" placeholder="Father / Mother Number"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 outline-none transition focus:ring-2 focus:ring-[#174a96]">
                        </div>

                        <!-- Spouse -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Spouse
                            </label>

                            <input type="number" placeholder="Husband / Wife Number"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 outline-none transition focus:ring-2 focus:ring-[#174a96]">
                        </div>

                        <!-- Son / Daughter -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Son / Daughter
                            </label>

                            <input type="number" placeholder="Emergency Number"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 outline-none transition focus:ring-2 focus:ring-[#174a96]">
                        </div>

                    </div>

                </div>

                <!-- SIGNATURE -->
                <div class="mb-10">

                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        Employee Signature
                    </label>

                    <input type="text" placeholder="Enter Your Signature"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 outline-none transition focus:ring-2 focus:ring-[#174a96]">
                </div>

                <!-- FOOTER -->
                <div class="flex flex-col md:flex-row items-center justify-between gap-4 pt-4 border-t">

                    <p class="text-xs text-gray-500 text-center md:text-left">
                        Doc Ref: RGI/HR/FR 002 Rev:02 | Date of Issue: 10-03-2026
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">

                        <button id="backBtn"
                            class="w-full sm:w-auto bg-gradient-to-r from-[#0b2c5f] to-[#174a96] text-white px-8 py-3 rounded-xl shadow-lg hover:scale-105 transition duration-300">
                            Preview
                        </button>

                        <button
                            class="w-full sm:w-auto bg-gradient-to-r from-[#0b2c5f] to-[#174a96] text-white px-8 py-3 rounded-xl shadow-lg hover:scale-105 transition duration-300">
                            Submit Application
                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>


<!-- SCRIPT -->



<script>
const nextBtn = document.getElementById("nextBtn");
const backBtn = document.getElementById("backBtn");

const step1 = document.getElementById("step1");
const step2 = document.getElementById("step2");



// NEXT
nextBtn.addEventListener("click", () => {

    // hide first
    step1.classList.add("opacity-0", "-translate-y-10");

    setTimeout(() => {

        step1.classList.add("hidden");

        // show second
        step2.classList.remove("hidden");

        setTimeout(() => {
            step2.classList.remove("opacity-0", "translate-y-10");
        }, 50);

    }, 500);

});



// BACK
backBtn.addEventListener("click", () => {

    // hide second
    step2.classList.add("opacity-0", "translate-y-10");

    setTimeout(() => {

        step2.classList.add("hidden");

        // show first
        step1.classList.remove("hidden");

        setTimeout(() => {
            step1.classList.remove("opacity-0", "-translate-y-10");
        }, 50);

    }, 500);

});
</script>



<script>
const familyBody = document.getElementById('familyBody');
const addFamilyRow = document.getElementById('addFamilyRow');

let familyIndex = 1;
const maxRows = 10;

// ADD ROW
addFamilyRow.addEventListener('click', () => {

    const rows = familyBody.querySelectorAll('tr');

    if (rows.length >= maxRows) {
        alert("Maximum 10 rows allowed");
        return;
    }

    const row = document.createElement('tr');
    row.className = "border-b hover:bg-blue-50 transition";

    row.innerHTML = `
        <td class="px-4 py-3 sn"></td>

        <td class="px-4 py-3">
            <input type="text" placeholder="Enter The Name" name="family[name][]"
                class="w-full border border-gray-300 rounded-xl px-3 py-2">
        </td>

        <td class="px-4 py-3">
            <input type="date" name="family[dob][]"
                class="w-full border border-gray-300 rounded-xl px-3 py-2">
        </td>

        <td class="px-4 py-3 text-center">
            <label class="mr-3">
                <input type="radio" name="family[reside_${familyIndex}]" value="Yes"> Yes
            </label>
            <label>
                <input type="radio" name="family[reside_${familyIndex}]" value="No"> No
            </label>
        </td>

        <td class="px-4 py-3">
            <input type="text" placeholder="Enter The Relationship" name="family[relationship][]"
                class="w-full border border-gray-300 rounded-xl px-3 py-2">
        </td>

        <td class="px-4 py-3 text-center">
            <button type="button"
                class="removeFamilyRow bg-red-500 hover:bg-red-600 text-white w-8 h-8 rounded-lg">
                ✕
            </button>
        </td>
    `;

    familyBody.appendChild(row);
    familyIndex++;

    updateSerialNumbers();
});

// REMOVE ROW (event delegation)
familyBody.addEventListener('click', function(e) {

    if (e.target.classList.contains('removeFamilyRow')) {

        const rows = familyBody.querySelectorAll('tr');

        if (rows.length === 1) {
            alert("At least one row is required");
            return;
        }

        e.target.closest('tr').remove();
        updateSerialNumbers();
    }
});

// UPDATE SL.NO
function updateSerialNumbers() {
    const rows = familyBody.querySelectorAll('tr');

    rows.forEach((row, index) => {
        row.querySelector('.sn').innerText = index + 1;
    });
}


const aadhaarInput = document.getElementById("aadhaar");

aadhaarInput.addEventListener("input", function(e) {

    // Remove all non-digits
    let value = e.target.value.replace(/\D/g, "");

    // Limit to 12 digits
    value = value.substring(0, 12);

    // Add space after every 4 digits
    let formatted = value.match(/.{1,4}/g);

    if (formatted) {
        e.target.value = formatted.join(" ");
    } else {
        e.target.value = "";
    }
});
</script>