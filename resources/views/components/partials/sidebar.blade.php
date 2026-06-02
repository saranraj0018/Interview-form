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
@can('dashboard.view')
        <x-menu.item route="admin.dashboard" name="Dashboard" icon="fa-home" />
        @endcan
        @can('company.view')
        <x-menu.item route="admin.company.view" name="Company" icon="fa-building" />
        @endcan
        @can('job.view')
        <x-menu.item route="admin.job.view" name="Job Post" icon="fa-briefcase" />
        @endcan
        @can('candidate.view')
        <x-menu.item route="admin.candidates.index" name="Candidates" icon="fa-users" />
        @endcan
        @can('email.view')
        <x-menu.item route="view.category" name="Email" icon="fa-list" />
        @endcan
         @can('interview.view')
        <x-menu.item route="view.interview" name="Interviews" icon="fa-briefcase" />
        @endcan
         @can('hr.view')
        <x-menu.item route="admin.hr.view" name="HR Reviews" icon="fa-users" />
        @endcan
         @can('employee.view')
         <x-menu.item route="admin.employee.index" name="Employees" icon="fa-users" />
            @endcan
            @can('role.view')
          <x-menu.item route="roles_list" name="Roles" icon="fa-image" />
            @endcan
            @can('permission.view')
           <x-menu.item route="roles_and_permission" name="Role & Permissions" icon="fa-image" />
            @endcan

    </ul>
</aside>
