<form method="POST" action="{{ route('personal.data.save') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="job_post_id" value="{{ $jobPost->id }}">

    <!-- Styles for Branded Elegant Light Theme (Company List DNA) -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        .interview-form-theme {
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

        /* Scroll reveal class styles */
        .reveal {
            opacity: 0;
            transform: translateY(22px);
            transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Branded White Frosted Glass Card styling */
        .glass-panel {
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
        .glass-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #1a3faa 0%, #4f6fff 50%, #7c93ff 100%);
            opacity: 0.85;
        }

        .glass-panel:hover {
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

        /* Shimmer Submit Button */
        .submit-btn-glow {
            background: linear-gradient(135deg, #1a3faa 0%, #4f6fff 50%, #7c93ff 100%);
            background-size: 200% auto;
            box-shadow: 0 4px 14px rgba(79, 111, 255, 0.25);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
        }

        .submit-btn-glow:hover {
            background-position: right center;
            box-shadow: 0 8px 24px rgba(79, 111, 255, 0.4);
            transform: translateY(-2px) scale(1.01);
        }

        .submit-btn-glow:active {
            transform: translateY(1px) scale(0.99);
        }

        .submit-btn-glow::after {
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

        .submit-btn-glow:hover::after {
            animation: sweep 1.8s infinite;
        }

        @keyframes sweep {
            0% { left: -110%; }
            100% { left: 120%; }
        }

        /* Dynamic Row Entrance Animation */
        @keyframes dynamicRowEnter {
            0% {
                opacity: 0;
                transform: translateY(-12px) scale(0.99);
                background: rgba(79, 111, 255, 0.04);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
                background: transparent;
            }
        }

        .row-animation {
            animation: dynamicRowEnter 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        /* Checkbox glowing effects matching brand color */
        .glass-checkbox {
            appearance: none;
            background: #ffffff;
            border: 1px solid #c7d2fe;
            border-radius: 6px;
            width: 1.15rem;
            height: 1.15rem;
            display: inline-grid;
            place-content: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .glass-checkbox::before {
            content: "";
            width: 0.65em;
            height: 0.65em;
            transform: scale(0);
            transition: 120ms transform ease-in-out;
            background-color: #4f6fff;
            clip-path: polygon(14% 44%, 0 65%, 50% 100%, 100% 16%, 80% 0%, 43% 62%);
            transform-origin: bottom left;
        }

        .glass-checkbox:checked {
            border-color: #4f6fff;
            box-shadow: 0 0 8px rgba(79, 111, 255, 0.25);
            background: #f0f4ff;
        }

        .glass-checkbox:checked::before {
            transform: scale(1);
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

    <div class="interview-form-theme min-h-screen py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <!-- Ambient light glow backdrops -->
        <div class="ambient-glow-1"></div>
        <div class="ambient-glow-2"></div>

        <div class="max-w-[1150px] mx-auto relative z-10">

            <!-- Branded Progress Bar -->
            <div class="w-full h-1.5 bg-slate-200/50 rounded-full mb-8 overflow-hidden border border-[#e8edf5] relative z-20 shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
                <div id="formProgressBar" class="h-full bg-gradient-to-r from-[#1a3faa] via-[#4f6fff] to-[#7c93ff] w-0 transition-all duration-500 shadow-[0_0_8px_rgba(79,111,255,0.4)]"></div>
            </div>

            @if(session('error'))
            <div class="reveal reveal-visible bg-red-50 text-red-700 border border-red-200 p-4 rounded-2xl mb-8 backdrop-blur-md flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-red-500 animate-pulse flex-shrink-0"></span>
                <span class="text-sm font-semibold">{{ session('error') }}</span>
            </div>
            @endif

            <!-- Main Portal Layout Card -->
            <div class="glass-panel rounded-3xl shadow-xl overflow-hidden reveal reveal-visible">

                <!-- Hero Section Header (Inspired by Company List Design) -->
                <div class="px-4 py-8 sm:px-8 sm:py-12 border-b border-[#e8edf5] text-center relative overflow-hidden bg-white/40">
                    <!-- Soft Particle Canvas -->
                    <canvas id="headerParticles" class="absolute inset-0 pointer-events-none opacity-50"></canvas>

                    <div class="relative z-10">
                        <div class="inline-flex items-center gap-2 bg-[#eff2ff] text-[#4f6fff] text-[11px] font-bold tracking-widest uppercase border border-[#c7d2fe] rounded-full px-4 py-1.5 mb-5 animate-pulse">
                            <span class="w-2 h-2 rounded-full bg-[#4f6fff] ring-2 ring-[#c7d2fe] ring-offset-1 ring-offset-[#eff2ff]"></span>
                            Now Hiring · {{ date('Y') }}
                        </div>

                        <h1 class="text-3xl sm:text-4xl lg:text-[44px] font-extrabold text-[#0f1f5c] leading-[1.2] tracking-tight mb-3">
                            Candidate
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#1a3faa] to-[#4f6fff]">
                                Personal Data
                            </span>
                            Sheet
                        </h1>
                        <p class="text-[#5d6b98] text-[15px] max-w-xl mx-auto leading-relaxed">
                            Join one of South India's most trusted education &amp; enterprise groups. Please input your information to begin the onboarding evaluation.
                        </p>
                    </div>
                </div>

                <!-- Form Content Space -->
                <div class="p-4 sm:p-10 space-y-12 bg-white/30">

                    <!-- Section 1: Application Details -->
                    <div class="reveal space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">01</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Application Details</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                            <div class="grid grid-cols-2 gap-4 md:col-span-2">
                                <div class="flex flex-col">
                                    <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Date</label>
                                    <input type="date" name="date" value="{{ old('date') }}" class="premium-input text-sm">
                                    @error('date')
                                    <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex flex-col">
                                    <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Time</label>
                                    <input type="time" name="time" value="{{ old('time') }}" class="premium-input text-sm">
                                    @error('time')
                                    <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-col md:col-span-1">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Source</label>
                                <input type="text" name="source" value="{{ old('source') }}" placeholder="Referral, Job portal, ad..." class="premium-input text-sm">
                                @error('source')
                                <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col md:col-span-1">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Position Applied For</label>
                                <input type="text" name="position_applied" value="{{ old('position_applied') }}" placeholder="Position applied for" class="premium-input text-sm">
                                @error('position_applied')
                                <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Personal Information -->
                    <div class="reveal space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">02</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Personal Information</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Enter Your Full Name</label>
                                <input type="text" name="full_name" value="{{ old('full_name') }}" placeholder="First & last name" class="premium-input text-sm">
                                @error('full_name')
                                <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Contact Address</label>
                                <textarea rows="1" name="contact_address" placeholder="Enter Your Address" class="premium-input text-sm min-h-[46px] resize-y">{{ old('contact_address') }}</textarea>
                                @error('contact_address')
                                <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5">
                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Pin Code</label>
                                <input type="number" name="pin_code" value="{{ old('pin_code') }}" placeholder="Enter Pin Code" class="premium-input text-sm">
                                @error('pin_code')
                                <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Email ID</label>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" class="premium-input text-sm">
                                @error('email')
                                <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Mobile</label>
                                <input type="number" name="mobile" value="{{ old('mobile') }}" placeholder="Enter Mobile Number" class="premium-input text-sm">
                                @error('mobile')
                                <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Alternate Mobile</label>
                                <input type="number" name="phone" value="{{ old('phone') }}" placeholder="Backup number" class="premium-input text-sm">
                                @error('phone')
                                <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5">
                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Date of Birth</label>
                                <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="premium-input text-sm">
                                @error('date_of_birth')
                                <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Age</label>
                                <input type="number" name="age" value="{{ old('age') }}" placeholder="Age" class="premium-input text-sm">
                                @error('age')
                                <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Gender</label>
                                <select name="gender" class="premium-input text-sm bg-white cursor-pointer">
                                    <option value="">Select</option>
                                    <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')
                                <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Marital Status</label>
                                <select name="marital_status" class="premium-input text-sm bg-white cursor-pointer">
                                    <option value="">Select</option>
                                    <option value="single" {{ old('marital_status') === 'single' ? 'selected' : '' }}>Single</option>
                                    <option value="married" {{ old('marital_status') === 'married' ? 'selected' : '' }}>Married</option>
                                </select>
                                @error('marital_status')
                                <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Salary & Notice Details -->
                    <div class="reveal space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">03</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Compensation &amp; Experience</h2>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Current Gross (Per Annum)</label>
                                <input type="number" name="current_gross" value="{{ old('current_gross') }}" placeholder="Current Gross" class="premium-input text-sm">
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Expected Gross (Per Annum)</label>
                                <input type="number" name="expected_gross" value="{{ old('expected_gross') }}" placeholder="Expected Gross" class="premium-input text-sm">
                                @error('expected_gross')
                                <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Total Years of Experience</label>
                                <input type="number" name="experience" value="{{ old('experience') }}" placeholder="Years of Experience" class="premium-input text-sm">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Current Company Notice Period</label>
                            <input type="text" name="notice_period" value="{{ old('notice_period') }}" placeholder="Enter Notice Period" class="premium-input text-sm">
                        </div>
                    </div>

                    <!-- Section 4: Educational Qualifications -->
                    <div class="reveal space-y-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-b border-[#e8edf5] pb-3">
                            <div class="flex items-center gap-3">
                                <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">04</span>
                                <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Educational Qualifications</h2>
                            </div>

                            <button type="button" id="addRowBtn" class=" w-28 inline-flex items-center gap-1.5 text-[12px] font-semibold text-[#4f6fff] bg-[#f0f4ff] border border-[#c7d2fe] rounded-full px-4 py-2 hover:bg-[#4f6fff] hover:text-white hover:border-[#4f6fff] transition-colors duration-300 whitespace-nowrap cursor-pointer shadow-[0_2px_8px_rgba(79,111,255,0.05)] active:scale-95">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                Add Row
                            </button>
                        </div>

                        <div class="w-full overflow-x-auto rounded-2xl border border-[#e8edf5] custom-scrollbar shadow-sm bg-white/60">
                            <table class="responsive-table min-w-full text-sm border-collapse text-left" id="educationTable">
                                <thead class="bg-slate-50 text-[#0f1f5c] border-b border-[#e8edf5]">
                                    <tr>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Degree</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Division</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">College</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Board / University</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider text-center">% Marks</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Major Subjects</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider text-center">Year of Passing</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="educationBody" class="divide-y divide-[#e8edf5]/60">
                                    <tr class="hover:bg-slate-50/50 transition-all duration-200">
                                        <td data-label="Degree" class="p-2">
                                            <input type="text" name="degree[]" value="{{ old('degree.0') }}" placeholder="Enter Degree" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="Division" class="p-2">
                                            <input type="text" name="division[]" value="{{ old('division.0') }}" placeholder="Division" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="College" class="p-2">
                                            <input type="text" name="college[]" value="{{ old('college.0') }}" placeholder="College" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="University" class="p-2">
                                            <input type="text" name="university[]" value="{{ old('university.0') }}" placeholder="University" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="% Marks" class="p-2">
                                            <input type="text" name="marks[]" value="{{ old('marks.0') }}" placeholder="Marks" class="premium-input text-xs w-full py-2 px-3 text-center">
                                        </td>
                                        <td data-label="Subjects" class="p-2">
                                            <input type="text" name="subjects[]" value="{{ old('subjects.0') }}" placeholder="Subjects" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="Year" class="p-2">
                                            <input type="text" name="year_of_passing[]" value="{{ old('year_of_passing.0') }}" placeholder="Year" class="premium-input text-xs w-full py-2 px-3 text-center">
                                        </td>
                                        <td class="p-2 text-center action-cell">
                                            <button type="button" class="removeRow flex items-center justify-center bg-rose-50 hover:bg-rose-500 hover:text-white text-rose-500 border border-rose-100 w-8 h-8 rounded-xl mx-auto transition-all duration-200 active:scale-90 cursor-pointer">
                                                <svg class="w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @error('degree.*')
                        <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Section 5: Work Experience -->
                    <div class="reveal space-y-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-b border-[#e8edf5] pb-3">
                            <div class="flex items-center gap-3">
                                <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">05</span>
                                <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Work Experience</h2>
                            </div>

                            <button type="button" id="addExperienceRowBtn" class=" w-28 inline-flex items-center gap-1.5 text-[12px] font-semibold text-[#4f6fff] bg-[#f0f4ff] border border-[#c7d2fe] rounded-full px-4 py-2 hover:bg-[#4f6fff] hover:text-white hover:border-[#4f6fff] transition-colors duration-300 whitespace-nowrap cursor-pointer shadow-[0_2px_8px_rgba(79,111,255,0.05)] active:scale-95">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                Add Row
                            </button>
                        </div>

                        <div class="w-full overflow-x-auto rounded-2xl border border-[#e8edf5] custom-scrollbar shadow-sm bg-white/60">
                            <table class="responsive-table min-w-full text-sm border-collapse text-left" id="experienceTable">
                                <thead class="bg-slate-50 text-[#0f1f5c] border-b border-[#e8edf5]">
                                    <tr>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Organization</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Designation</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">From</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">To</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Gross Salary PM</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Annual CTC</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Reason for Leaving</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="experienceBody" class="divide-y divide-[#e8edf5]/60">
                                    <tr class="hover:bg-slate-50/50 transition-all duration-200">
                                        <td data-label="Employer" class="p-2">
                                            <input type="text" name="organization[]" value="{{ old('organization.0') }}" placeholder="Organization" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="Designation" class="p-2">
                                            <input type="text" name="designation[]" value="{{ old('designation.0') }}" placeholder="Designation" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="From" class="p-2">
                                            <input type="date" name="from_date[]" value="{{ old('from_date.0') }}" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="To" class="p-2">
                                            <input type="date" name="to_date[]" value="{{ old('to_date.0') }}" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="Salary PM" class="p-2">
                                            <input type="number" name="gross_salary[]" value="{{ old('gross_salary.0') }}" placeholder="Gross Salary" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="Annual CTC" class="p-2">
                                            <input type="number" name="annual_ctc[]" value="{{ old('annual_ctc.0') }}" placeholder="Annual CTC" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="Reason" class="p-2">
                                            <input type="text" name="reason_for_leaving[]" value="{{ old('reason_for_leaving.0') }}" placeholder="Reason" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td class="p-2 text-center action-cell">
                                            <button type="button" class="removeExperienceRow flex items-center justify-center bg-rose-50 hover:bg-rose-500 hover:text-white text-rose-500 border border-rose-100 w-8 h-8 rounded-xl mx-auto transition-all duration-200 active:scale-90 cursor-pointer">
                                                <svg class="w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @error('organization.*')
                        <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Section 6: Career Break & Certifications -->
                    <div class="reveal space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">06</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Career Break &amp; Certifications</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Career Break (If Any)</label>
                                <textarea rows="2" name="career_break" placeholder="Explain any employment gaps..." class="premium-input text-sm resize-none"></textarea>
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Certifications if Any (Oracle, Java, Network etc.)</label>
                                <textarea rows="2" name="certifications" placeholder="List certifications or professional credentials..." class="premium-input text-sm resize-none"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Section 7: Languages Known -->
                    <div class="reveal space-y-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-b border-[#e8edf5] pb-3">
                            <div class="flex items-center gap-3">
                                <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">07</span>
                                <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Language Known</h2>
                            </div>

                            <div class="text-[11px] font-semibold text-[#4f6fff] bg-[#f0f4ff] border border-[#c7d2fe] rounded-full px-4 py-1.5 flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#4f6fff] animate-pulse"></span>
                                R: Read | W: Write | S: Speak | U: Understand
                            </div>
                        </div>

                        <div class="w-full overflow-x-auto rounded-2xl border border-[#e8edf5] custom-scrollbar shadow-sm bg-white/60">
                            <table class="responsive-table w-full text-sm border-collapse text-center">
                                <thead class="bg-slate-50 text-[#0f1f5c] border-b border-[#e8edf5]">
                                    <tr>
                                        <th class="p-3 font-bold text-xs uppercase border-r border-[#e8edf5]/60">S. No.</th>
                                        <th class="p-3 font-bold text-xs uppercase border-r border-[#e8edf5]/60 text-left">Language</th>
                                        <th class="p-3 font-bold text-xs uppercase">R</th>
                                        <th class="p-3 font-bold text-xs uppercase">W</th>
                                        <th class="p-3 font-bold text-xs uppercase">S</th>
                                        <th class="p-3 font-bold text-xs uppercase border-r border-[#e8edf5]/60">U</th>

                                        <th class="p-3 font-bold text-xs uppercase border-r border-[#e8edf5]/60">S. No.</th>
                                        <th class="p-3 font-bold text-xs uppercase border-r border-[#e8edf5]/60 text-left">Language</th>
                                        <th class="p-3 font-bold text-xs uppercase">R</th>
                                        <th class="p-3 font-bold text-xs uppercase">W</th>
                                        <th class="p-3 font-bold text-xs uppercase">S</th>
                                        <th class="p-3 font-bold text-xs uppercase">U</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#e8edf5]/60">
                                    @for ($i = 1; $i <= 3; $i++)
                                    <tr class="hover:bg-slate-50/20 transition-all duration-200">
                                        <td data-label="S. No. 1" class="p-3 font-medium text-[#6b7db3] border-r border-[#e8edf5]/60">{{ $i }}</td>
                                        <td data-label="Language 1" class="p-2 border-r border-[#e8edf5]/60">
                                            <input type="text" name="languages[{{ $i }}]" value="{{ old('languages.' . $i) }}" placeholder="Language" class="premium-input text-xs w-full py-1.5 px-3">
                                        </td>
                                        <td data-label="Read 1 (R)" class="p-3">
                                            <input type="checkbox" name="language_skills[{{ $i }}][{{ $j = 1 }}]" {{ old("language_skills.$i.$j") ? 'checked' : '' }} class="glass-checkbox">
                                        </td>
                                        <td data-label="Write 1 (W)" class="p-3">
                                            <input type="checkbox" name="language_skills[{{ $i }}][{{ $j = 2 }}]" {{ old("language_skills.$i.$j") ? 'checked' : '' }} class="glass-checkbox">
                                        </td>
                                        <td data-label="Speak 1 (S)" class="p-3">
                                            <input type="checkbox" name="language_skills[{{ $i }}][{{ $j = 3 }}]" {{ old("language_skills.$i.$j") ? 'checked' : '' }} class="glass-checkbox">
                                        </td>
                                        <td data-label="Understand 1" class="p-3 border-r border-[#e8edf5]/60">
                                            <input type="checkbox" name="language_skills[{{ $i }}][{{ $j = 4 }}]" {{ old("language_skills.$i.$j") ? 'checked' : '' }} class="glass-checkbox">
                                        </td>

                                        <td data-label="S. No. 2" class="p-3 font-medium text-[#6b7db3] border-r border-[#e8edf5]/60 border-l border-[#e8edf5]/60">{{ $i + 3 }}</td>
                                        <td data-label="Language 2" class="p-2 border-r border-[#e8edf5]/60">
                                            <input type="text" name="languages[{{ $i + 3 }}]" value="{{ old('languages.' . ($i + 3)) }}" placeholder="Language" class="premium-input text-xs w-full py-1.5 px-3">
                                        </td>
                                        <td data-label="Read 2 (R)" class="p-3">
                                            <input type="checkbox" name="language_skills[{{ $i + 3 }}][{{ $j = 1 }}]" {{ old("language_skills." . ($i + 3) . ".$j") ? 'checked' : '' }} class="glass-checkbox">
                                        </td>
                                        <td data-label="Write 2 (W)" class="p-3">
                                            <input type="checkbox" name="language_skills[{{ $i + 3 }}][{{ $j = 2 }}]" {{ old("language_skills." . ($i + 3) . ".$j") ? 'checked' : '' }} class="glass-checkbox">
                                        </td>
                                        <td data-label="Speak 2 (S)" class="p-3">
                                            <input type="checkbox" name="language_skills[{{ $i + 3 }}][{{ $j = 3 }}]" {{ old("language_skills." . ($i + 3) . ".$j") ? 'checked' : '' }} class="glass-checkbox">
                                        </td>
                                        <td data-label="Understand 2" class="p-3">
                                            <input type="checkbox" name="language_skills[{{ $i + 3 }}][{{ $j = 4 }}]" {{ old("language_skills." . ($i + 3) . ".$j") ? 'checked' : '' }} class="glass-checkbox">
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                        @if($errors->has('languages.*'))
                        <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>Please fill language fields</p>
                        @endif
                    </div>

                    <!-- Section 8: Family Details -->
                    <div class="reveal space-y-6">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-b border-[#e8edf5] pb-3">
                            <div class="flex items-center gap-3">
                                <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">08</span>
                                <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Family Details</h2>
                            </div>

                            <button type="button" id="addFamilyRowBtn" class=" w-28 inline-flex items-center gap-1.5 text-[12px] font-semibold text-[#4f6fff] bg-[#f0f4ff] border border-[#c7d2fe] rounded-full px-4 py-2 hover:bg-[#4f6fff] hover:text-white hover:border-[#4f6fff] transition-colors duration-300 whitespace-nowrap cursor-pointer shadow-[0_2px_8px_rgba(79,111,255,0.05)] active:scale-95">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                Add Row
                            </button>
                        </div>

                        <div class="w-full overflow-x-auto rounded-2xl border border-[#e8edf5] custom-scrollbar shadow-sm bg-white/60">
                            <table class="responsive-table min-w-[1100px] w-full text-sm border-collapse text-left" id="familyTable">
                                <thead class="bg-slate-50 text-[#0f1f5c] border-b border-[#e8edf5]">
                                    <tr>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider text-center w-16">S. No.</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Name</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider w-28">Age</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Relationship</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Occupation</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider w-36">Dependent</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Contact No</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="familyBody" class="divide-y divide-[#e8edf5]/60">
                                    <tr class="hover:bg-slate-50/50 transition-all duration-200">
                                        <td data-label="S. No." class="p-3 text-center font-medium text-[#6b7db3] serialNo">1</td>
                                        <td data-label="Name" class="p-2">
                                            <input type="text" name="family_name[]" placeholder="Enter Name" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="Age" class="p-2">
                                            <input type="text" name="family_age[]" placeholder="Age" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="Relationship" class="p-2">
                                            <input type="text" name="family_relationship[]" placeholder="Relationship" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="Occupation" class="p-2">
                                            <input type="text" name="family_occupation[]" placeholder="Occupation" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="Dependent" class="p-2">
                                            <select name="family_dependent[]" class="premium-input text-xs w-full py-2 px-3 bg-white cursor-pointer">
                                                <option>Select</option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </td>
                                        <td data-label="Contact No" class="p-2">
                                            <input type="text" name="family_contact[]" placeholder="Contact Number" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td class="p-2 text-center action-cell">
                                            <button type="button" class="removeFamilyRow flex items-center justify-center bg-rose-50 hover:bg-rose-500 hover:text-white text-rose-500 border border-rose-100 w-8 h-8 rounded-xl mx-auto transition-all duration-200 active:scale-90 cursor-pointer">
                                                <svg class="w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @if(
                            $errors->has('family_name.*') ||
                            $errors->has('family_age.*') ||
                            $errors->has('family_relationship.*') ||
                            $errors->has('family_occupation.*') ||
                            $errors->has('family_dependent.*') ||
                            $errors->has('family_contact.*')
                        )
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>Please fill all family details properly</p>
                        @endif
                    </div>

                    <!-- Section 9: Other Details -->
                    <div class="reveal space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">09</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Other Details</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Sunday Work selection card -->
                            <div class="bg-slate-50 border border-[#e8edf5] rounded-2xl p-5 flex flex-col justify-between">
                                <label class="text-sm font-bold text-[#0f1f5c] leading-snug">Are you willing to work on Sundays?</label>
                                <div class="mt-4 flex gap-8">
                                    <label class="flex items-center gap-2 text-sm text-[#0f1f5c] cursor-pointer group">
                                        <input type="radio" name="sunday_work" value="Yes" class="w-4 h-4 accent-[#4f6fff] cursor-pointer">
                                        <span class="group-hover:text-[#4f6fff] transition ml-1">Yes</span>
                                    </label>
                                    <label class="flex items-center gap-2 text-sm text-[#0f1f5c] cursor-pointer group">
                                        <input type="radio" name="sunday_work" value="No" class="w-4 h-4 accent-[#4f6fff] cursor-pointer">
                                        <span class="group-hover:text-[#4f6fff] transition ml-1">No</span>
                                    </label>
                                </div>
                                @error('sunday_work')
                                <p class="text-red-500 text-xs mt-2 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="bg-slate-50 border border-[#e8edf5] rounded-2xl p-5 flex flex-col justify-between">
                                <label class="text-sm font-bold text-[#0f1f5c] leading-snug">Joining Date required</label>
                                <input type="date" name="joining_date" value="{{ old('joining_date') }}" class="premium-input text-sm mt-3 w-full sm:max-w-[70%]">
                                @error('joining_date')
                                <p class="text-red-500 text-xs mt-2 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <label class="text-sm font-bold text-[#0f1f5c] leading-relaxed">
                                Is there any litigation pending against you filed by (a) Any relative (b) Otherwise? If Yes, Please provide details.
                            </label>
                            <textarea rows="2" name="litigation" placeholder="Litigation details if applicable..." class="premium-input text-sm mt-3 resize-none"></textarea>
                        </div>
                    </div>

                    <!-- Section 10: References -->
                    <div class="reveal space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">10</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">References (From your current Organization)</h2>
                        </div>

                        <div class="w-full overflow-x-auto rounded-2xl border border-[#e8edf5] custom-scrollbar shadow-sm bg-white/60">
                            <table class="responsive-table min-w-[750px] w-full text-sm border-collapse text-left">
                                <thead class="bg-slate-50 text-[#0f1f5c] border-b border-[#e8edf5]">
                                    <tr>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider text-center w-20">S. No.</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Name</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Designation</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Mobile</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Phone</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#e8edf5]/60">
                                    @for ($i = 1; $i <= 2; $i++)
                                    <tr class="hover:bg-slate-50/50 transition-all duration-200">
                                        <td data-label="S. No." class="p-4 text-center font-medium text-[#6b7db3]">{{ $i }}</td>
                                        <td data-label="Name" class="p-2">
                                            <input type="text" name="reference_name[]" placeholder="Enter Name" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="Designation" class="p-2">
                                            <input type="text" name="reference_designation[]" placeholder="Enter Designation" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="Mobile" class="p-2">
                                            <input type="text" name="reference_mobile[]" placeholder="Enter Mobile Number" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="Phone" class="p-2">
                                            <input type="text" name="reference_phone[]" placeholder="Enter the Number" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Section 11: Refer Friends -->
                    <div class="reveal space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">11</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Please Refer your friends who would like to join us</h2>
                        </div>

                        <div class="w-full overflow-x-auto rounded-2xl border border-[#e8edf5] custom-scrollbar shadow-sm bg-white/60">
                            <table class="responsive-table min-w-[750px] w-full text-sm border-collapse text-left">
                                <thead class="bg-slate-50 text-[#0f1f5c] border-b border-[#e8edf5]">
                                    <tr>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider text-center w-20">S. No.</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Name</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Relationship</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Mobile</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Phone</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#e8edf5]/60">
                                    @for ($i = 1; $i <= 2; $i++)
                                    <tr class="hover:bg-slate-50/50 transition-all duration-200">
                                        <td data-label="S. No." class="p-4 text-center font-medium text-[#6b7db3]">{{ $i }}</td>
                                        <td data-label="Name" class="p-2">
                                            <input type="text" name="friend_name[]" placeholder="Enter Name" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="Relationship" class="p-2">
                                            <input type="text" name="friend_relationship[]" placeholder="Enter Relationship" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="Mobile" class="p-2">
                                            <input type="text" name="friend_mobile[]" placeholder="Enter Mobile Number" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                        <td data-label="Phone" class="p-2">
                                            <input type="text" name="friend_phone[]" placeholder="Enter Phone Number" class="premium-input text-xs w-full py-2 px-3">
                                        </td>
                                    </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Section 12: Rathinam Employee Reference -->
                    <div class="reveal space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">12</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Do you know any Rathinam Employees?</h2>
                        </div>

                        <div class="flex flex-col">
                            <label class="text-sm font-bold text-[#0f1f5c] leading-relaxed">
                                If Yes Please mention the name and your relationship with them:
                            </label>
                            <textarea rows="2" name="employee_reference" placeholder="Enter employee names & relationship details..." class="premium-input text-sm mt-3 resize-none">{{ old('employee_reference') }}</textarea>
                            @error('employee_reference')
                            <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Section 13: Declaration -->
                    <div class="reveal bg-slate-50 border border-[#e8edf5] rounded-3xl p-6 sm:p-8 space-y-8 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-[#4f6fff]/5 rounded-full filter blur-xl pointer-events-none"></div>

                        <div class="flex items-start gap-3">
                            <div class="w-5 h-5 rounded-full bg-[#f0f4ff] border border-[#c7d2fe] flex-shrink-0 mt-0.5 flex items-center justify-center text-[10px] font-bold text-[#4f6fff]">!</div>
                            <p class="text-sm text-[#0f1f5c] leading-relaxed">
                                I hereby solemnly declare that all the details furnished above are true to the best of my knowledge.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-4 border-t border-[#e8edf5]">
                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Date</label>
                                <input type="date" name="declaration_date" value="{{ old('declaration_date') }}" class="premium-input text-sm">
                                @error('declaration_date')
                                <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Place</label>
                                <input type="text" name="place" placeholder="Enter Your Place" value="{{ old('place') }}" class="premium-input text-sm">
                                @error('place')
                                <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Signature</label>
                                <input type="text" name="signature" placeholder="Enter Your Signature" value="{{ old('signature') }}" class="premium-input text-sm font-semibold">
                                @error('signature')
                                <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1.5"><span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse"></span>{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Submission Action Block -->
                    <div class="reveal mt-12 flex flex-col sm:flex-row items-center justify-between gap-6 pt-8 border-t border-[#e8edf5]">
                        <div class="text-left">
                            <span class="text-xs font-mono text-[#a0aec0] block">Doc Ref: RGI/HR/FR 001 Rev:02</span>
                            <span class="text-xs font-mono text-[#a0aec0]">Date of Issue: 01-06-2025</span>
                        </div>

                        <button type="submit" class="submit-btn-glow w-full sm:w-auto text-white font-bold text-sm sm:text-base px-10 py-4 rounded-xl cursor-pointer">
                            Submit Form
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</form>

<!-- Soft Particles Animation Script & Form Progress & Scroll Reveal -->
<script>
    // Header Particles Effect in soft royal blue
    const canvas = document.getElementById('headerParticles');
    const ctx = canvas.getContext('2d');

    let width = canvas.width = canvas.offsetWidth;
    let height = canvas.height = canvas.offsetHeight;

    window.addEventListener('resize', () => {
        width = canvas.width = canvas.offsetWidth;
        height = canvas.height = canvas.offsetHeight;
    });

    const particles = [];
    const maxParticles = 25;

    class Particle {
        constructor() {
            this.x = Math.random() * width;
            this.y = Math.random() * height;
            this.size = Math.random() * 2 + 1;
            this.speedX = Math.random() * 0.3 - 0.15;
            this.speedY = Math.random() * 0.3 - 0.15;
            this.opacity = Math.random() * 0.4 + 0.1;
        }

        update() {
            this.x += this.speedX;
            this.y += this.speedY;

            if (this.x < 0 || this.x > width) this.speedX *= -1;
            if (this.y < 0 || this.y > height) this.speedY *= -1;
        }

        draw() {
            ctx.fillStyle = `rgba(79, 111, 255, ${this.opacity})`;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    for (let i = 0; i < maxParticles; i++) {
        particles.push(new Particle());
    }

    function animateParticles() {
        ctx.clearRect(0, 0, width, height);

        for (let i = 0; i < particles.length; i++) {
            particles[i].update();
            particles[i].draw();

            for (let j = i + 1; j < particles.length; j++) {
                const dist = Math.hypot(particles[i].x - particles[j].x, particles[i].y - particles[j].y);
                if (dist < 100) {
                    ctx.strokeStyle = `rgba(79, 111, 255, ${0.1 * (1 - dist / 100)})`;
                    ctx.lineWidth = 0.8;
                    ctx.beginPath();
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.stroke();
                }
            }
        }
        requestAnimationFrame(animateParticles);
    }
    animateParticles();

    // Scroll Reveal Observer
    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('reveal-visible');
            }
        });
    }, {
        threshold: 0.05,
        rootMargin: '0px 0px -40px 0px'
    });

    reveals.forEach(r => observer.observe(r));

    // Dynamic Form Completion Tracker
    const progressTrackedInputs = 'input[type="text"], input[type="date"], input[type="time"], input[type="number"], select, textarea';
    const formProgressBar = document.getElementById('formProgressBar');

    function updateProgress() {
        const inputs = Array.from(document.querySelectorAll(progressTrackedInputs));
        const filled = inputs.filter(input => input.value.trim() !== '' && input.value !== 'Select').length;
        const total = inputs.length;
        const percent = Math.min(Math.round((filled / total) * 100), 100);
        formProgressBar.style.width = `${percent}%`;
    }

    document.addEventListener('input', updateProgress);
    document.addEventListener('change', updateProgress);
    setTimeout(updateProgress, 600);
</script>

<!-- Script: Educational Qualification Rows -->
<script>
    const addRowBtn = document.getElementById('addRowBtn');
    const educationBody = document.getElementById('educationBody');
    const maxRows = 3;

    addRowBtn.addEventListener('click', () => {
        const currentRows = educationBody.querySelectorAll('tr').length;

        if (currentRows >= maxRows) {
            alert('Maximum 3 rows only allowed');
            return;
        }

        const newRow = `
        <tr class="hover:bg-slate-50/50 transition-all duration-200 row-animation">
            <td data-label="Degree" class="p-2">
                <input type="text" name="degree[]" placeholder="Enter Degree" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td data-label="Division" class="p-2">
                <input type="text" name="division[]" placeholder="Division" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td data-label="College" class="p-2">
                <input type="text" name="college[]" placeholder="College" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td data-label="University" class="p-2">
                <input type="text" name="university[]" placeholder="University" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td data-label="% Marks" class="p-2">
                <input type="text" name="marks[]" placeholder="Marks" class="premium-input text-xs w-full py-2 px-3 text-center">
            </td>
            <td data-label="Subjects" class="p-2">
                <input type="text" name="subjects[]" placeholder="Subjects" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td data-label="Year" class="p-2">
                <input type="text" name="year_of_passing[]" placeholder="Year" class="premium-input text-xs w-full py-2 px-3 text-center">
            </td>
            <td class="p-2 text-center action-cell">
                <button type="button" class="removeRow flex items-center justify-center bg-rose-50 hover:bg-rose-500 hover:text-white text-rose-500 border border-rose-100 w-8 h-8 rounded-xl mx-auto transition-all duration-200 active:scale-90 cursor-pointer">
                    <svg class="w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </td>
        </tr>
        `;

        educationBody.insertAdjacentHTML('beforeend', newRow);
        updateProgress();
    });

    educationBody.addEventListener('click', function(e) {
        const removeBtn = e.target.closest('.removeRow');
        if (removeBtn) {
            const rows = educationBody.querySelectorAll('tr');
            if (rows.length === 1) {
                alert('At least one row is required');
                return;
            }
            const tr = removeBtn.closest('tr');
            tr.style.transform = 'translateY(8px)';
            tr.style.opacity = '0';
            tr.style.transition = 'all 0.3s ease';
            setTimeout(() => {
                tr.remove();
                updateProgress();
            }, 300);
        }
    });
</script>

<!-- Script: Work Experience Rows -->
<script>
    const addExperienceRowBtn = document.getElementById('addExperienceRowBtn');
    const experienceBody = document.getElementById('experienceBody');
    const maxExperienceRows = 3;

    addExperienceRowBtn.addEventListener('click', () => {
        const currentRows = experienceBody.querySelectorAll('tr').length;

        if (currentRows >= maxExperienceRows) {
            alert('Maximum 3 rows only allowed');
            return;
        }

        const newRow = `
        <tr class="hover:bg-slate-50/50 transition-all duration-200 row-animation">
            <td data-label="Organization" class="p-2">
                <input type="text" name="organization[]" placeholder="Organization" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td data-label="Designation" class="p-2">
                <input type="text" name="designation[]" placeholder="Designation" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td data-label="From" class="p-2">
                <input type="date" name="from_date[]" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td data-label="To" class="p-2">
                <input type="date" name="to_date[]" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td data-label="Salary PM" class="p-2">
                <input type="text" name="gross_salary[]" placeholder="Gross Salary" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td data-label="Annual CTC" class="p-2">
                <input type="text" name="annual_ctc[]" placeholder="Annual CTC" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td data-label="Reason" class="p-2">
                <input type="text" name="reason_for_leaving[]" placeholder="Reason" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td class="p-2 text-center action-cell">
                <button type="button" class="removeExperienceRow flex items-center justify-center bg-rose-50 hover:bg-rose-500 hover:text-white text-rose-500 border border-rose-100 w-8 h-8 rounded-xl mx-auto transition-all duration-200 active:scale-90 cursor-pointer">
                    <svg class="w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </td>
        </tr>
        `;

        experienceBody.insertAdjacentHTML('beforeend', newRow);
        updateProgress();
    });

    experienceBody.addEventListener('click', function(e) {
        const removeBtn = e.target.closest('.removeExperienceRow');
        if (removeBtn) {
            const rows = experienceBody.querySelectorAll('tr');
            if (rows.length === 1) {
                alert('At least one row is required');
                return;
            }
            const tr = removeBtn.closest('tr');
            tr.style.transform = 'translateY(8px)';
            tr.style.opacity = '0';
            tr.style.transition = 'all 0.3s ease';
            setTimeout(() => {
                tr.remove();
                updateProgress();
            }, 300);
        }
    });
</script>

<!-- Script: Family Details Rows -->
<script>
    const addFamilyRowBtn = document.getElementById('addFamilyRowBtn');
    const familyBody = document.getElementById('familyBody');
    const maxFamilyRows = 15;

    function updateFamilySerialNumbers() {
        const rows = familyBody.querySelectorAll('tr');
        rows.forEach((row, index) => {
            row.querySelector('.serialNo').textContent = index + 1;
        });
    }

    addFamilyRowBtn.addEventListener('click', () => {
        const currentRows = familyBody.querySelectorAll('tr').length;

        if (currentRows >= maxFamilyRows) {
            alert('Maximum 15 rows only allowed');
            return;
        }

        const newRow = `
        <tr class="hover:bg-slate-50/50 transition-all duration-200 row-animation">
            <td data-label="S. No." class="p-3 text-center font-medium text-[#6b7db3] serialNo">${currentRows + 1}</td>
            <td data-label="Name" class="p-2">
                <input type="text" name="family_name[]" placeholder="Enter Name" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td data-label="Age" class="p-2">
                <input type="text" name="family_age[]" placeholder="Age" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td data-label="Relationship" class="p-2">
                <input type="text" name="family_relationship[]" placeholder="Relationship" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td data-label="Occupation" class="p-2">
                <input type="text" name="family_occupation[]" placeholder="Occupation" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td data-label="Dependent" class="p-2">
                <select name="family_dependent[]" class="premium-input text-xs w-full py-2 px-3 bg-white cursor-pointer">
                    <option>Select</option>
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </td>
            <td data-label="Contact No" class="p-2">
                <input type="text" name="family_contact[]" placeholder="Contact Number" class="premium-input text-xs w-full py-2 px-3">
            </td>
            <td class="p-2 text-center action-cell">
                <button type="button" class="removeFamilyRow flex items-center justify-center bg-rose-50 hover:bg-rose-500 hover:text-white text-rose-500 border border-rose-100 w-8 h-8 rounded-xl mx-auto transition-all duration-200 active:scale-90 cursor-pointer">
                    <svg class="w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </td>
        </tr>
        `;

        familyBody.insertAdjacentHTML('beforeend', newRow);
        updateProgress();
    });

    familyBody.addEventListener('click', function(e) {
        const removeBtn = e.target.closest('.removeFamilyRow');
        if (removeBtn) {
            const rows = familyBody.querySelectorAll('tr');
            if (rows.length === 1) {
                alert('At least one row is required');
                return;
            }
            const tr = removeBtn.closest('tr');
            tr.style.transform = 'translateY(8px)';
            tr.style.opacity = '0';
            tr.style.transition = 'all 0.3s ease';
            setTimeout(() => {
                tr.remove();
                updateFamilySerialNumbers();
                updateProgress();
            }, 300);
        }
    });
</script>
