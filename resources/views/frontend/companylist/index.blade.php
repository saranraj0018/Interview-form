
<div class="min-h-screen bg-[#f8fafc]">

    <!-- CONTAINER -->
    <div class="max-w-[1240px] mx-auto px-4 sm:px-6 lg:px-8">

        <!-- HEADING -->
        <div class="text-center pt-10 sm:pt-14 lg:pt-16 pb-12">

            <h1 class="text-[30px] sm:text-4xl lg:text-5xl
                font-bold text-[#0b2c5f]
                leading-tight">

                Opportunities For You
                To Explore.

            </h1>

            <p class="text-[#64748b]
                text-[15px] sm:text-[17px]
                max-w-[700px] mx-auto
                mt-5 leading-relaxed">

                Discover exciting career opportunities across the Rathinam Group
                and take the next step in your professional journey.

            </p>

        </div>

        <!-- GRID -->
      <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5 lg:gap-7 pb-16">

    @foreach($companies as $company)

    <a href="{{ url('/offer-list/'.$company->id) }}"
        class="group relative overflow-hidden
        bg-white border border-gray-100
        rounded-[28px]
        p-6
        shadow-[0_4px_20px_rgba(0,0,0,0.04)]
        hover:shadow-[0_12px_40px_rgba(0,0,0,0.08)]
        hover:-translate-y-2
        transition-all duration-300">

        <!-- TOP GRADIENT -->
        <div class="absolute top-0 left-0
            w-full h-1
            bg-gradient-to-r
            from-[#0b2c5f]
            to-[#d18b00]">
        </div>

        <!-- TOP -->
        <div class="flex items-start justify-between mb-4">

            <!-- LOGO -->
            <div class="w-[72px] h-[72px]
                rounded-2xl
                bg-[#f8fafc]
                border border-gray-100
                flex items-center justify-center
                p-3">

                <img src="{{ asset($company->image) }}"
                    alt="{{ $company->name }}"
                    class="w-full h-full object-contain">

            </div>

            <!-- ARROW -->
            <div class="w-10 h-10 rounded-xl
                bg-[#f1f5f9]
                flex items-center justify-center
                group-hover:bg-[#0b2c5f]
                transition-all duration-300">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 text-[#0b2c5f]
                    group-hover:text-white
                    transition-all duration-300"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M7 17L17 7M17 7H8M17 7V16" />

                </svg>

            </div>

        </div>

        <!-- CONTENT -->
        <div>

            <h2 class="text-[20px] sm:text-[22px]
                font-semibold text-[#0b2c5f]
                leading-snug">

                {{ $company->name }}

            </h2>

            <p class="text-[#64748b]
                text-[15px]
                mt-3 leading-relaxed">

                Explore exciting openings and career opportunities
                available in this organization.

            </p>

        </div>

        <!-- FOOTER -->
        <div class="flex items-center justify-between pt-4 border-t border-gray-100">

            <div>

                <p class="text-[13px] text-gray-400">
                    Open Positions
                </p>

                <h3 class="text-[22px]
                    font-bold text-[#d18b00]">

                    {{ $company->job_posts_count }}

                </h3>

            </div>

            <span class="text-[#0b2c5f]
                text-[14px] font-medium
                group-hover:translate-x-1
                transition-all duration-300">

                View Jobs →

            </span>

        </div>

    </a>

    @endforeach

</div>

    </div>

</div>
