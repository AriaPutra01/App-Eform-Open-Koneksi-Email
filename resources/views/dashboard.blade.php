<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>eform - bank bjb</title>
    {{-- icon --}}
    <link rel="icon" href="{{ asset('build/image/logobjb.png') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-image: url({{ asset('build/image/bjbBG.jpg') }})";
    class="relative h-screen font-sans antialiased">
    <div class="absolute inset-0 h-screen bg-gray-950 bg-opacity-50">
        <nav x-data="{ isOpen: false }" class="bg-blue-950 bg-opacity-70 mt-3 mx-5 rounded-md">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 mr-6">
                            <img class="w-8" src="{{ asset('build/image/logobjbputih.png') }}" alt="Bank Bjb">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-center space-x-4">
                                <a href="{{ route('dashboard') }}"
                                    class="rounded-md bg-white px-3 py-2 text-sm font-medium text-gray-800"
                                    aria-current="page">Dashboard</a>
                                <a href="{{ route('pemohon.formKoneksi.create') }}"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-800 hover:bg-opacity-40 hover:text-white">Form
                                    koneksi</a>
                                <a href="{{ route('permohonan.formEmail.create') }}"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-800 hover:bg-opacity-40 hover:text-white">Form
                                    e-mail</a>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" @click="isOpen = !isOpen"
                            class="relative inline-flex items-center justify-center rounded-md bg-blue-500 p-2 text-white hover:bg-blue-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!-- Menu open: "hidden", Menu closed: "block" -->
                            <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!-- Menu open: "block", Menu closed: "hidden" -->
                            <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div x-show=isOpen class="md:hidden transi" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="{{ route('dashboard') }}"
                        class="block rounded-md bg-white px-3 py-2 text-base font-medium text-gray-800"
                        aria-current="page">Dashboard</a>
                    <a href="{{ route('pemohon.formKoneksi.create') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-400 hover:text-white">Form
                        koneksi</a>
                    <a href="{{ route('permohonan.formEmail.create') }}"
                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-400 hover:text-white">Form
                        e-mail</a>
                </div>
            </div>
        </nav>
        <div class="relative isolate px-6 lg:px-8">
            <div class="mx-auto my-16 sm:my-24">
                <div class="md:w-1/2">
                    <h1 style="text-shadow: 1px 1px 2px lightgray"
                        class="font-extrabold  tracking-tight text-gray-200 text-3xl md:text-4xl lg:text-5xl">
                        Permohonan
                        Koneksi dan
                        Akun Perusahaan <p class="text-5xl text-blue-500">Bank bjb</p>
                    </h1>
                    <p style="text-shadow: 1px 1px 8px gray" class="mt-6 text-lg leading-8 text-gray-200">Halaman ini
                        memungkinkan Anda untuk
                        memulai
                        proses permohonan koneksi dan pembuatan akun perusahaan di Bank bjb
                    </p>
                </div>
                <div class="flex flex-wrap justify-center mt-10">
                    <div class="w-full md:w-1/2 p-6">
                        <a href="{{ route('pemohon.formKoneksi.create') }}"
                            class="block h-full bg-blue-950 bg-opacity-70 hover:bg-opacity-100 hover:-translate-y-3 hover:shadow-2xl transition-all rounded-md shadow-lg p-4">
                            <h5 class="text-lg font-bold mb-2 text-white">Form Koneksi</h5>
                            <p class="text-gray-300">Form permohonan untuk pengajuan pembukaan koneksi.
                            </p>
                        </a>
                    </div>
                    <div class="w-full md:w-1/2 p-6">
                        <a href="{{ route('permohonan.formEmail.create') }}"
                            class="block h-full bg-blue-950 bg-opacity-70 hover:bg-opacity-100 hover:-translate-y-3 hover:shadow-2xl transition-all rounded-md shadow-lg p-4">
                            <h5 class="text-lg font-bold mb-2 text-white">Form Email</h5>
                            <p class="text-gray-300">Form permohonan untuk pendaftaran, pengaktifan dan
                                penghapusan
                                e-mail perusahaan.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
</body>

</html>
