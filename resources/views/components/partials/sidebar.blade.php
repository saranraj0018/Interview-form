<aside x-show="sidebarOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    class="fixed top-0 left-0 h-full w-52 overflow-y-auto"
    style="background:#ea2498;">

    <x-app-logo />

    <ul class="flex flex-col gap-3 mt-4 text-sm font-medium text-[#e4c094]">

        <x-menu.item route="admin.dashboard" name="Dashboard" icon="fa-home" />
        <x-menu.item route="view.category" name="Email" icon="fa-list" />
        <x-menu.item route="view.interview" name="Interviews" icon="fa-briefcase" />
        <x-menu.item route="admin.hr.view" name="HR Reviews" icon="fa-users" />

    </ul>
</aside>
