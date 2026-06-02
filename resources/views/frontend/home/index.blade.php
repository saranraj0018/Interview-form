<form method="POST" action="{{ url('/interview/submit/' . $token) }}">
    @csrf

    <!-- CSS styles matching Company List/Candidate Personal Data DNA -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        .interview-theme {
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

        /* Checkbox/Radio glowing effects matching brand color */
        .radio-input:checked+.box {
            background-color: #4f6fff;
            border-color: #4f6fff;
            box-shadow: 0 0 8px rgba(79, 111, 255, 0.3);
        }

        .radio-input:checked+.box .check-icon {
            display: block;
        }

        /* Mobile full card highlight */
        .option.checked-active {
            background-color: #f0f4ff;
            border-color: #4f6fff;
        }

        .option.checked-active span {
            color: #4f6fff;
            font-weight: bold;
        }

        .option.checked-active .box {
            background-color: #4f6fff;
            border-color: #4f6fff;
        }

        .option.checked-active .check-icon {
            display: block;
        }

        /* Final Recommendations styles */
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

        .premium-option.checked-active-danger {
            border-color: #f43f5e;
            background: #fff1f2;
            box-shadow: 0 4px 12px rgba(244, 63, 94, 0.08);
        }

        .premium-option.checked-active-danger span {
            color: #f43f5e;
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

        .premium-option.checked-active-danger .custom-radio-box {
            border-color: #f43f5e;
            background: #f43f5e;
            color: #ffffff;
        }

        .custom-radio-box::before {
            content: "✔";
            font-size: 10px;
            color: white;
            font-weight: bold;
            display: none;
        }

        .premium-option.checked-active .custom-radio-box::before,
        .premium-option.checked-active-danger .custom-radio-box::before {
            display: block;
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

    <div class="interview-theme min-h-screen py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
        <!-- Ambient light glow backdrops -->
        <div class="ambient-glow-1"></div>
        <div class="ambient-glow-2"></div>

        <div class="max-w-5xl mx-auto relative z-10">

            <!-- Branded Progress Bar -->
            <div class="w-full h-1.5 bg-slate-200/50 rounded-full mb-8 overflow-hidden border border-[#e8edf5] relative z-20 shadow-[0_1px_3px_rgba(0,0,0,0.03)]">
                <div id="formProgressBar" class="h-full bg-gradient-to-r from-[#1a3faa] via-[#4f6fff] to-[#7c93ff] w-0 transition-all duration-500 shadow-[0_0_8px_rgba(79,111,255,0.4)]"></div>
            </div>

            <!-- Main Portal Layout Card -->
            <div class="glass-card rounded-3xl shadow-xl overflow-hidden">

                <!-- Hero Section Header (Inspired by Company List Design) -->
                <div class="px-4 py-8 sm:px-8 sm:py-12 border-b border-[#e8edf5] text-center relative overflow-hidden bg-white/40">
                    <!-- Soft Particle Canvas -->
                    <canvas id="headerParticles" class="absolute inset-0 pointer-events-none opacity-50"></canvas>
                    
                    <div class="relative z-10">
                        <div class="flex justify-center mb-4">
                            <img src="{{ asset('assets/images/rathinamgroup.png') }}" alt="Logo" class="h-16 w-auto drop-shadow-sm">
                        </div>

                        <div class="inline-flex items-center gap-2 bg-[#eff2ff] text-[#4f6fff] text-[11px] font-bold tracking-widest uppercase border border-[#c7d2fe] rounded-full px-4 py-1.5 mb-5 animate-pulse">
                            <span class="w-2 h-2 rounded-full bg-[#4f6fff] ring-2 ring-[#c7d2fe] ring-offset-1 ring-offset-[#eff2ff]"></span>
                            Assessment Phase · {{ date('Y') }}
                        </div>

                        <h1 class="text-2xl sm:text-3xl lg:text-[40px] font-extrabold text-[#0f1f5c] leading-[1.2] tracking-tight mb-3">
                            RATHINAM GROUP OF INSTITUTIONS
                        </h1>
                        <p class="text-[#4f6fff] text-base sm:text-lg font-bold tracking-wide">
                            Interview Assessment Form
                        </p>
                    </div>
                </div>

                <!-- Form Content Space -->
                <div class="p-4 sm:p-10 space-y-12 bg-white/30">

                    <!-- Section 1: Candidate Details -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">01</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Candidate Details</h2>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                            <div class="bg-white/50 border border-[#e8edf5] rounded-2xl p-4">
                                <p class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-1">Name of Candidate</p>
                                <p class="font-bold text-[#0f1f5c] text-base">{{ $interview->candidate->full_name ?? '-' }}</p>
                            </div>
                            <div class="bg-white/50 border border-[#e8edf5] rounded-2xl p-4">
                                <p class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-1">Experience</p>
                                <p class="font-bold text-[#0f1f5c] text-base">
                                    {{ ($interview->candidate->experience == 0 || !$interview->candidate->experience)
                                    ? 'Fresher'
                                    : $interview->candidate->experience . ' Years' }}
                                </p>
                            </div>
                            <div class="bg-white/50 border border-[#e8edf5] rounded-2xl p-4">
                                <p class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-1">Department</p>
                                <p class="font-bold text-[#0f1f5c] text-base">{{ $interview->department }}</p>
                            </div>
                            <div class="bg-white/50 border border-[#e8edf5] rounded-2xl p-4">
                                <p class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-1">Position</p>
                                <p class="font-bold text-[#0f1f5c] text-base">{{ $interview->candidate->position_applied ?? '-' }}</p>
                            </div>
                            <div class="bg-white/50 border border-[#e8edf5] rounded-2xl p-4 sm:col-span-2 md:col-span-2">
                                <p class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-1">Date of Interview</p>
                                <p class="font-bold text-[#0f1f5c] text-base">{{ $interview->interview_date }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Interviewer Details -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">02</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Interviewer Details</h2>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                            <div class="bg-white/50 border border-[#e8edf5] rounded-2xl p-4">
                                <p class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-1">Interviewer Name</p>
                                <p class="font-bold text-[#0f1f5c] text-base">{{ $pivot->category->person_name ?? '-' }}</p>
                            </div>
                            <div class="bg-white/50 border border-[#e8edf5] rounded-2xl p-4">
                                <p class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-1">Email</p>
                                <p class="font-bold text-[#0f1f5c] text-base">{{ $pivot->category->email ?? '-' }}</p>
                            </div>
                            <div class="bg-white/50 border border-[#e8edf5] rounded-2xl p-4">
                                <p class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-1">Designation</p>
                                <p class="font-bold text-[#0f1f5c] text-base">{{ $pivot->category->designation ?? '-' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Attributes Rating -->
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
                    'AI Skills',
                    ];
                    @endphp

                    <div class="space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">03</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Evaluation Attributes</h2>
                        </div>

                        @if ($errors->any())
                        <div class="bg-rose-50 text-rose-700 border border-rose-200 p-4 rounded-2xl mb-6 backdrop-blur-md flex flex-col gap-2 shadow-sm">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-rose-500 animate-pulse flex-shrink-0"></span>
                                <span class="text-sm font-bold">Please correct the following errors:</span>
                            </div>
                            <ul class="list-disc pl-6 text-xs space-y-1">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- MOBILE RATING LIST -->
                        <div class="block sm:hidden space-y-4">
                            @foreach ($attributes as $key => $item)
                            <div class="bg-white/60 border border-[#e8edf5] rounded-2xl p-4 shadow-sm relative overflow-hidden">
                                <div class="flex justify-between items-center mb-3">
                                    <span class="flex items-center justify-center w-6 h-6 rounded-full bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-xs font-bold">{{ $key + 1 }}</span>
                                    <span class="text-[10px] font-bold text-[#6b7db3] uppercase tracking-wider">Rating</span>
                                </div>
                                <h4 class="font-bold text-[#0f1f5c] text-[14px] leading-snug mb-3">{{ $item }}</h4>
                                <div class="grid grid-cols-2 gap-2">
                                    @foreach ([
                                    'excellent' => 5,
                                    'good' => 4,
                                    'average' => 3,
                                    'below' => 2,
                                    ] as $value => $mark)
                                    <label class="option flex items-center gap-2 border border-[#e8edf5] bg-white/70 p-2.5 rounded-xl cursor-pointer hover:border-[#c7d2fe] transition-all duration-200">
                                        <input type="radio" name="rating[{{ $key }}]" value="{{ $mark }}" class="radio-input hidden rating-radio">
                                        <div class="box w-4 h-4 border border-[#c7d2fe] rounded flex items-center justify-center bg-white transition-all duration-200 shrink-0">
                                            <span class="check-icon text-white text-[10px] hidden">✔</span>
                                        </div>
                                        <span class="capitalize text-xs font-semibold text-[#5d6b98]">
                                            {{ $value }} ({{ $mark }})
                                        </span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- DESKTOP RATING TABLE -->
                        <div class="hidden sm:block overflow-x-auto rounded-2xl border border-[#e8edf5] bg-white/60 shadow-sm custom-scrollbar">
                            <table class="w-full text-sm border-collapse text-left">
                                <thead class="bg-slate-50 border-b border-[#e8edf5]">
                                    <tr class="text-[#0f1f5c]">
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider text-center w-16">S.No</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Attributes</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider text-center w-28">Excellent (5)</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider text-center w-28">Good (4)</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider text-center w-28">Average (3)</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider text-center w-28">Below Avg (2)</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#e8edf5]/60">
                                    @foreach ($attributes as $key => $item)
                                    <tr class="hover:bg-slate-50/50 transition-all duration-200">
                                        <td class="p-4 text-center font-bold text-[#6b7db3]">
                                            {{ $key + 1 }}
                                        </td>
                                        <td class="p-4 font-semibold text-[#0f1f5c]">
                                            {{ $item }}
                                        </td>
                                        @foreach ([
                                        'excellent' => 5,
                                        'good' => 4,
                                        'average' => 3,
                                        'below' => 2,
                                        ] as $val => $mark)
                                        <td class="p-4 text-center">
                                            <label class="cursor-pointer flex justify-center">
                                                <input type="radio" name="rating[{{ $key }}]" value="{{ $mark }}" data-label="{{ ucfirst($val) }}" class="radio-input hidden rating-radio">
                                                <div class="box w-5 h-5 border border-[#c7d2fe] rounded flex items-center justify-center bg-white transition-all duration-200 hover:border-[#4f6fff]">
                                                    <span class="check-icon text-white text-[11px] hidden">✔</span>
                                                </div>
                                            </label>
                                        </td>
                                        @endforeach
                                    </tr>
                                    @endforeach

                                    <tr class="bg-[#f0f4ff]/80 border-t border-[#c7d2fe]">
                                        <td colspan="2" class="p-4 text-right font-extrabold text-[#0f1f5c] text-base">
                                            Overall Rating Score
                                        </td>
                                        <td colspan="4" class="p-4 text-center">
                                            <div class="inline-flex items-center justify-center bg-white border border-[#c7d2fe] rounded-2xl px-6 py-2.5 shadow-sm">
                                                <span class="text-2xl font-extrabold text-[#4f6fff] leading-none">
                                                    <span id="totalMarks">0</span> <span class="text-slate-300 font-normal text-lg">/</span> 60
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Section 4: Comments & Recommendations -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">04</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Comments &amp; Decisions</h2>
                        </div>

                        <!-- Overall Comments -->
                        <div class="flex flex-col">
                            <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Overall Comments</label>
                            <textarea name="comments" class="premium-input text-sm resize-none focus:bg-white" rows="3" placeholder="Enter comments here..."></textarea>
                        </div>

                        <!-- Final Recommendations -->
                        <div class="flex flex-col">
                            <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2.5">Final Recommendations</label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
                                @foreach ([
                                'selected' => 'Selected',
                                'not_suitable' => 'Not suitable for the role',
                                'rejected' => 'Rejected',
                                'hold' => 'Hold for future reference',
                                ] as $value => $label)
                                <label class="premium-option flex items-center gap-3 border rounded-xl p-3.5 cursor-pointer select-none">
                                    <input type="radio" name="final_recommendation" value="{{ $value }}" class="radio-input hidden">
                                    <div class="custom-radio-box shrink-0"></div>
                                    <span class="text-sm font-semibold text-[#5d6b98]">
                                        {{ $label }}
                                    </span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Section 5: Salary Details -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">05</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Salary Details</h2>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Present Salary</label>
                                <input type="number" name="present_salary" value="{{ $interview->candidate->current_gross ?? '' }}" min="0" step="any" class="premium-input text-sm" placeholder="Present Gross Salary">
                            </div>
                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Expected Salary</label>
                                <input type="number" name="expected_salary" value="{{ $interview->candidate->expected_gross ?? '' }}" min="0" step="any" class="premium-input text-sm" placeholder="Expected Salary">
                            </div>
                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Proposed Gross Salary</label>
                                <input type="number" name="proposed_gross" value="{{ $interview->proposed_gross_salary ?? '' }}" min="0" step="any" class="premium-input text-sm" placeholder="Proposed Gross Salary">
                            </div>
                            <div class="flex flex-col">
                                <label class="text-[11px] font-bold text-[#6b7db3] uppercase tracking-wider mb-2">Proposed CTC Salary</label>
                                <input type="number" name="proposed_ctc" value="{{ $interview->proposed_ctc_salary ?? '' }}" min="0" step="any" class="premium-input text-sm" placeholder="Proposed CTC Salary">
                            </div>
                        </div>
                    </div>

                    <!-- Section 6: Panel Members -->
                    <div class="space-y-6">
                        <div class="flex items-center gap-3 border-b border-[#e8edf5] pb-3">
                            <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-[#f0f4ff] border border-[#c7d2fe] text-[#4f6fff] text-sm font-bold">06</span>
                            <h2 class="text-lg font-bold text-[#0f1f5c] tracking-wide">Panel Members</h2>
                        </div>
                        <div class="overflow-x-auto rounded-2xl border border-[#e8edf5] bg-white/60 shadow-sm custom-scrollbar">
                            <table class="w-full text-sm border-collapse text-left min-w-[700px]">
                                <thead class="bg-slate-50 border-b border-[#e8edf5]">
                                    <tr class="text-[#0f1f5c]">
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider w-16 text-center">S No</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider w-1/3">Name & Designation</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider w-1/4">Date</th>
                                        <th class="p-4 font-bold text-xs uppercase tracking-wider">Comments</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-[#e8edf5]/60">
                                    @php
                                        $rowNo = 1;
                                    @endphp
                                    @foreach($previousRounds as $round)
                                        @foreach($round->panels as $panel)
                                        <tr class="bg-slate-100/50">
                                            <td class="p-3 text-center font-bold text-[#6b7db3]">{{ $rowNo++ }}</td>
                                            <td class="p-3">
                                                <input type="text" value="{{ $panel->name }}" readonly class="premium-input text-xs w-full py-2 px-3 bg-slate-100/80 cursor-not-allowed">
                                            </td>
                                            <td class="p-3">
                                                <input type="date" value="{{ $panel->date }}" readonly class="premium-input text-xs w-full py-2 px-3 bg-slate-100/80 cursor-not-allowed">
                                            </td>
                                            <td class="p-3">
                                                <input type="text" value="{{ $panel->comments }}" readonly class="premium-input text-xs w-full py-2 px-3 bg-slate-100/80 cursor-not-allowed">
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endforeach

                                    <tr class="bg-[#f0f4ff]/40">
                                        <td class="p-3 text-center font-bold text-[#4f6fff]">{{ $rowNo }}</td>
                                        <td class="p-3">
                                            <input type="text" name="panel[1][name]" value="{{ $pivot->category->person_name ?? '' }}" readonly class="premium-input text-xs w-full py-2 px-3 bg-white/80 cursor-not-allowed">
                                        </td>
                                        <td class="p-3">
                                            <input type="date" name="panel[1][date]" value="{{ date('Y-m-d') }}" readonly class="premium-input text-xs w-full py-2 px-3 bg-white/80 cursor-not-allowed">
                                        </td>
                                        <td class="p-3">
                                            <input type="text" name="panel[1][comments]" readonly class="premium-input text-xs w-full py-2 px-3 bg-white/80 cursor-not-allowed">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Submit Area -->
                    <div class="flex justify-end pt-6">
                        <button type="submit" class="submit-btn-glow text-white font-bold px-8 py-3.5 rounded-xl shadow-lg cursor-pointer active:scale-95 transition-all duration-200">
                            Submit Assessment
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Scripting for validations and score calculations -->
    <script>
    document.addEventListener("DOMContentLoaded", function() {

        const form = document.querySelector("form");

        const overallComments = document.querySelector('textarea[name="comments"]');
        const panelComment = document.querySelector('input[name="panel[1][comments]"]');

        if (overallComments && panelComment) {
            overallComments.addEventListener("input", function () {
                panelComment.value = this.value;
            });
        }

        const radios = document.querySelectorAll(".rating-radio");
        const totalMarks = document.getElementById("totalMarks");
        const progressBar = document.getElementById("formProgressBar");

        // Floating particles on header canvas
        const canvas = document.getElementById('headerParticles');
        if (canvas) {
            const ctx = canvas.getContext('2d');
            let width = canvas.width = canvas.offsetWidth;
            let height = canvas.height = canvas.offsetHeight;
            
            window.addEventListener('resize', () => {
                if (canvas) {
                    width = canvas.width = canvas.offsetWidth;
                    height = canvas.height = canvas.offsetHeight;
                }
            });

            const particles = [];
            for (let i = 0; i < 20; i++) {
                particles.push({
                    x: Math.random() * width,
                    y: Math.random() * height,
                    radius: Math.random() * 2 + 1,
                    vx: (Math.random() - 0.5) * 0.4,
                    vy: (Math.random() - 0.5) * 0.4,
                    alpha: Math.random() * 0.5 + 0.1
                });
            }

            function animate() {
                ctx.clearRect(0, 0, width, height);
                particles.forEach(p => {
                    p.x += p.vx;
                    p.y += p.vy;
                    if (p.x < 0 || p.x > width) p.vx *= -1;
                    if (p.y < 0 || p.y > height) p.vy *= -1;
                    
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
                    ctx.fillStyle = `rgba(79, 111, 255, ${p.alpha})`;
                    ctx.fill();
                });
                requestAnimationFrame(animate);
            }
            animate();
        }

        // Toggle mobile options highlight
        const optionLabels = document.querySelectorAll('.option');
        optionLabels.forEach(label => {
            const radio = label.querySelector('.rating-radio');
            if (radio) {
                // Set initial status if already checked
                if (radio.checked) {
                    label.classList.add('checked-active');
                }
                radio.addEventListener('change', () => {
                    const parentGrid = label.closest('.grid');
                    if (parentGrid) {
                        parentGrid.querySelectorAll('.option').forEach(sibling => {
                            sibling.classList.remove('checked-active');
                        });
                    }
                    if (radio.checked) {
                        label.classList.add('checked-active');
                    }
                });
            }
        });

        // Toggle final recommendations highlight
        const finalRecs = document.querySelectorAll('input[name="final_recommendation"]');
        finalRecs.forEach(radio => {
            if (radio.checked) {
                const label = radio.closest('.premium-option');
                if (label) {
                    if (radio.value === 'rejected') {
                        label.classList.add('checked-active-danger');
                    } else {
                        label.classList.add('checked-active');
                    }
                }
            }
            radio.addEventListener('change', () => {
                finalRecs.forEach(r => {
                    const label = r.closest('.premium-option');
                    if (label) {
                        label.classList.remove('checked-active');
                        label.classList.remove('checked-active-danger');
                    }
                });
                const activeLabel = radio.closest('.premium-option');
                if (activeLabel) {
                    if (radio.value === 'rejected') {
                        activeLabel.classList.add('checked-active-danger');
                    } else {
                        activeLabel.classList.add('checked-active');
                    }
                }
            });
        });

        function calculateProgress() {
            let fieldsToFill = 12; // 12 ratings
            let filledFields = 0;

            for (let i = 0; i < 12; i++) {
                const checked = document.querySelector(`input[name="rating[${i}]"]:checked`);
                if (checked) {
                    filledFields++;
                }
            }

            const percentage = (filledFields / fieldsToFill) * 100;
            if (progressBar) {
                progressBar.style.width = percentage + "%";
            }
        }

        function calculateTotal() {
            let total = 0;
            radios.forEach(radio => {
                if (radio.checked) {
                    total += parseInt(radio.value);
                }
            });
            totalMarks.innerText = total;
            calculateProgress();
        }

        // Trigger on radio change
        radios.forEach(radio => {
            radio.addEventListener("change", calculateTotal);
        });

        // Trigger initially
        calculateTotal();

        // Toast Helper
        function showToast(message) {
            const oldToast = document.querySelector(".custom-toast");
            if (oldToast) {
                oldToast.remove();
            }

            const toast = document.createElement("div");
            toast.className =
                "custom-toast fixed top-5 right-5 bg-rose-500 text-white px-6 py-3.5 rounded-xl shadow-lg z-50 font-bold border border-rose-400/20 backdrop-blur-md transition-all duration-300 animate-bounce";
            toast.innerText = message;

            document.body.appendChild(toast);

            setTimeout(() => {
                toast.classList.add('opacity-0');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // Form Validation
        form.addEventListener("submit", function(e) {
            // Ratings - checking all 12 attributes (Job Knowledge down to AI Skills)
            for (let i = 0; i < 12; i++) {
                const checked = document.querySelector(`input[name="rating[${i}]"]:checked`);
                if (!checked) {
                    e.preventDefault();
                    showToast(`Please select rating for Attribute ${i + 1}`);
                    return;
                }
            }

            // Comments
            const comments = document.querySelector('textarea[name="comments"]');
            if (!comments.value.trim()) {
                e.preventDefault();
                showToast("Comments field is required");
                comments.focus();
                return;
            }

            // Final Recommendation
            const finalRecommendation = document.querySelector('input[name="final_recommendation"]:checked');
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
                const input = document.querySelector(`[name="${field}"]`);
                if (input && !input.value.trim()) {
                    e.preventDefault();
                    showToast(salaryFields[field]);
                    input.focus();
                    return;
                }
            }

            const panelFields = {
                'panel[1][name]': 'Panel member name is required',
                'panel[1][date]': 'Panel date is required',
                'panel[1][comments]': 'Panel comments is required'
            };

            for (const field in panelFields) {
                const input = document.querySelector(`[name="${field}"]`);
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
</form>
