<nav class="bg-white w-full border-b border-gray-200 px-5 py-3 shadow-sm rounded-xl flex justify-between items-center">
    <!-- Left: Menu Icon -->
   <button
    @click="toggleSidebar()"
    class="text-gray-700 hover:text-gray-900 cursor-pointer"
>
  <i class="fas text-xl"
       :class="sidebarOpen ? 'fa-angle-left' : 'fa-angle-right'">
    </i>
</button>

    <!-- Right: Logout Icon -->
    <form method="POST" action="{{ route('admin.user_logout') }}">
        @csrf
        <button type="submit" class="text-gray-700 hover:text-red-600 transition">
            <i class="fas fa-sign-out-alt text-xl"></i>LogOut
        </button>
    </form>
</nav>
