    <div class="min-h-screen bg-[#f0f4ff] font-sans">

        <div class="bg-white border-b border-[#e8edf5]">
            <div class="max-w-[720px] mx-auto px-4 sm:px-6
                        pt-2 sm:pt-6 pb-2 sm:pb-4 text-center">

                <div class="inline-flex items-center gap-2
                            bg-[#eff2ff] text-[#4f6fff]
                            text-[11px] font-semibold tracking-widest uppercase
                            border border-[#c7d2fe] rounded-full
                            px-4 py-1.5 mb-6">
                    <span class="w-2 h-2 rounded-full bg-[#4f6fff]
                                ring-2 ring-[#c7d2fe] ring-offset-1 ring-offset-[#eff2ff]
                                animate-pulse">
                    </span>
                    Now Hiring · {{ date('Y') }}
                </div>

                <h1 class="text-[32px] sm:text-[44px] lg:text-[52px]
                            font-extrabold text-[#0f1f5c]
                            leading-[1.15] tracking-tight mb-4">
                    Find Your
                    <span class="text-transparent bg-clip-text
                                bg-gradient-to-r from-[#1a3faa] to-[#4f6fff]">
                        Dream Career
                    </span>
                    <br class="hidden sm:block">
                    at Rathinam Group
                </h1>

                <p class="text-[15px] sm:text-[17px] text-[#5d6b98]
                        leading-relaxed max-w-[540px] mx-auto mb-8">
                    Join one of South India's most trusted education &amp; enterprise groups.
                    Explore openings across 12+ institutions and find where you belong.
                </p>

            </div>
        </div>

        @php
        $totalJobs = $companies->sum('job_posts_count');
        $companyCount = $companies->count();
        @endphp

        <div class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8
                    pt-10 sm:pt-12 pb-16 sm:pb-20">

            <div class="flex flex-wrap items-end justify-between gap-3 mb-7">
                <div>
                    <p class="text-[11px] font-bold text-[#4f6fff]
                            tracking-[0.14em] uppercase mb-1.5">
                        Explore Opportunities
                    </p>
                    <h2 class="text-[20px] sm:text-[26px] font-extrabold
                                text-[#0f1f5c] leading-snug">
                        Our Institutions &amp; Companies
                    </h2>
                </div>
                <p class="text-[13px] text-[#5d6b98]">
                    {{ $companyCount }} organisations · {{ $totalJobs }} openings
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">

                @forelse($companies as $company)

                <a href="{{ url('/offer-list/' . $company->id) }}" class="group flex flex-col bg-white
                        border border-[#e8edf5] rounded-[18px]
                        overflow-hidden
                        shadow-[0_2px_12px_rgba(79,111,255,0.05)]
                        hover:shadow-[0_20px_50px_rgba(79,111,255,0.13)]
                        hover:border-[#c7d2fe]
                        hover:-translate-y-1
                        active:scale-[0.98]
                        transition-all duration-300">

                    <div class="h-[4px] w-full
                                bg-gradient-to-r from-[#1a3faa] via-[#4f6fff] to-[#7c93ff]
                                origin-left scale-x-0 group-hover:scale-x-100
                                transition-transform duration-300 ease-out">
                    </div>

                    <div class="flex flex-col flex-1 p-5 sm:p-6">

                        <div class="flex items-start justify-between mb-5">

                            <div class="w-[52px] h-[52px] rounded-2xl
                                        bg-[#f0f4ff] border border-[#e0e7ff]
                                        flex items-center justify-center p-2.5 shrink-0">
                                <img src="{{ asset($company->image) }}" alt="{{ $company->name }}"
                                    class="w-full h-full object-contain">
                            </div>

                            <div class="w-[34px] h-[34px] rounded-xl shrink-0
                                        bg-[#f0f4ff] text-[#4f6fff]
                                        group-hover:bg-[#4f6fff] group-hover:text-white
                                        flex items-center justify-center
                                        transition-colors duration-300">
                                <svg class="w-[14px] h-[14px]" fill="none" stroke="currentColor" stroke-width="2.5"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7 17L17 7M17 7H8M17 7V16" />
                                </svg>
                            </div>

                        </div>

                        <h3 class="text-[15px] sm:text-[16px] font-bold
                                    text-[#0f1f5c] leading-snug mb-2">
                            {{ $company->name }}
                        </h3>

                        <p class="text-[12.5px] text-[#6b7db3] leading-relaxed flex-1 mb-5">
                            Explore openings and career opportunities
                            available in this organization.
                        </p>

                        <div class="flex items-center justify-between
                                    pt-4 border-t border-dashed border-[#e8edf5]">

                            <div>
                                <p class="text-[10px] text-[#a0aec0] uppercase
                                        tracking-widest mb-1">
                                    Open Positions
                                </p>
                                <p class="text-[26px] font-extrabold text-[#4f6fff] leading-none">
                                    {{ $company->job_posts_count }}
                                </p>
                            </div>

                            <span class="inline-flex items-center gap-1.5
                                        text-[12px] font-semibold text-[#4f6fff]
                                        bg-[#f0f4ff] border border-[#c7d2fe]
                                        rounded-full px-4 py-2
                                        group-hover:bg-[#4f6fff] group-hover:text-white
                                        group-hover:border-[#4f6fff]
                                        transition-colors duration-300 whitespace-nowrap">
                                View Jobs
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2.5"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </span>

                        </div>

                    </div>

                </a>

                @empty

                <div class="col-span-full text-center py-20">
                    <div class="w-16 h-16 bg-[#f0f4ff] rounded-2xl
                                flex items-center justify-center mx-auto mb-4">
                        <svg class="w-7 h-7 text-[#4f6fff]" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6
                                    a2 2 0 01-2-2v-6m16 0H4" />
                        </svg>
                    </div>
                    <p class="text-[16px] font-bold text-[#0f1f5c] mb-1">No companies found</p>
                    <p class="text-[13px] text-[#6b7db3]">Check back soon for new opportunities.</p>
                </div>

                @endforelse

            </div>

        </div>
        <div class="bg-[#0f1f5c] py-5 text-center">
            <p class="text-[13px] text-white/40">
                © {{ date('Y') }} Rathinam Group · All rights reserved
            </p>
        </div>

    </div>

    {{-- Tailwind does not JIT-compile dynamic group-hover with scale — add these helpers --}}
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

/* iOS smooth scroll */
html {
    -webkit-overflow-scrolling: touch;
    -webkit-text-size-adjust: 100%;
}

* {
    -webkit-tap-highlight-color: transparent;
}
    </style>