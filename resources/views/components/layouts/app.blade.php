<!DOCTYPE html>
<html lang="en">

<head>
    <x-partials.header />
    <style>[x-cloak]{display:none !important;}</style>
</head>

<body class="hold-transition sidebar-mini bg-gray-100">
   <div class="wrapper"
     x-data="{
        sidebarOpen: localStorage.getItem('sidebarOpen') === 'false' ? false : true,
        toggleSidebar() {
            this.sidebarOpen = !this.sidebarOpen;
            localStorage.setItem('sidebarOpen', this.sidebarOpen);
        }
     }">
        <div class="flex">

            <aside  x-cloak class="fixed top-0 left-0 h-full w-52 shadow-lg z-40
           transform transition-transform duration-300"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
                <x-partials.sidebar />
            </aside>

           <div
    class="flex flex-col flex-1 transition-all duration-300"
    :class="sidebarOpen ? 'ml-52' : 'ml-0'"
>
                <div class="flex justify-start items-start">
                    <div class="flex flex-col w-full p-2">
                        <x-partials.navbar />

                        <div class="content-wrapper p-6">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Toast Container -->
        <div id="toast-container" class="fixed top-5 right-5 space-y-2 z-50"></div>
    </div>


    <x-partials.scripts />
</body>

</html>
