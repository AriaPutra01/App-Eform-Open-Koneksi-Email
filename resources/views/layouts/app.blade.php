<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>eform - bank bjb</title>

    {{-- icon --}}
    <link rel="icon" href="{{asset('build/image/logobjb.png')}}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if (session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

    {{-- ip --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ipSourceContainer = document.getElementById('ipSourceContainer');
            const ipDestinationContainer = document.getElementById('ipDestinationContainer');
            const portContainer = document.getElementById('portContainer');
            const addFieldsButton = document.getElementById('addFields');

            addFieldsButton.addEventListener('click', function() {
                // IP Source
                const newIpSourceInput = document.createElement('input');
                newIpSourceInput.type = 'text';
                newIpSourceInput.name = 'ipSource[]';
                newIpSourceInput.id = 'ipSource';
                newIpSourceInput.classList.add('block','w-full','mt-5','border-gray-300', 'dark:border-gray-700',
                    'dark:bg-gray-900', 'dark:text-gray-300', 'focus:border-sky-500',
                    'dark:focus:border-sky-600', 'focus:ring-sky-500', 'dark:focus:ring-sky-600',
                    'rounded-md', 'shadow-sm'
                );
                ipSourceContainer.appendChild(newIpSourceInput);

                // IP Destination
                const newIpDestinationInput = document.createElement('input');
                newIpDestinationInput.type = 'text';
                newIpDestinationInput.name = 'ipDestination[]';
                newIpDestinationInput.id = 'ipDestination';
                newIpDestinationInput.classList.add('block','w-full','mt-5','border-gray-300', 'dark:border-gray-700',
                    'dark:bg-gray-900', 'dark:text-gray-300', 'focus:border-sky-500',
                    'dark:focus:border-sky-600', 'focus:ring-sky-500', 'dark:focus:ring-sky-600',
                    'rounded-md', 'shadow-sm'
                );
                ipDestinationContainer.appendChild(newIpDestinationInput);

                // PORT
                const newPortInput = document.createElement('input');
                newPortInput.type = 'number';
                newPortInput.name = 'port[]';
                newPortInput.id = 'port';
                newPortInput.classList.add('block','w-full','mt-5','border-gray-300', 'dark:border-gray-700', 'dark:bg-gray-900',
                    'dark:text-gray-300', 'focus:border-sky-500', 'dark:focus:border-sky-600',
                    'focus:ring-sky-500', 'dark:focus:ring-sky-600', 'rounded-md', 'shadow-sm'
                );
                portContainer.appendChild(newPortInput);
            });
        });
    </script>

</body>

</html>
