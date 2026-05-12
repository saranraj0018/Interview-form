<!DOCTYPE html>
<html lang="en">

<head>
    <x-partials.header />
    <title></title>
</head>

<body class="min-h-screen bg-white flex flex-col">

    <div class="flex items-center justify-center py-10 flex-1">
        {{ $slot }}
    </div>

    <footer class=" w-full text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} HR. All rights reserved.
    </footer>
    <x-partials.scripts />
</body>

</html>
