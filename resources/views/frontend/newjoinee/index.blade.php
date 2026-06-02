<form action="{{ url('/employee-save') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="token" value="{{ $interview->joining_token }}">

    <!-- CSS styles matching Company List/Candidate Personal Data DNA -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        .newjoinee-theme {
            font-family: 'Outfit', 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #f0f4ff 0%, #f8fafc 40%, #eff2ff 75%, #ffffff 100%);
            background-size: 400% 400%;
            animation: gradientShift 18s ease infinite;
            color: #0f1f5c;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Ambient floating glow circles with low opacity */
        .ambient-glow-1 {
            position: absolute;
            top: 5%;
            left: -8%;
            width: 40vw;
            height: 40vw;
            background: radial-gradient(circle, rgba(79, 111, 255, 0.08) 0%, rgba(79, 111, 255, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 1;
            animation: floatGlow1 20s ease-in-out infinite alternate;
        }

        .ambient-glow-2 {
            position: absolute;
            bottom: 12%;
            right: -8%;
            width: 40vw;
            height: 40vw;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.06) 0%, rgba(168, 85, 247, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 1;
            animation: floatGlow2 24s ease-in-out infinite alternate;
        }

        @keyframes floatGlow1 {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(60px, 40px) scale(1.15); }
        }

        @keyframes floatGlow2 {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(-60px, -40px) scale(1.1); }
        }

        /* Branded White Frosted Glass Card styling */
        .glass-card {
            background: rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(232, 237, 245, 0.8);
            box-shadow: 0 10px 40px -10px rgba(79, 111, 255, 0.06);
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Card top brand line gradient decoration */
        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #1a3faa 0%, #4f6fff 50%, #7c93ff 100%);
            opacity: 0.85;
            z-index: 20;
        }

        .glass-card:hover {
            border-color: rgba(199, 210, 254, 0.8);
            box-shadow: 0 16px 50px -12px rgba(79, 111, 255, 0.12);
        }

        /* Inputs styled to match white/blue brand style */
        .premium-input {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid #e8edf5;
            color: #0f1f5c;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            transition: all 0.3s cubic-bezier(0.2, 0.8, 0.2, 1);
        }

        .premium-input:focus {
            outline: none;
            border-color: #4f6fff;
            box-shadow: 0 0 0 3px rgba(79, 111, 255, 0.12), 0 4px 16px rgba(79, 111, 255, 0.04);
            background: #ffffff;
            transform: translateY(-1px);
        }

        .premium-input::placeholder {
            color: #a0aec0;
        }

        .premium-input:hover:not(:focus) {
            border-color: #c7d2fe;
        }

        /* Checkbox/Radio styling */
        .premium-option {
            border: 1px solid #e8edf5;
            background: rgba(255, 255, 255, 0.6);
            transition: all 0.3s cubic-bezier(0.2, 0.8, 0.2, 1);
            cursor: pointer;
        }

        .premium-option:hover {
            border-color: #c7d2fe;
            background: rgba(255, 255, 255, 0.9);
            transform: translateY(-1px);
        }

        .premium-option.checked-active {
            border-color: #4f6fff;
            background: #f0f4ff;
            box-shadow: 0 4px 12px rgba(79, 111, 255, 0.08);
        }

        .premium-option.checked-active span {
            color: #4f6fff;
            font-weight: 700;
        }

        .custom-radio-box {
            width: 1.15rem;
            height: 1.15rem;
            border: 1px solid #c7d2fe;
            border-radius: 6px;
            display: inline-grid;
            place-content: center;
            transition: all 0.2s ease;
            background: #ffffff;
        }

        .premium-option.checked-active .custom-radio-box {
            border-color: #4f6fff;
            background: #4f6fff;
            color: #ffffff;
        }

        .custom-radio-box::before {
            content: "✔";
            font-size: 10px;
            color: white;
            font-weight: bold;
            display: none;
        }

        .premium-option.checked-active .custom-radio-box::before {
            display: block;
        }

        /* Shimmer Buttons */
        .btn-shimmer {
            background: linear-gradient(135deg, #1a3faa 0%, #4f6fff 50%, #7c93ff 100%);
            background-size: 200% auto;
            box-shadow: 0 4px 14px rgba(79, 111, 255, 0.25);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }

        .btn-shimmer:hover {
            background-position: right center;
            box-shadow: 0 8px 24px rgba(79, 111, 255, 0.4);
            transform: translateY(-2px) scale(1.01);
        }

        .btn-shimmer:active {
            transform: translateY(1px) scale(0.99);
        }

        .btn-shimmer::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 60%;
            height: 100%;
            background: linear-gradient(
                to right,
                rgba(255, 255, 255, 0) 0%,
                rgba(255, 255, 255, 0.2) 30%,
                rgba(255, 255, 255, 0.35) 50%,
                rgba(255, 255, 255, 0.2) 70%,
                rgba(255, 255, 255, 0) 100%
            );
            transform: skewX(-20deg);
        }

        .btn-shimmer:hover::after {
            animation: sweep 1.8s infinite;
        }

        @keyframes sweep {
            0% { left: -110%; }
            100% { left: 120%; }
        }

        /* Custom scrollbar for horizontal table scrolling */
        .custom-scrollbar::-webkit-scrollbar {
            height: 7px;
            width: 7px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(240, 244, 255, 0.5);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(79, 111, 255, 0.25);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(79, 111, 255, 0.5);
        }
    </style>

    <!-- STEP 1 CONTAINER -->
    <div id="step1" class="newjoinee-theme min-h-screen py-10 px-4 relative overflow-hidden">
        <!-- Ambient light glow backdrops -->
        <div class="ambient-glow-1"></div>
        <div class="ambient-glow-2"></div>

        <div class="max-w-5xl mx-auto relative z-10">

            <div class="glass-card rounded-[32px] shadow-2xl overflow-hidden">

                <!-- HEADER -->
                <div class="px-4 py-8 sm:px-8 sm:py-10 border-b border-[#e8edf5] text-center sm:text-left relative overflow-hidden bg-white/40 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex flex-col sm:flex-row items-center gap-4">
                        <img src="{{ asset('assets/images/rathinamgroup.png') }}"
                            class="w-16 h-16 sm:w-20 sm:h-20 object-contain bg-white p-2 rounded-2xl shadow-sm">
                        <div>
                            <h1 class="text-xl sm:text-3xl font-extrabold text-[#0f1f5c] tracking-wide">
                                Employee Information Form
                            </h1>
                            <p class="text-[#5d6b98] mt-1 text-xs sm:text-sm">
                                Please fill all employee and family details carefully
                            </p>
                        </div>
                    </div>
                    <div class="inline-flex items-center gap-2 bg-[#eff2ff] text-[#4f6fff] text-[11px] font-bold tracking-widest uppercase border border-[#c7d2fe] rounded-full px-4 py-1.5 animate-pulse">
                        <span class="w-2 h-2 rounded-full bg-[#4f6fff] ring-2 ring-[#c7d2fe] ring-offset-1 ring-offset-[#eff2ff]"></span>
                        Step 1 of 2
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-4 sm:p-10 space-y-12 bg-white/30">

                    <!-- PERSONAL DETAILS -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">01</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Personal Details</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Employee Name</label>
                                <input type="text" name="name" placeholder="Enter employee name" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Designation</label>
                                <input type="text" name="designation" placeholder="Enter designation" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Date of Joining</label>
                                <input type="date" name="doj" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Date of Birth</label>
                                <input type="date" name="dob" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Contact Number</label>
                                <input type="number" name="contact" placeholder="Enter contact number" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Emergency Contact Number</label>
                                <input type="number" name="emergency_contact" placeholder="Enter emergency contact" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Father's Name & DOB</label>
                                <input type="text" name="father" placeholder="Enter details" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Mother's Name & DOB</label>
                                <input type="text" name="mother" placeholder="Enter details" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Spouse Name & DOB</label>
                                <input type="text" name="spouse" placeholder="Enter details" class="premium-input text-sm">
                            </div>

                            <!-- MARITAL -->
                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Marital Status</label>
                                <div class="grid grid-cols-2 gap-3 mt-1">
                                    @foreach (['married' => 'Married', 'unmarried' => 'Unmarried'] as $val => $lbl)
                                    <label class="premium-option flex items-center gap-3 border rounded-xl p-3 cursor-pointer select-none">
                                        <input type="radio" name="marital_status" value="{{ $val }}" class="radio-input hidden">
                                        <div class="custom-radio-box shrink-0"></div>
                                        <span class="text-sm font-semibold text-[#5d6b98]">{{ $lbl }}</span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- GENDER -->
                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Gender</label>
                                <div class="grid grid-cols-2 gap-3 mt-1">
                                    @foreach (['male' => 'Male', 'female' => 'Female'] as $val => $lbl)
                                    <label class="premium-option flex items-center gap-3 border rounded-xl p-3 cursor-pointer select-none">
                                        <input type="radio" name="gender" value="{{ $val }}" class="radio-input hidden">
                                        <div class="custom-radio-box shrink-0"></div>
                                        <span class="text-sm font-semibold text-[#5d6b98]">{{ $lbl }}</span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Aadhaar Number</label>
                                <input type="text" name="aadhaar" id="aadhaar" maxlength="14" placeholder="XXXX XXXX XXXX" inputmode="numeric" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">PAN Number</label>
                                <input type="text" name="pan" placeholder="ABCDE1234F" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col md:col-span-2">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Driving License Number & Valid Through</label>
                                <input type="text" name="driving_license" placeholder="Enter Driving License Number" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col md:col-span-2">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Present Address</label>
                                <textarea rows="2" name="present_address" placeholder="Enter full address" class="premium-input text-sm resize-none"></textarea>
                            </div>

                            <div class="flex flex-col md:col-span-2">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Permanent Address</label>
                                <textarea rows="2" name="permanent_address" placeholder="Enter full address" class="premium-input text-sm resize-none"></textarea>
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Blood Group</label>
                                <input type="text" name="blood_group" placeholder="Enter Blood Group" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Nominee & Relationship</label>
                                <input type="text" name="nominee" placeholder="Enter The Nominee" class="premium-input text-sm">
                            </div>
                        </div>
                    </div>

                    <!-- BANK DETAILS -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">02</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Bank Account Details</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Bank Account Number</label>
                                <input type="text" name="bank_account" placeholder="Bank Account Number" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Bank Name</label>
                                <input type="text" name="bank_name" placeholder="Bank Name" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Branch Name</label>
                                <input type="text" name="branch" placeholder="Branch Name" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">IFSC Code</label>
                                <input type="text" name="ifsc" placeholder="IFSC Code" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col md:col-span-2">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Bank Address</label>
                                <textarea rows="2" name="bank_address" placeholder="Bank Address" class="premium-input text-sm resize-none"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- FAMILY DETAILS -->
                    <div class="space-y-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-b border-[#e8edf5] pb-3">
                            <div class="flex items-center gap-3">
                                <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">03</span>
                                <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Family Details</h2>
                            </div>

                            <button type="button" id="addFamilyRow" class="w-28 inline-flex items-center gap-1.5 text-[12px] font-semibold text-[#4f6fff] bg-[#f0f4ff] border border-[#c7d2fe] rounded-full px-4 py-2 hover:bg-[#4f6fff] hover:text-white hover:border-[#4f6fff] transition-colors duration-300 whitespace-nowrap cursor-pointer shadow-[0_2px_8px_rgba(79,111,255,0.05)] active:scale-95">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                Add Row
                            </button>
                        </div>

                        <div class="w-full overflow-x-auto rounded-2xl border border-[#e8edf5] custom-scrollbar shadow-sm bg-white/60">
                            <table class="w-full min-w-[900px] text-sm border-collapse text-left">
                                <thead class="bg-slate-50 text-[#0f1f5c] border-b border-[#e8edf5]">
                                    <tr>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider w-16 text-center">SL.NO</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Name</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider w-44">DOB</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider text-center w-48">Residing With</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Relationship</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider text-center w-24">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="familyBody" class="divide-y divide-[#e8edf5]/60">
                                    <tr class="hover:bg-slate-50/50 transition-all duration-200">
                                        <td class="p-3 text-center sn font-bold text-[#6b7db3]">1</td>
                                        <td class="p-2">
                                            <input type="text" name="family[name][]" placeholder="Enter The Name" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td class="p-2">
                                            <input type="date" name="family[dob][]" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td class="p-2">
                                            <div class="flex justify-center gap-4 mt-1.5">
                                                <label class="flex items-center gap-1.5 text-xs font-semibold text-[#5d6b98] cursor-pointer">
                                                    <input type="radio" name="family[residing_with][0]" value="Yes" class="accent-[#4f6fff]"> Yes
                                                </label>
                                                <label class="flex items-center gap-1.5 text-xs font-semibold text-[#5d6b98] cursor-pointer">
                                                    <input type="radio" name="family[residing_with][0]" value="No" class="accent-[#4f6fff]"> No
                                                </label>
                                            </div>
                                        </td>
                                        <td class="p-2">
                                            <input type="text" name="family[relationship][]" placeholder="Enter The Relationship" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td class="p-2 text-center">
                                            <button type="button" class="removeFamilyRow flex items-center justify-center bg-rose-50 hover:bg-rose-500 hover:text-white text-rose-500 border border-rose-100 w-8 h-8 rounded-xl mx-auto transition-all duration-200 active:scale-90 cursor-pointer">
                                                <svg class="w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- ACTION BUTTON -->
                    <div class="flex justify-end pt-6">
                        <button type="button" id="nextBtn" class="btn-shimmer text-white font-bold px-10 py-3.5 rounded-xl shadow-lg cursor-pointer active:scale-95 transition-all duration-200">
                            Next
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- STEP 2 CONTAINER -->
    <div id="step2" class="newjoinee-theme min-h-screen py-10 px-4 relative overflow-hidden hidden opacity-0 translate-y-10 transition-all duration-700 ease-in-out">
        <!-- Ambient light glow backdrops -->
        <div class="ambient-glow-1"></div>
        <div class="ambient-glow-2"></div>

        <div class="max-w-5xl mx-auto relative z-10">

            <div class="glass-card rounded-[32px] shadow-2xl overflow-hidden">

                <!-- HEADER -->
                <div class="px-4 py-8 sm:px-8 sm:py-10 border-b border-[#e8edf5] text-center sm:text-left relative overflow-hidden bg-white/40 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="flex flex-col sm:flex-row items-center gap-4">
                        <img src="{{ asset('assets/images/rathinamgroup.png') }}"
                            class="w-16 h-16 sm:w-20 sm:h-20 object-contain bg-white p-2 rounded-2xl shadow-sm">
                        <div>
                            <h1 class="text-xl sm:text-3xl font-extrabold text-[#0f1f5c] tracking-wide">
                                Application for ID Card
                            </h1>
                            <p class="text-[#5d6b98] mt-1 text-xs sm:text-sm">
                                Please upload photo and fill emergency card details
                            </p>
                        </div>
                    </div>
                    <div class="inline-flex items-center gap-2 bg-[#eff2ff] text-[#4f6fff] text-[11px] font-bold tracking-widest uppercase border border-[#c7d2fe] rounded-full px-4 py-1.5 animate-pulse">
                        <span class="w-2 h-2 rounded-full bg-[#4f6fff] ring-2 ring-[#c7d2fe] ring-offset-1 ring-offset-[#eff2ff]"></span>
                        Step 2 of 2
                    </div>
                </div>

                <!-- Form Content -->
                <div class="p-4 sm:p-10 space-y-12 bg-white/30">

                    <!-- BASIC DETAILS PREVIEW & PHOTO -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">04</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Basic Card Information</h2>
                        </div>

                        <div class="flex flex-col lg:flex-row gap-8 w-full">
                            <div class="w-full lg:w-[75%] grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div class="flex flex-col">
                                    <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Employee Name</label>
                                    <input type="text" id="preview_name" readonly class="premium-input text-sm bg-slate-100/50 cursor-not-allowed">
                                </div>

                                <div class="flex flex-col">
                                    <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Designation</label>
                                    <input type="text" id="preview_designation" readonly class="premium-input text-sm bg-slate-100/50 cursor-not-allowed">
                                </div>

                                <div class="flex flex-col">
                                    <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Department</label>
                                    <input type="text" name="department" placeholder="Enter department" class="premium-input text-sm">
                                </div>

                                <div class="flex flex-col">
                                    <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Date of Joining</label>
                                    <input type="date" id="preview_doj" readonly class="premium-input text-sm bg-slate-100/50 cursor-not-allowed">
                                </div>

                                <div class="flex flex-col">
                                    <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Employee Code</label>
                                    <input type="text" name="employee_code" placeholder="Enter employee code" class="premium-input text-sm">
                                </div>

                                <div class="flex flex-col">
                                    <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Date of Birth</label>
                                    <input type="date" id="preview_dob" readonly class="premium-input text-sm bg-slate-100/50 cursor-not-allowed">
                                </div>
                            </div>

                            <!-- Photo Upload -->
                            <div class="w-full lg:w-[25%] flex flex-col items-center justify-center">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2 text-center w-full">ID Photo</label>
                                <label for="photoUpload" class="w-[150px] h-[180px] cursor-pointer border-2 border-dashed border-[#c7d2fe] rounded-2xl bg-white/70 flex flex-col items-center justify-center hover:bg-white transition-all duration-300 overflow-hidden relative shadow-sm hover:border-[#4f6fff]">
                                    <img id="previewImage" class="hidden w-full h-full object-cover" />
                                    <div id="uploadText" class="text-center p-3">
                                        <svg class="w-8 h-8 text-[#4f6fff] mx-auto mb-2 animate-bounce" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        <span class="text-xs font-semibold text-[#5d6b98]">Upload Passport Photo</span>
                                    </div>
                                </label>
                                <input type="file" name="photo" id="photoUpload" accept="image/*" class="hidden" onchange="showPreview(event)" />
                                <span class="text-[10px] text-[#6b7db3] mt-2 text-center">JPG, PNG format only</span>
                            </div>
                        </div>
                    </div>

                    <!-- ADDRESS PREVIEW -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">05</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Address Details Preview</h2>
                        </div>

                        <div class="flex flex-col">
                            <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Employee Address</label>
                            <textarea rows="3" id="preview_present_address" readonly class="premium-input text-sm bg-slate-100/50 cursor-not-allowed resize-none"></textarea>
                        </div>
                    </div>

                    <!-- OTHER DETAILS PREVIEW -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">06</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Other Details Preview</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Blood Group</label>
                                <input type="text" id="preview_blood_group" readonly class="premium-input text-sm bg-slate-100/50 cursor-not-allowed">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Contact Number</label>
                                <input type="number" id="preview_contact" readonly class="premium-input text-sm bg-slate-100/50 cursor-not-allowed">
                            </div>
                        </div>
                    </div>

                    <!-- EMERGENCY CONTACT DETAILS -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">07</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Emergency Contact Details</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Parents Number</label>
                                <input type="number" placeholder="Father / Mother Number" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Spouse Number</label>
                                <input type="number" placeholder="Husband / Wife Number" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Son / Daughter Number</label>
                                <input type="number" placeholder="Emergency Number" class="premium-input text-sm">
                            </div>
                        </div>
                    </div>

                    <!-- SIGNATURE -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">08</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Signature Acknowledgement</h2>
                        </div>

                        <div class="flex flex-col">
                            <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Employee Signature</label>
                            <input type="text" name="signature" placeholder="Enter Your Signature" class="premium-input text-sm">
                        </div>
                    </div>

                    <!-- FOOTER & SUBMIT -->
                    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-6 border-t border-[#e8edf5]">
                        <p class="text-xs text-[#6b7db3] text-center sm:text-left">
                            Doc Ref: RGI/HR/FR 002 Rev:02 | Date of Issue: 10-03-2026
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                            <button type="button" id="backBtn" class="premium-input w-full sm:w-auto text-[#4f6fff] border border-[#c7d2fe] bg-white hover:bg-slate-50 text-sm font-bold py-2.5 px-6 rounded-xl cursor-pointer transition-colors duration-200 text-center select-none active:scale-95">
                                Preview Form Details
                            </button>
                            <button type="submit" class="btn-shimmer w-full sm:w-auto text-white text-sm font-bold py-2.5 px-8 rounded-xl cursor-pointer active:scale-95 transition-all duration-200">
                                Submit Application
                            </button>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</form>

<!-- Scripts for transitions, Aadhaar formatting, and dynamic row elements -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const nextBtn = document.getElementById("nextBtn");
    const backBtn = document.getElementById("backBtn");

    const step1 = document.getElementById("step1");
    const step2 = document.getElementById("step2");

    // Toggle Step 1 radio highlights on page load and change
    const radios = document.querySelectorAll('input[type="radio"]');
    radios.forEach(radio => {
        if (radio.checked) {
            const label = radio.closest('.premium-option');
            if (label) {
                label.classList.add('checked-active');
            }
        }
        radio.addEventListener('change', () => {
            const groupName = radio.getAttribute('name');
            if (groupName) {
                const groupRadios = document.querySelectorAll(`input[name="${groupName}"]`);
                groupRadios.forEach(r => {
                    const label = r.closest('.premium-option');
                    if (label) {
                        label.classList.remove('checked-active');
                    }
                });
                const activeLabel = radio.closest('.premium-option');
                if (activeLabel) {
                    activeLabel.classList.add('checked-active');
                }
            }
        });
    });

    // NEXT BUTTON TRANSITION
    nextBtn.addEventListener("click", () => {
        document.getElementById('preview_name').value =
            document.querySelector('input[name="name"]').value;

        document.getElementById('preview_designation').value =
            document.querySelector('input[name="designation"]').value;

        document.getElementById('preview_doj').value =
            document.querySelector('input[name="doj"]').value;

        document.getElementById('preview_dob').value =
            document.querySelector('input[name="dob"]').value;

        document.getElementById('preview_blood_group').value =
            document.querySelector('input[name="blood_group"]').value;

        document.getElementById('preview_present_address').value =
            document.querySelector('textarea[name="present_address"]').value;

        document.getElementById('preview_contact').value =
            document.querySelector('input[name="contact"]').value;

        // Hide Step 1
        step1.classList.add("opacity-0", "-translate-y-10");

        setTimeout(() => {
            step1.classList.add("hidden");
            // Show Step 2
            step2.classList.remove("hidden");
            setTimeout(() => {
                step2.classList.remove("opacity-0", "translate-y-10");
            }, 50);
        }, 500);
    });

    // BACK BUTTON TRANSITION
    backBtn.addEventListener("click", () => {
        // Hide Step 2
        step2.classList.add("opacity-0", "translate-y-10");

        setTimeout(() => {
            step2.classList.add("hidden");
            // Show Step 1
            step1.classList.remove("hidden");
            setTimeout(() => {
                step1.classList.remove("opacity-0", "-translate-y-10");
            }, 50);
        }, 500);
    });

    // FAMILY DYNAMIC ROWS
    const familyBody = document.getElementById('familyBody');
    const addFamilyRow = document.getElementById('addFamilyRow');

    let familyIndex = 1;
    const maxRows = 10;

    addFamilyRow.addEventListener('click', () => {
        const rows = familyBody.querySelectorAll('tr');

        if (rows.length >= maxRows) {
            alert("Maximum 10 rows allowed");
            return;
        }

        const row = document.createElement('tr');
        row.className = "hover:bg-slate-50/50 transition-all duration-200";

        row.innerHTML = `
            <td class="p-3 text-center sn font-bold text-[#6b7db3]"></td>

            <td class="p-2">
                <input type="text" placeholder="Enter The Name" name="family[name][]"
                    class="premium-input text-xs w-full py-2 px-3">
            </td>

            <td class="p-2">
                <input type="date" name="family[dob][]"
                    class="premium-input text-xs w-full py-2 px-3">
            </td>

            <td class="p-2">
                <div class="flex justify-center gap-4 mt-1.5">
                    <label class="flex items-center gap-1.5 text-xs font-semibold text-[#5d6b98] cursor-pointer">
                        <input type="radio" name="family[residing_with][${familyIndex}]" value="Yes" class="accent-[#4f6fff]"> Yes
                    </label>
                    <label class="flex items-center gap-1.5 text-xs font-semibold text-[#5d6b98] cursor-pointer">
                        <input type="radio" name="family[residing_with][${familyIndex}]" value="No" class="accent-[#4f6fff]"> No
                    </label>
                </div>
            </td>

            <td class="p-2">
                <input type="text" placeholder="Enter The Relationship" name="family[relationship][]"
                    class="premium-input text-xs w-full py-2 px-3">
            </td>

            <td class="p-2 text-center">
                <button type="button"
                    class="removeFamilyRow flex items-center justify-center bg-rose-50 hover:bg-rose-500 hover:text-white text-rose-500 border border-rose-100 w-8 h-8 rounded-xl mx-auto transition-all duration-200 active:scale-90 cursor-pointer">
                    <svg class="w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </td>
        `;

        familyBody.appendChild(row);
        familyIndex++;
        updateSerialNumbers();
    });

    // Remove row via event delegation
    familyBody.addEventListener('click', function(e) {
        if (e.target.closest('.removeFamilyRow')) {
            const rows = familyBody.querySelectorAll('tr');

            if (rows.length === 1) {
                alert("At least one row is required");
                return;
            }

            e.target.closest('tr').remove();
            updateSerialNumbers();
        }
    });

    function updateSerialNumbers() {
        const rows = familyBody.querySelectorAll('tr');
        rows.forEach((row, index) => {
            row.querySelector('.sn').innerText = index + 1;
        });
    }

    // AADHAAR CARD FORMATTING
    const aadhaarInput = document.getElementById("aadhaar");
    if (aadhaarInput) {
        aadhaarInput.addEventListener("input", function(e) {
            let value = e.target.value.replace(/\D/g, "");
            value = value.substring(0, 12);
            let formatted = value.match(/.{1,4}/g);

            if (formatted) {
                e.target.value = formatted.join(" ");
            } else {
                e.target.value = "";
            }
        });
    }
});

// PHOTO PREVIEW HELPER
function showPreview(event) {
    const file = event.target.files[0];
    if (file) {
        const image = document.getElementById("previewImage");
        const text = document.getElementById("uploadText");

        image.src = URL.createObjectURL(file);
        image.classList.remove("hidden");
        text.classList.add("hidden");
    }
}
</script>
