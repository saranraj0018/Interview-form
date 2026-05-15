@php

$jobs = [
[
'title' => 'Associate - Investment',
'location' => 'Rathinam Techzone Campus, Eachanari, Coimbatore',
'date' => '18/04/2026 16:06:51',
'status' => 'unpublished',
'disabled' => true,
],
[
'title' => 'Associate-Investment',
'location' => 'Rathinam Techzone Campus, Eachanari, Coimbatore',
'date' => '03/12/2025 17:53:42',
'status' => 'published',
'disabled' => false,
],
[
'title' => 'Associate-Visual Communication',
'location' => 'Rathinam Techzone Campus, Eachanari, Coimbatore',
'date' => '13/02/2026 12:14:25',
'status' => 'published',
'disabled' => false,
],
[
'title' => 'Associated Vice President',
'location' => 'Rathinam Techzone Campus, Eachanari, Coimbatore',
'date' => '08/07/2025 20:39:07',
'status' => 'unpublished',
'disabled' => true,
],
];

$jobs = collect($jobs)->sortBy(function ($job) {

if ($job['status'] == 'published' && $job['disabled'] == false) {
return 1;
}

if ($job['status'] == 'unpublished' && $job['disabled'] == true) {
return 2;
}

return 3;

});

@endphp

<div class="max-w-[900px] mx-auto px-4 py-10">

    <!-- Heading -->
    <h2 class="text-[30px] sm:text-[36px]
        font-bold text-center text-[#0b2c5f] mb-12">

        Our Job Offers

    </h2>

    <!-- Job Grid -->
    <div class="grid grid-cols-1 md:grid-cols-1 gap-6">

        @foreach($jobs as $job)

        <a href="{{ $job['status'] == 'published' ? route('role-summary') : 'javascript:void(0)' }}"
            class="{{ $job['status'] != 'published' ? 'pointer-events-none cursor-not-allowed' : '' }}">

            <div class="group bg-white border border-gray-200 rounded-[28px]
        p-6 sm:p-7
        shadow-[0_4px_20px_rgba(0,0,0,0.04)]
        hover:shadow-[0_10px_35px_rgba(0,0,0,0.08)]
        hover:-translate-y-1
        transition-all duration-300
        relative overflow-hidden
        flex flex-col
        {{ $job['disabled'] ? 'opacity-60' : '' }}">

                <!-- Top Gradient -->
                <div class="absolute top-0 left-0 w-full h-1
            bg-gradient-to-r from-[#0b2c5f] to-[#d18b00]">
                </div>

                <!-- STATUS BADGE -->
                @if($job['status'] == 'published')

                <span class="absolute top-5 right-5
            bg-green-100 text-green-600
            text-[11px] font-semibold
            uppercase tracking-wide
            px-3 py-1 rounded-full">

                    {{ $job['status'] }}

                </span>

                @elseif($job['status'] == 'unpublished')

                <span class="absolute top-5 right-5
            bg-red-100 text-red-600
            text-[11px] font-semibold
            uppercase tracking-wide
            px-3 py-1 rounded-full">

                    {{ $job['status'] }}

                </span>

                @endif

                <!-- Content -->
                <div>

                    <!-- Job Title -->
                    <h3 class="text-[18px] sm:text-[22px]
                font-semibold text-[#0b2c5f]
                leading-snug mb-4 pr-20">

                        {{ $job['title'] }}

                    </h3>

                    <!-- Location -->
                    <div class="flex items-start gap-4 mb-4">

                        <div class="w-12 h-12 rounded-2xl
                    bg-[#eef4ff]
                    flex items-center justify-center
                    shrink-0">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#0b2c5f]" fill="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6a2.5 2.5 0 0 1 0 5.5z" />

                            </svg>

                        </div>

                        <div>

                            <p class="text-[13px]
                        font-medium text-gray-400 mb-1">

                                Location

                            </p>

                            <p class="text-[13px]
                        text-[#4b5563]
                        leading-relaxed">

                                {{ $job['location'] }}

                            </p>

                        </div>

                    </div>

                </div>

                <!-- Bottom -->
                <div class="flex items-center justify-between pt-5 border-t border-gray-100">

                    <!-- Date -->
                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl
                    bg-[#fff7e8]
                    flex items-center justify-center">

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#d18b00]" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">

                                <circle cx="12" cy="12" r="9"></circle>
                                <path d="M12 7v5l3 3"></path>

                            </svg>

                        </div>

                        <div>

                            <p class="text-[12px] text-gray-400">
                                Posted On
                            </p>

                            <p class="text-[14px]
                        font-medium text-[#6b7280]">

                                {{ $job['date'] }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </a>

        @endforeach

    </div>

</div>