@php
$responsibilities = [
'Plan and implement admission marketing strategies.',
'Generate and convert student leads.',
'Coordinate admission follow-ups.',
'Manage digital campaigns and promotions.',
'Organize seminars, fairs, and outreach events.',
'Monitor campaign performance and ROI.',
];
@endphp

@php
$skills = [
'Communication',
'CRM',
'Leadership',
'Marketing',
'Reporting',
'React Js',
];
@endphp

<div class="min-h-screen bg-gradient-to-b from-[#f8fbff] to-[#eef3f8] py-12">

    <div class="max-w-[1180px] mx-auto px-4">

        <!-- HERO CARD -->
        <div class="relative overflow-hidden
            bg-white rounded-[32px]
            border border-gray-100
            shadow-[0_10px_40px_rgba(0,0,0,0.05)]
            p-6 sm:p-8 lg:p-10 mb-8">

            <!-- BACKGROUND -->
            <div class="absolute top-0 right-0
                w-[300px] h-[300px]
                bg-[#eef4ff]
                rounded-full blur-3xl opacity-70">
            </div>

            <div class="relative z-10
                flex flex-col lg:flex-row
                lg:items-center lg:justify-between
                gap-8">

                <!-- LEFT -->
                <div class="flex-1">

                    <!-- TITLE -->
                    <h1 class="text-[32px] sm:text-[42px]
                        font-bold text-[#0b2c5f]
                        leading-tight mt-5">

                        Marketing Manager <br>
                        Admissions

                    </h1>

                    <!-- INFO -->
                    <div class="flex flex-wrap items-center
                        gap-5 mt-6">

                        <!-- LOCATION -->
                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 rounded-2xl
                                bg-[#eef4ff]
                                flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#0b2c5f]"
                                    fill="currentColor" viewBox="0 0 24 24">

                                    <path
                                        d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6a2.5 2.5 0 0 1 0 5.5z" />

                                </svg>

                            </div>

                            <div>

                                <p class="text-[12px] text-gray-400">
                                    Location
                                </p>

                                <p class="text-[15px]
                                    font-medium text-[#334155]">

                                    Coimbatore, India

                                </p>

                            </div>

                        </div>

                        <!-- EXPERIENCE -->
                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 rounded-2xl
                                bg-[#fff7e8]
                                flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#d18b00]" fill="none"
                                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">

                                    <path d="M12 8v4l3 3"></path>
                                    <circle cx="12" cy="12" r="9"></circle>

                                </svg>

                            </div>

                            <div>

                                <p class="text-[12px] text-gray-400">
                                    Experience
                                </p>

                                <p class="text-[15px]
                                    font-medium text-[#334155]">

                                    3–6 Years

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- RIGHT -->
                <div class="flex flex-col items-start lg:items-end gap-4">

                    <!-- BUTTON -->
                    <button class="bg-gradient-to-r
                        from-[#0b2c5f]
                        to-[#123d7d]
                        hover:scale-[1.03]
                        text-white
                        text-[15px]
                        font-semibold
                        px-7 py-3.5
                        rounded-2xl
                        shadow-lg
                        transition-all duration-300">

                        Apply Now

                    </button>

                </div>

            </div>

        </div>

        <!-- DETAILS -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-7">

            <!-- LEFT CONTENT -->
            <div class="lg:col-span-2 space-y-7">

                <!-- ROLE SUMMARY -->
                <div class="bg-white rounded-[28px]
                    border border-gray-100
                    shadow-sm p-7">

                    <div class="flex items-center gap-4 mb-6">

                        <h2 class="text-[26px]
                            font-bold text-[#0b2c5f]">

                            Role Summary

                        </h2>

                    </div>

                    <p class="text-[16px]
                        leading-[32px]
                        text-[#475569]">

                        The Admission Marketing Manager is responsible for
                        planning, executing, and managing marketing strategies
                        to increase student admissions. The role focuses on
                        lead generation, brand visibility, and conversion,
                        working closely with admissions, digital marketing,
                        and outreach teams.

                    </p>

                </div>

                <!-- RESPONSIBILITIES -->
                <div class="bg-white rounded-[28px]
                    border border-gray-100
                    shadow-sm p-7">

                    <h2 class="text-[26px]
                        font-bold text-[#0b2c5f]
                        mb-6">

                        Key Responsibilities

                    </h2>

                    <div class="grid sm:grid-cols-2 gap-4">

                        @foreach($responsibilities as $item)
                        <div class="bg-[#f8fafc]
            rounded-2xl
            flex items-start gap-3">

                            <!-- ICON -->
                            <div class="w-8 h-8 rounded-full
                bg-green-100
                flex items-center justify-center
                shrink-0">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-green-600" fill="none"
                                    stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />

                                </svg>

                            </div>

                            <p class="text-[15px]
                text-[#475569]
                leading-relaxed">

                                {{ $item }}

                            </p>

                        </div>
                        @endforeach

                    </div>

                </div>

            </div>

            <!-- RIGHT SIDEBAR -->
            <div class="space-y-7">

                <!-- QUALIFICATION -->
                <div class="bg-white rounded-[28px]
                    border border-gray-100
                    shadow-sm p-7">

                    <h2 class="text-[22px]
                        font-bold text-[#0b2c5f]
                        mb-5">

                        Qualifications

                    </h2>

                    <ul class="space-y-4">

                        <li class="flex gap-3">

                            <div class="w-2.5 h-2.5
                                rounded-full bg-[#0b2c5f]
                                mt-2"></div>

                            <p class="text-[15px]
                                text-[#475569]
                                leading-relaxed">

                                Bachelor’s degree in Marketing or Business Administration.

                            </p>

                        </li>

                        <li class="flex gap-3">

                            <div class="w-2.5 h-2.5
                                rounded-full bg-[#0b2c5f]
                                mt-2"></div>

                            <p class="text-[15px]
                                text-[#475569]
                                leading-relaxed">

                                MBA preferred.

                            </p>

                        </li>

                        <li class="flex gap-3">

                            <div class="w-2.5 h-2.5
                                rounded-full bg-[#0b2c5f]
                                mt-2"></div>

                            <p class="text-[15px]
                                text-[#475569]
                                leading-relaxed">

                                Admission marketing experience is an advantage.

                            </p>

                        </li>

                    </ul>

                </div>

                <!-- SKILLS -->
                <div class="bg-white rounded-[28px]
    border border-gray-100
    shadow-sm p-7">

                    <h2 class="text-[22px]
        font-bold text-[#0b2c5f]
        mb-5">

                        Skills

                    </h2>

                    <div class="flex flex-wrap gap-4">

                        @foreach($skills as $skill)

                        <div class="flex items-center gap-2
            bg-[#eef4ff]
            text-[#0b2c5f]
            px-4 py-2
            rounded-full">

                            <!-- Tick Icon -->
                            <div class="w-5 h-5 rounded-full
                bg-green-100
                flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-green-600" fill="none"
                                    stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />

                                </svg>

                            </div>

                            <span class="text-[14px] font-medium">
                                {{ $skill }}
                            </span>

                        </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>