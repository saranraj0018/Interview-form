<x-layouts.app>

<div class="max-w-7xl mx-auto p-6">

    {{-- Toast Messages --}}
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                showToast("{{ session('success') }}", "success");
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                showToast("{{ session('error') }}", "error");
            });
        </script>
    @endif

    {{-- Header --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">

        <div class="flex items-center justify-between flex-wrap gap-4">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Role Permissions
                </h1>

                <p class="text-gray-500 mt-1">
                    Manage module access and permissions for each role
                </p>
            </div>

            <div class="bg-pink-50 text-pink-600 px-4 py-2 rounded-xl font-medium">
                Permission Management
            </div>

        </div>

    </div>

    {{-- Role Selection --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-6">

        <label class="block text-sm font-semibold text-gray-700 mb-2">
            Select Role
        </label>

        <form method="GET">

            <select
                name="role_id"
                onchange="this.form.submit()"
                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-pink-500 focus:border-pink-500">

                <option value="">
                    Choose Role
                </option>

                @foreach($roles as $r)

                    <option value="{{ $r->id }}"
                        {{ isset($role) && $role->id == $r->id ? 'selected' : '' }}>
                        {{ $r->name }}
                    </option>

                @endforeach

            </select>

        </form>

    </div>

    <div class="flex justify-end mb-4">

    <label class="flex items-center gap-2 cursor-pointer">

        <input
            type="checkbox"
            id="selectAllPermissions"
            class="h-5 w-5 text-pink-600 rounded border-gray-300">

        <span class="font-medium text-gray-700">
            Select All Permissions
        </span>

    </label>

</div>

    {{-- Permissions Form --}}
    <form method="POST" action="{{ route('roles_and_permission_save') }}">

        @csrf

        <input type="hidden"
            name="role_id"
            value="{{ $role->id ?? '' }}">

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            @foreach($abilities->groupBy('module') as $module => $items)

                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition-all duration-200">

                    {{-- Card Header --}}
                    <div class="bg-gradient-to-r from-pink-500 to-pink-600 text-white px-5 py-4 rounded-t-2xl">

                        <h3 class="font-semibold text-lg">

                            {{ ucfirst(str_replace('_',' ', $module)) }}

                        </h3>

                    </div>

                    {{-- Permissions --}}
                    <div class="p-5 space-y-4">

                        @foreach($items as $ability)

                            <label
                                class="flex items-center justify-between border rounded-xl px-4 py-3 cursor-pointer hover:bg-gray-50 transition">

                                <span class="font-medium text-gray-700">

                                    {{ ucfirst($ability->action) }}

                                </span>

                                <input
                                    type="checkbox"
                                    name="abilities[]"
                                    value="{{ $ability->id }}"
                                    class="permission-checkbox h-5 w-5 text-pink-600 rounded border-gray-300 focus:ring-pink-500"
                                    {{ in_array($ability->id, $roleAbilities) ? 'checked' : '' }}>

                            </label>

                        @endforeach

                    </div>

                </div>

            @endforeach

        </div>

        {{-- Save Button --}}
        <div class="sticky bottom-4 mt-8">

            <div class="flex justify-center">

                <button
                    type="submit"
                    class="bg-[#ea2498] hover:bg-[#d81b88] text-white px-10 py-3 rounded-xl shadow-lg font-semibold transition duration-200">

                    Save Permissions

                </button>

            </div>

        </div>

    </form>

</div>

</x-layouts.app>

<script>
    document.addEventListener('DOMContentLoaded', function () {

    const selectAll =
        document.getElementById('selectAllPermissions');

    const permissions =
        document.querySelectorAll('.permission-checkbox');

    selectAll.addEventListener('change', function () {

        permissions.forEach(permission => {

            permission.checked = this.checked;

        });

    });

    function updateSelectAll() {

        const checked =
            document.querySelectorAll('.permission-checkbox:checked');

        selectAll.checked =
            permissions.length === checked.length;

    }

    permissions.forEach(permission => {

        permission.addEventListener('change', updateSelectAll);

    });

    updateSelectAll();

});

function showToast(message, type = 'success') {

    const toast = document.createElement('div');

    toast.className =
        `fixed top-5 right-5 z-50 px-6 py-3 rounded-xl text-white shadow-lg
        ${type === 'success' ? 'bg-green-500' : 'bg-red-500'}`;

    toast.innerText = message;

    document.body.appendChild(toast);

    setTimeout(() => {
        toast.remove();
    }, 3000);
}
</script>