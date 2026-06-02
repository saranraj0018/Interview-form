<div class="min-h-screen bg-[#f0f4ff] font-sans overflow-hidden">

    {{-- ══════════════════════════════════
         PAGE HEADER
    ══════════════════════════════════ --}}
    <div class="bg-white border-b border-[#e8edf5] sticky top-0 z-30 backdrop-blur-xl bg-white/90">
        <div class="max-w-[1000px] mx-auto px-4 sm:px-6 lg:px-8
                    pt-6 sm:pt-8 pb-6 sm:pb-8">

            {{-- Back button --}}
            <button onclick="window.history.back()" class="hidden md:inline-flex items-center gap-2
                       text-[13px] font-semibold text-[#4f6fff]
                       bg-[#f0f4ff] border border-[#c7d2fe]
                       rounded-xl px-4 py-2 mb-7
                       hover:bg-[#e0e7ff]
                       hover:shadow-[0_8px_20px_rgba(79,111,255,0.15)]
                       active:scale-95
                       transition-all duration-300">

                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>

                Back
            </button>

            {{-- Header row --}}
            <div class="flex flex-col lg:flex-row lg:items-end
                         lg:justify-between gap-5">

                <div>

                    <p class="text-[11px] font-bold text-[#4f6fff]
                               tracking-[0.14em] uppercase mb-2">
                        Rathinam Group
                    </p>

                    <h1 class="text-[30px] sm:text-[40px] lg:text-[46px]
                                font-extrabold text-[#0f1f5c]
                                leading-[1.1] tracking-tight mb-3">
                        Explore Our
                        <span class="text-transparent bg-clip-text
                                     bg-gradient-to-r from-[#1a3faa] to-[#4f6fff]">
                            Job Openings
                        </span>
                    </h1>

                    <p class="text-[14px] sm:text-[16px] text-[#5d6b98]
                               leading-relaxed max-w-[620px]">
                        Find exciting career opportunities across our institutions,
                        companies, and enterprise divisions.
                    </p>

                </div>

                {{-- Job count badge --}}
                <div class="inline-flex items-center gap-2
                             bg-gradient-to-r from-[#1a3faa] to-[#4f6fff]
                             text-white text-[13px] font-semibold
                             rounded-2xl px-5 py-3 self-start lg:self-auto
                             shadow-[0_8px_24px_rgba(79,111,255,0.25)]">

                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183
                             0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4
                             a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0
                             002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10
                             a2 2 0 002 2z" />
                    </svg>

                    {{ $jobs->count() }} {{ Str::plural('Position', $jobs->count()) }}
                </div>

            </div>

        </div>
    </div>


    {{-- ══════════════════════════════════
         JOB LISTINGS
    ══════════════════════════════════ --}}
    <div class="max-w-[1000px] mx-auto px-4 sm:px-6 lg:px-8
                py-8 sm:py-10 space-y-5">

        @forelse($jobs as $job)

        @php
        $active = $job->status == 1;
        @endphp

        <a href="{{ $active ? route('role-summary', $job->id) : 'javascript:void(0)' }}"
            class="{{ !$active ? 'pointer-events-none' : 'group' }} block">

            <div class="relative overflow-hidden
                         rounded-[22px]
                         border border-[#e8edf5]
                         bg-white
                         shadow-[0_2px_12px_rgba(79,111,255,0.05)]
                         {{ $active
                             ? 'hover:shadow-[0_20px_50px_rgba(79,111,255,0.13)]
                                hover:border-[#c7d2fe]
                                hover:-translate-y-1
                                transition-all duration-300'
                             : 'opacity-60' }}">

                {{-- Top hover line --}}
                <div class="h-[4px] w-full
                             bg-gradient-to-r from-[#1a3faa] via-[#4f6fff] to-[#7c93ff]
                             origin-left scale-x-0
                             group-hover:scale-x-100
                             transition-transform duration-300 ease-out">
                </div>

                <div class="flex flex-col lg:flex-row lg:items-center">

                    {{-- Left accent --}}
                    <div class="hidden lg:block w-[5px] self-stretch shrink-0
                                 {{ $active
                                     ? 'bg-gradient-to-b from-[#1a3faa] to-[#4f6fff]'
                                     : 'bg-gray-300' }}">
                    </div>


                    {{-- Main Content --}}
                    <div class="flex-1 p-5 sm:p-6 lg:p-7">

                        {{-- Top Row --}}
                        <div class="flex flex-col sm:flex-row sm:items-start
                                     sm:justify-between gap-4 mb-5">

                            <div>
                                <h2 class="text-[18px] sm:text-[21px]
                                           font-bold text-[#0f1f5c]
                                           leading-snug mb-2">
                                    {{ $job->job_title }}
                                </h2>

                                <p class="text-[13px] text-[#6b7db3]
                                           leading-relaxed max-w-[680px]">
                                    Explore responsibilities, requirements,
                                    and growth opportunities for this role.
                                </p>
                            </div>


                            {{-- Status Badge --}}
                            @if($active)
                            <span class="inline-flex items-center gap-1.5 shrink-0
                                          text-[11px] font-semibold text-emerald-600
                                          bg-emerald-50 border border-emerald-200
                                          rounded-full px-3 py-1 uppercase tracking-wide">

                                <span class="w-1.5 h-1.5 rounded-full
                                              bg-emerald-500 animate-pulse shrink-0">
                                </span>

                                Published
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1.5 shrink-0
                                          text-[11px] font-semibold text-red-500
                                          bg-red-50 border border-red-200
                                          rounded-full px-3 py-1 uppercase tracking-wide">

                                <span class="w-1.5 h-1.5 rounded-full
                                              bg-red-400 shrink-0">
                                </span>

                                Unpublished
                            </span>
                            @endif

                        </div>


                        {{-- Meta Row --}}
                        <div class="flex flex-wrap items-center gap-5 lg:gap-8">

                            {{-- Location --}}
                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-2xl
                                             bg-[#f0f4ff] border border-[#e0e7ff]
                                             flex items-center justify-center shrink-0">

                                    <svg class="w-5 h-5 text-[#4f6fff]" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7
                                                 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0
                                                 9.5A2.5 2.5 0 1 1 12 6a2.5 2.5 0 0 1 0 5.5z" />
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-[10px] text-[#a0aec0]
                                               uppercase tracking-widest mb-1">
                                        Location
                                    </p>

                                    <p class="text-[13px] font-semibold text-[#374151]">
                                        {{ $job->location }}
                                    </p>
                                </div>

                            </div>


                            {{-- Divider --}}
                            <div class="hidden md:block w-px h-10 bg-[#e8edf5]"></div>


                            {{-- Posted Date --}}
                            <div class="flex items-center gap-3">

                                <div class="w-10 h-10 rounded-2xl
                                             bg-[#fff7e8] border border-[#ffe4a8]
                                             flex items-center justify-center shrink-0">

                                    <svg class="w-5 h-5 text-[#d18b00]" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="9" />
                                        <path d="M12 7v5l3 3" />
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-[10px] text-[#a0aec0]
                                               uppercase tracking-widest mb-1">
                                        Posted On
                                    </p>

                                    <p class="text-[13px] font-semibold text-[#374151]">
                                        {{ $job->created_at->format('d M Y, h:i A') }}
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Desktop CTA --}}
                    @if($active)
                    <div class="hidden lg:flex items-center pr-7 shrink-0">

                        <div class="w-12 h-12 rounded-2xl
                                     bg-[#f0f4ff] text-[#4f6fff]
                                     group-hover:bg-[#4f6fff]
                                     group-hover:text-white
                                     flex items-center justify-center
                                     transition-all duration-300">

                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H8M17 7V16" />
                            </svg>
                        </div>

                    </div>
                    @endif

                </div>


                {{-- Mobile CTA --}}
                @if($active)
                <div class="lg:hidden flex items-center justify-between
                             px-5 py-4 bg-[#f8faff]
                             border-t border-[#e8edf5]">

                    <span class="text-[13px] font-semibold text-[#4f6fff]">
                        View Job Details
                    </span>

                    <svg class="w-4 h-4 text-[#4f6fff]" fill="none" stroke="currentColor" stroke-width="2.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </div>
                @endif

            </div>

        </a>

        @empty

        {{-- Empty State --}}
        <div class="text-center py-24">

            <div class="w-20 h-20 bg-[#f0f4ff]
                         rounded-3xl flex items-center
                         justify-center mx-auto mb-5">

                <svg class="w-9 h-9 text-[#4f6fff]" fill="none" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183
                         0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4
                         a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0
                         002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10
                         a2 2 0 002 2z" />
                </svg>
            </div>

            <h3 class="text-[20px] font-bold text-[#0f1f5c] mb-2">
                No Job Offers Available
            </h3>

            <p class="text-[14px] text-[#6b7db3]
                       max-w-sm mx-auto leading-relaxed">
                There are currently no openings available.
                Please check again later for upcoming opportunities.
            </p>

            <button onclick="window.history.back()" class="mt-7 inline-flex items-center gap-2
                       text-[13px] font-semibold text-white
                       bg-gradient-to-r from-[#1a3faa] to-[#4f6fff]
                       rounded-xl px-5 py-3
                       shadow-[0_8px_20px_rgba(79,111,255,0.20)]
                       hover:opacity-90 hover:-translate-y-0.5
                       transition-all duration-300">

                ← Go Back
            </button>

        </div>

        @endforelse

    </div>


    {{-- Footer --}}
    <div class="bg-[#0f1f5c] py-5 text-center mt-10">
        <p class="text-[13px] text-white/40">
            © {{ date('Y') }} Rathinam Group · All rights reserved
        </p>
    </div>

</div>


<style>
.origin-left {
    transform-origin: left center;
}

.scale-x-0 {
    transform: scaleX(0);
}

.group:hover .group-hover\:scale-x-100 {
    transform: scaleX(1);
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

html {
    -webkit-overflow-scrolling: touch;
    -webkit-text-size-adjust: 100%;
    scroll-behavior: smooth;
}

* {
    -webkit-tap-highlight-color: transparent;
    box-sizing: border-box;
}
</style>