{{-- resources/views/jobs/role-summary.blade.php --}}

<div class="min-h-screen bg-[#f0f4ff] font-sans overflow-hidden">

    {{-- ══════════════════════════════════
         PAGE HEADER
    ══════════════════════════════════ --}}
    <div class="bg-white border-b border-[#e8edf5]
                sticky top-0 z-30
                backdrop-blur-xl bg-white/90">

        <div class="max-w-[1180px] mx-auto px-4 sm:px-6 lg:px-8
                    pt-5 sm:pt-6 pb-5 sm:pb-6">

            {{-- Back Button --}}
            <button onclick="window.history.back()" class="hidden md:inline-flex items-center gap-2
                       text-[13px] font-semibold text-[#4f6fff]
                       bg-[#f0f4ff] border border-[#c7d2fe]
                       rounded-xl px-4 py-2
                       hover:bg-[#e0e7ff]
                       hover:shadow-[0_8px_20px_rgba(79,111,255,0.12)]
                       active:scale-95
                       transition-all duration-300">

                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>

                Back
            </button>

        </div>

    </div>


    {{-- ══════════════════════════════════
         MAIN CONTENT
    ══════════════════════════════════ --}}
    <div class="max-w-[1180px] mx-auto px-4 sm:px-6 lg:px-8
                py-8 sm:py-10">

        {{-- HERO CARD --}}
        <div class="relative overflow-hidden
                    bg-white rounded-[24px]
                    border border-[#e8edf5]
                    shadow-[0_2px_12px_rgba(79,111,255,0.05)]
                    hover:shadow-[0_20px_50px_rgba(79,111,255,0.13)]
                    transition-all duration-300
                    mb-8">

            {{-- Top Gradient Line --}}
            <div class="h-[4px] w-full
                         bg-gradient-to-r
                         from-[#1a3faa]
                         via-[#4f6fff]
                         to-[#7c93ff]">
            </div>

            {{-- Background Glow --}}
            <div class="absolute top-[-80px] right-[-80px]
                        w-[280px] h-[280px]
                        bg-[#eef3ff]
                        rounded-full blur-3xl opacity-70">
            </div>

            <div class="relative z-10
                        p-6 sm:p-8 lg:p-10">

                <div class="flex flex-col lg:flex-row
                            lg:items-center
                            lg:justify-between
                            gap-8">

                    {{-- LEFT --}}
                    <div class="flex-1">

                        {{-- Small Label --}}
                        <p class="text-[11px]
                                   font-bold
                                   text-[#4f6fff]
                                   tracking-[0.14em]
                                   uppercase mb-3">

                            Career Opportunity

                        </p>

                        {{-- Job Title --}}
                        <h1 class="text-[30px] sm:text-[42px] lg:text-[48px]
                                   font-extrabold
                                   text-[#0f1f5c]
                                   leading-[1.1]
                                   tracking-tight">

                            {{ $job->job_title }}

                        </h1>

                        {{-- Description --}}
                        <p class="text-[15px] sm:text-[16px]
                                   text-[#5d6b98]
                                   leading-relaxed
                                   mt-5 max-w-[760px]">

                            Join Rathinam Group and become part of a dynamic,
                            innovation-driven organization focused on growth,
                            excellence, and meaningful impact.

                        </p>


                        {{-- META INFO --}}
                        <div class="flex flex-wrap items-center
                                    gap-5 sm:gap-8 mt-8">

                            {{-- LOCATION --}}
                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 rounded-2xl
                                            bg-[#f0f4ff]
                                            border border-[#dbe4ff]
                                            flex items-center justify-center
                                            shrink-0">

                                    <svg class="w-5 h-5 text-[#4f6fff]" fill="currentColor" viewBox="0 0 24 24">

                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7
                                                 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0
                                                 9.5A2.5 2.5 0 1 1 12 6a2.5 2.5 0 0 1 0 5.5z" />
                                    </svg>

                                </div>

                                <div>

                                    <p class="text-[10px]
                                               text-[#a0aec0]
                                               uppercase
                                               tracking-widest mb-1">

                                        Location

                                    </p>

                                    <p class="text-[14px]
                                               font-semibold
                                               text-[#374151]">

                                        {{ $job->location }}

                                    </p>

                                </div>

                            </div>


                            {{-- Divider --}}
                            <div class="hidden sm:block
                                        w-px h-10
                                        bg-[#e8edf5]">
                            </div>


                            {{-- EXPERIENCE --}}
                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 rounded-2xl
                                            bg-[#fff7e8]
                                            border border-[#ffe4a8]
                                            flex items-center justify-center
                                            shrink-0">

                                    <svg class="w-5 h-5 text-[#d18b00]" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">

                                        <path d="M12 8v4l3 3"></path>
                                        <circle cx="12" cy="12" r="9"></circle>

                                    </svg>

                                </div>

                                <div>

                                    <p class="text-[10px]
                                               text-[#a0aec0]
                                               uppercase
                                               tracking-widest mb-1">

                                        Experience

                                    </p>

                                    <p class="text-[14px]
                                               font-semibold
                                               text-[#374151]">

                                        {{ $job->experience }}

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- RIGHT CTA --}}
                    <div class="flex flex-col items-start lg:items-end gap-4">

                        <a href="{{ route('personal.data', $job->id) }}" class="group inline-flex items-center gap-2
                                   bg-gradient-to-r
                                   from-[#1a3faa]
                                   to-[#4f6fff]
                                   hover:shadow-[0_20px_40px_rgba(79,111,255,0.35)]
                                   hover:-translate-y-0.5
                                   active:scale-[0.98]
                                   text-white
                                   text-[15px]
                                   font-semibold
                                   px-7 py-3.5
                                   rounded-2xl
                                   transition-all duration-300">

                            Apply Now

                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H8M17 7V16" />
                            </svg>

                        </a>

                    </div>

                </div>

            </div>

        </div>


        {{-- CONTENT GRID --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-7">

            {{-- LEFT CONTENT --}}
            <div class="lg:col-span-2 space-y-7">

                {{-- ROLE SUMMARY --}}
                <div class="bg-white rounded-[24px]
                            border border-[#e8edf5]
                            shadow-[0_2px_12px_rgba(79,111,255,0.05)]
                            p-6 sm:p-7">

                    <div class="flex items-center justify-between mb-6">

                        <div>

                            <p class="text-[11px]
                                       font-bold
                                       text-[#4f6fff]
                                       tracking-[0.14em]
                                       uppercase mb-2">

                                Overview

                            </p>

                            <h2 class="text-[24px] sm:text-[28px]
                                       font-extrabold
                                       text-[#0f1f5c]">

                                Role Summary

                            </h2>

                        </div>

                    </div>

                    <p class="text-[15px] sm:text-[16px]
                               leading-[2]
                               text-[#475569]">

                        {{ $job->role_summary }}

                    </p>

                </div>


                {{-- RESPONSIBILITIES --}}
                <div class="bg-white rounded-[24px]
                            border border-[#e8edf5]
                            shadow-[0_2px_12px_rgba(79,111,255,0.05)]
                            p-6 sm:p-7">

                    <div class="mb-6">

                        <p class="text-[11px]
                                   font-bold
                                   text-[#4f6fff]
                                   tracking-[0.14em]
                                   uppercase mb-2">

                            Duties

                        </p>

                        <h2 class="text-[24px] sm:text-[28px]
                                   font-extrabold
                                   text-[#0f1f5c]">

                            Key Responsibilities

                        </h2>

                    </div>

                    <div class="grid sm:grid-cols-2 gap-4">

                        @foreach($responsibilities as $item)

                        <div class="group
                                    bg-[#f8faff]
                                    border border-[#edf2ff]
                                    rounded-2xl
                                    p-4
                                    hover:border-[#dbe4ff]
                                    hover:bg-[#f4f7ff]
                                    transition-all duration-300">

                            <div class="flex items-start gap-3">

                                {{-- ICON --}}
                                <div class="w-8 h-8 rounded-full
                                            bg-green-100
                                            flex items-center justify-center
                                            shrink-0 mt-0.5">

                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                        stroke-width="3" viewBox="0 0 24 24">

                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                    </svg>

                                </div>

                                <p class="text-[14px]
                                           text-[#475569]
                                           leading-relaxed">

                                    {{ $item }}

                                </p>

                            </div>

                        </div>

                        @endforeach

                    </div>

                </div>

            </div>


            {{-- RIGHT SIDEBAR --}}
            <div class="space-y-7">

                {{-- QUALIFICATIONS --}}
                <div class="bg-white rounded-[24px]
                            border border-[#e8edf5]
                            shadow-[0_2px_12px_rgba(79,111,255,0.05)]
                            p-6 sm:p-7">

                    <div class="mb-6">

                        <p class="text-[11px]
                                   font-bold
                                   text-[#4f6fff]
                                   tracking-[0.14em]
                                   uppercase mb-2">

                            Requirements

                        </p>

                        <h2 class="text-[22px]
                                   font-extrabold
                                   text-[#0f1f5c]">

                            Qualifications

                        </h2>

                    </div>

                    <ul class="space-y-4">

                        @foreach($qualifications as $qualification)

                        @if(trim($qualification) != '')

                        <li class="flex gap-3">

                            <div class="w-2.5 h-2.5
                                        rounded-full
                                        bg-[#4f6fff]
                                        mt-2 shrink-0">
                            </div>

                            <p class="text-[14px]
                                       text-[#475569]
                                       leading-relaxed">

                                {{ $qualification }}

                            </p>

                        </li>

                        @endif

                        @endforeach

                    </ul>

                </div>


                {{-- SKILLS --}}
                <div class="bg-white rounded-[24px]
                            border border-[#e8edf5]
                            shadow-[0_2px_12px_rgba(79,111,255,0.05)]
                            p-6 sm:p-7">

                    <div class="mb-6">

                        <p class="text-[11px]
                                   font-bold
                                   text-[#4f6fff]
                                   tracking-[0.14em]
                                   uppercase mb-2">

                            Expertise

                        </p>

                        <h2 class="text-[22px]
                                   font-extrabold
                                   text-[#0f1f5c]">

                            Skills

                        </h2>

                    </div>

                    <div class="flex flex-wrap gap-3">

                        @foreach($skills as $skill)

                        <div class="inline-flex items-center gap-2
                                    bg-[#f0f4ff]
                                    border border-[#dbe4ff]
                                    text-[#0f1f5c]
                                    px-4 py-2.5
                                    rounded-full
                                    hover:bg-[#e8efff]
                                    transition-colors duration-300">

                            {{-- Tick --}}
                            <div class="w-5 h-5 rounded-full
                                        bg-green-100
                                        flex items-center justify-center">

                                <svg class="w-3 h-3 text-green-600" fill="none" stroke="currentColor" stroke-width="3"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>

                            </div>

                            <span class="text-[13px] font-semibold">

                                {{ trim($skill) }}

                            </span>

                        </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- FOOTER --}}
    <div class="bg-[#0f1f5c] py-5 text-center">

        <p class="text-[13px] text-white/40">

            © {{ date('Y') }} Rathinam Group · All rights reserved

        </p>

    </div>

</div>


<style>
html {
    -webkit-overflow-scrolling: touch;
    -webkit-text-size-adjust: 100%;
    scroll-behavior: smooth;
}

* {
    -webkit-tap-highlight-color: transparent;
    box-sizing: border-box;
}

@keyframes rg-pulse {

    0%,
    100% {
        opacity: 1;
    }

    50% {
        opacity: .4;
    }
}

.animate-pulse {
    animation: rg-pulse 2s cubic-bezier(.4, 0, .6, 1) infinite;
}
</style>