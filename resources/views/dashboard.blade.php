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
    {{-- css --}}
    <style>
        @media (min-width: 768px) {
            .hero {
                background-image: linear-gradient(to right, rgb(0, 0, 50), rgba(0, 0, 0, 0));
            }
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div style="background-image: url({{ asset('build/image/bjbBG.jpg') }})" class="bg-top lg:bg-left-top">
        <div class="hero bg-blue-950 bg-opacity-70 md:bg-opacity-0 ">
            <nav x-data="{ isOpen: false }" class="fixed z-10 top-0 right-0 left-0 md:top-5 md:right-5 md:left-5 bg-white shadow-md md:rounded-md">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 items-center justify-between">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-6">
                                <img class="w-8" src="{{ asset('build/image/logobjb.png') }}" alt="Bank Bjb">
                            </div>
                            <div class="hidden md:block">
                                <div class="ml-10 flex items-center space-x-4">
                                    <a href="{{ route('dashboard') }}" class="px-3 py-2 text-sm font-medium text-gray-800 border-b-2 border-blue-500" aria-current="page">Dashboard</a>
                                    <a href="{{ route('pemohon.formKoneksi.create') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-800 hover:text-blue-500 transition-all">Form
                                        koneksi</a>
                                    <a href="{{ route('permohonan.formEmail.create') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-800 hover:text-blue-500 transition-all">Form
                                        e-mail</a>
                                </div>
                            </div>
                        </div>
                        <div class="-mr-2 flex md:hidden">
                            <!-- Mobile menu button -->
                            <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-blue-500 p-2 text-white hover:bg-blue-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                                <span class="absolute -inset-0.5"></span>
                                <span class="sr-only">Open main menu</span>
                                <!-- Menu open: "hidden", Menu closed: "block" -->
                                <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                                <!-- Menu open: "block", Menu closed: "hidden" -->
                                <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Mobile menu, show/hide based on menu state. -->
                <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="md:hidden" id="mobile-menu">
                    <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                        <a href="{{ route('dashboard') }}" class="block rounded-md bg-white px-3 py-2 text-base font-medium text-blue-500" aria-current="page">Dashboard</a>
                        <a href="{{ route('pemohon.formKoneksi.create') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-800 hover:bg-gray-400 hover:text-white">Form
                            koneksi</a>
                        <a href="{{ route('permohonan.formEmail.create') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-800 hover:bg-gray-400 hover:text-white">Form
                            e-mail</a>
                    </div>
                </div>
            </nav>
            <div class="relative isolate px-6 lg:px-8 pt-28 pb-10">
                <div class="mx-auto">
                    <div class="md:w-1/2">
                        <h1 class="font-extrabold  tracking-tight text-white text-3xl md:text-4xl lg:text-5xl">
                            Permohonan
                            Koneksi dan
                            Akun Perusahaan <p class="text-5xl text-blue-500">Bank bjb</p>
                        </h1>
                        <p class="mt-6 text-lg leading-8 text-white">Halaman
                            ini
                            memungkinkan Anda untuk
                            memulai
                            proses permohonan koneksi dan pembuatan akun perusahaan di Bank bjb
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main>
        <h1 class="mx-10 px-2 pt-4 border-b-2 border-blue-950 text-lg font-bold">e-Form</h1>
        <div class="flex flex-wrap justify-center">
            <div class="w-full md:w-1/2 p-8">
                <a href="{{ route('pemohon.formKoneksi.create') }}" style="background-image: url({{ asset('build/image/jabat.jpeg') }})" class="relative group bg-cover block h-full rounded-md shadow-2xl transition hover:-translate-y-4 hover:bg-white duration-300 overflow-hidden">
                    <h5 class="group-hover:opacity-0 transition-all absolute bg-gray-50 p-2 w-full text-lg font-bold text-black">
                        Form Koneksi
                    </h5>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="group-hover:opacity-0 transition-all absolute right-4 top-0 size-16 text-white bg-yellow-500 rounded p-1 shadow-lg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                    <div class="w-full h-full p-4 opacity-0 hover:opacity-100 rounded-md transition-all" style="background-image: linear-gradient(to right, rgb(0, 129, 255, .9), rgb(0, 100, 200, .9));">
                        <h5 class="text-xl font-bold mb-2 text-white p-1 w-full">Form Koneksi
                        </h5>
                        <p class="text-white">Form permohonan untuk pengajuan pembukaan koneksi.
                        </p>
                    </div>
                </a>
            </div>
            <div class="w-full md:w-1/2 p-8">
                <a href="{{ route('permohonan.formEmail.create') }}" style="background-image: url({{ asset('build/image/email.jpeg') }})" class="relative group bg-cover bg-center block h-full rounded-md shadow-2xl transition hover:-translate-y-4 hover:bg-white duration-300 overflow-hidden">
                    <h5 class="group-hover:opacity-0 transition-all absolute bg-gray-50 p-2 w-full text-lg font-bold text-black">
                        Form Email
                    </h5>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="group-hover:opacity-0 transition-all absolute right-4 top-0 size-16 text-white bg-yellow-500 rounded p-1 shadow-lg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                    </svg>
                    <div class="w-full h-full p-4 opacity-0 hover:opacity-100 rounded-md transition-all" style="background-image: linear-gradient(to right, rgb(0, 129, 255, .9), rgb(0, 100, 200, .9));">
                        <h5 class="text-xl font-bold mb-2 text-white p-1 w-full">Form Email
                        </h5>
                        <p class="text-white">Form permohonan untuk pendaftaran, pengaktifan dan
                            penghapusan
                            e-mail perusahaan.
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </main>
    <footer class="bg-blue-950">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="#" class="flex items-center">
                        <img src="{{ asset('build/image/logobjbputih.png') }}" class="h-8 me-3" alt="Bjb Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Bank bjb</span>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-white">Kantor Pusat Bank BJB</h2>
                        <ul class="text-gray-200 font-medium">
                            <li class="mb-4">
                                <a href="#" class="hover:underline">Menara bank bjb
                                    Divisi Corporate Secretary</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">Jl.Naripan No. 12-14
                                    Bandung - 40111</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-white uppercase">Kontak bank bjb</h2>
                        <ul class="text-gray-200 font-medium">
                            <li class="mb-4">
                                <a href="" class="hover:underline ">Telp : 022 -
                                    4234868
                                </a>
                            </li>
                            <li>
                                <a href="" class="hover:underline">Fax : 022 - 4206099
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-white uppercase ">Tautan
                        </h2>
                        <ul class="text-gray-200 font-medium">
                            <li class="mb-4">
                                <a href="#" class="hover:underline">bjb Call 14049</a>
                            </li>
                            <li class="mb-4">
                                <a href="#" class="hover:underline">Pengaduan Nasabah</a>
                            </li>
                            <li class="mb-4">
                                <a href="#" class="hover:underline">E-proc bank bjb
                                </a>
                            </li>
                            <li class="mb-4">
                                <a href="#" class="hover:underline">Lelang bank bjb
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-blue-950 sm:mx-auto lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-200 sm:text-center ">© 2024 <a href="#" class="hover:underline">Bank bjb</a>
                </span>
                <div class="flex mt-4 sm:justify-center sm:mt-0">
                    <a href="#" class="text-gray-300 hover:text-white">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                            <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                            <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                        </svg>
                        <span class="sr-only">Discord community</span>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                            <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Twitter page</span>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">GitHub account</span>
                    </a>
                    <a href="#" class="text-gray-300 hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Dribbble account</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //message with sweetalert
        @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "BERHASIL",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
        @elseif(session('error'))
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