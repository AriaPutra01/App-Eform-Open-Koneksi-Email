<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

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

<body>
    <header class="bg-white shadow-md md:pt-4">
        <nav x-data="{ isOpen: false }" class="fixed z-10 top-0 right-0 left-0 md:top-5 md:right-5 md:left-5 bg-blue-950 md:mx-5 md:rounded-md">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 mr-6">
                            <img class="w-8" src="{{ asset('build/image/logobjbputih.png') }}" alt="Bank Bjb">
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-center space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="{{ route('dashboard') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-black hover:bg-opacity-30 hover:text-white" aria-current="page">Dashboard</a>
                                <a href="{{ route('pemohon.formKoneksi.create') }}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Form
                                    koneksi</a>
                                <a href="{{ route('permohonan.formEmail.create') }}" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-black hover:bg-opacity-30 hover:text-white">Form
                                    e-mail</a>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" @click="isOpen = !isOpen" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-white hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
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
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="{{ route('dashboard') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-blue-900 hover:text-white" aria-current="page">Dashboard</a>
                    <a href="{{ route('pemohon.formKoneksi.create') }}" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Form
                        koneksi</a>
                    <a href="{{ route('permohonan.formEmail.create') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-blue-900 hover:text-white">Form
                        e-mail</a>
                </div>
            </div>
        </nav>
        <div class="mx-auto max-w-7xl px-4 pt-24 pb-6 sm:px-6 lg:px-8">
            <h1 class="text-center text-3xl font-bold tracking-tight text-gray-900">Form Open Koneksi </h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <form action="{{ route('pemohon.formKoneksi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-12">
                    <x-card>
                        <div class="col-span-full">
                            <x-input-label class="text-base font-semibold leading-7" for="tujuan" :value="'Tujuan Pengajuan'" />
                            <textarea id="tujuan" name="tujuan" rows="3" class="mt-3 block w-full border-1 py-1.5 bg-gray-100 border-gray-300 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm">{{ old('tujuan') }}</textarea>
                            <x-input-error :messages="$errors->get('tujuan')" class="mt-2" />
                        </div>
                    </x-card>
                    <x-card>

                        <h2 class="text-base font-semibold leading-7 text-gray-900">Data Pemohon
                        </h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Data pribadi pemohon</p>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <x-input-label for="nama" :value="'Nama Lengkap'" />
                                <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus />
                                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                            </div>
                            <div class="sm:col-span-3">
                                <x-input-label for="nik" :value="'NIK'" />
                                <x-text-input id="nik" class="block mt-1 w-full" type="number" name="nik" :value="old('nik')" required autofocus />
                                <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                            </div>
                            <div class="sm:col-span-6">
                                <x-input-label for="email" :value="'Alamat Email'" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="sm:col-span-3">
                                <x-input-label for="divisi" :value="'Divisi'" />
                                <x-text-input id="divisi" class="block mt-1 w-full" type="text" name="divisi" :value="old('divisi')" required autofocus />
                                <x-input-error :messages="$errors->get('divisi')" class="mt-2" />
                            </div>
                            <div class="sm:col-span-3">
                                <x-input-label for="grup" :value="'Grup'" />
                                <x-text-input id="grup" class="block mt-1 w-full" type="text" name="grup" :value="old('grup')" required autofocus />
                                <x-input-error :messages="$errors->get('grup')" class="mt-2" />
                            </div>
                        </div>
                    </x-card>
                    <x-card>

                        <h2 class="text-base font-semibold leading-7 text-gray-900">Informasi
                            Koneksi</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Detail pengajuan koneksi
                        </p>
                        <div class="my-10 space-y-10">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <fieldset class="sm:col-span-3">
                                    <legend class="text-sm font-semibold leading-6 text-gray-900">
                                        Kebutuhan Akses</legend>
                                    <div class="mt-6 space-y-6">
                                        <div class="flex items-center gap-x-3">
                                            <input id="production" name="kebutuhan" type="radio" value="production" {{ old('kebutuhan') == 'production' ? 'checked' : '' }} class="h-4 w-4 bg-gray-100 border-gray-300 text-sky-600 focus:ring-sky-600">
                                            <label for="production" class="block text-sm font-medium leading-6 text-gray-900">Production</label>
                                        </div>
                                        <div class="flex items-center gap-x-3">
                                            <input id="development" name="kebutuhan" type="radio" value="development" {{ old('kebutuhan') == 'development' ? 'checked' : '' }} class="h-4 w-4 bg-gray-100 border-gray-300 text-sky-600 focus:ring-sky-600">
                                            <label for="development" class="block text-sm font-medium leading-6 text-gray-900">Development</label>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('kebutuhan')" class="mt-2" />
                                </fieldset>
                                <fieldset class="sm:col-span-3">
                                    <legend class="text-sm font-semibold leading-6 text-gray-900">
                                        Akses
                                        Koneksi</legend>
                                    <div class="mt-6 space-y-6">
                                        <div class="flex items-center gap-x-3">
                                            <input id="internal" name="akses" type="radio" value="internal" {{ old('akses') == 'internal' ? 'checked' : '' }} class="h-4 w-4 bg-gray-100 border-gray-300 text-sky-600 focus:ring-sky-600">
                                            <label for="internal" class="block text-sm font-medium leading-6 text-gray-900">Internal</label>
                                        </div>
                                        <div class="flex items-center gap-x-3">
                                            <input id="pihakKetiga" name="akses" type="radio" value="pihakKetiga" {{ old('akses') == 'pihakKetiga' ? 'checked' : '' }} class="h-4 w-4 bg-gray-100 border-gray-300 text-sky-600 focus:ring-sky-600">
                                            <label for="pihakKetiga" class="block text-sm font-medium leading-6 text-gray-900">Pihak
                                                Ketiga</label>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('akses')" class="mt-2" />
                                </fieldset>
                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <x-input-label for="koneksiAplikasi" :value="'Nama Aplikasi / Koneksi'" />
                            <x-text-input id="koneksiAplikasi" class="block mt-1 w-full" type="text" name="koneksiAplikasi" :value="old('koneksiAplikasi')" required autofocus />
                            <x-input-error :messages="$errors->get('koneksiAplikasi')" class="mt-2" />
                        </div>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <x-input-label for="mulai" :value="'Jangka Waktu Mulai'" />
                                <x-text-input id="mulai" class="block mt-1 w-full" type="date" name="mulai" :value="old('mulai')" required autofocus />
                                <x-input-error :messages="$errors->get('mulai')" class="mt-2" />
                            </div>
                            <div class="sm:col-span-3">
                                <x-input-label for="sampai" :value="'Selesai'" />
                                <x-text-input id="sampai" class="block mt-1 w-full" type="date" name="sampai" :value="old('sampai')" required autofocus />
                                <x-input-error :messages="$errors->get('sampai')" class="mt-2" />
                            </div>
                            <div class="sm:col-span-2 sm:col-start-1">
                                <x-input-label for="ipSource" :value="'IP Source'" />
                                <div id="ipSourceContainer">
                                    <x-text-input id="ipSource" class="block mt-2 w-full" type="text" name="ipSource[]" :value="old('ipSource.0', '')" required autofocus />
                                </div>
                                <x-input-error :messages="$errors->get('ipSource')" class="mt-2" />
                            </div>
                            <div class="sm:col-span-2">
                                <x-input-label for="ipDestination" :value="'IP Destination'" />
                                <div id="ipDestinationContainer">
                                    <x-text-input id="ipDestination" class="block mt-2 w-full" type="text" name="ipDestination[]" :value="old('ipDestination.0', '')" required autofocus />
                                </div>
                                <x-input-error :messages="$errors->get('ipDestination')" class="mt-2" />
                            </div>
                            <div class="sm:col-span-2">
                                <x-input-label for="port" :value="'Port'" />
                                <div id="portContainer">
                                    <x-text-input id="port" class="block mt-2 w-full" type="number" name="port[]" :value="old('port.0', '')" required autofocus />
                                </div>
                                <x-input-error :messages="$errors->get('port')" class="mt-2" />
                            </div>
                            <button type="button" id="addFields" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah
                                IP
                                Port</button>
                        </div>
                        <div class="my-10 space-y-10">
                            <fieldset>
                                <legend class="text-sm font-semibold leading-6 text-gray-900">
                                    <i>Initiate
                                        Connection</i>
                                </legend>
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="flex items-center gap-x-3">
                                        <input id="bankBjb" name="initiateConnection" type="radio" value="Bank bjb" {{ old('initiateConnection') == 'Bank bjb' ? 'checked' : '' }} class="h-4 w-4 bg-gray-100 border-gray-300 text-sky-600 focus:ring-sky-600">
                                        <label for="bank bjb" class="block text-sm font-medium leading-6 text-gray-900">bank
                                            bjb</label>
                                    </div>
                                    <div class="flex items-center gap-x-3">
                                        <input id="pihakKetiga" name="initiateConnection" type="radio" value="Pihak Ketiga" {{ old('initiateConnection') == 'Pihak Ketiga' ? 'checked' : '' }} class="h-4 w-4 bg-gray-100 border-gray-300 text-sky-600 focus:ring-sky-600">
                                        <label for="pihakKetiga" class="block text-sm font-medium leading-6 text-gray-900">Pihak
                                            Ketiga</label>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('initiateConnection')" class="mt-2" />
                            </fieldset>
                            <fieldset>
                                <legend class="text-sm font-semibold leading-6 text-gray-900">
                                    Lampiran
                                </legend>
                                <div class="mt-6 space-y-6">
                                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="flex items-center gap-x-3">
                                            <input id="topologyAplikasi" name="lampiran" type="radio" value="Topology Aplikasi" {{ old('lampiran') == 'Topology Aplikasi' ? 'checked' : '' }} class="h-4 w-4 bg-gray-100 border-gray-300 text-sky-600 focus:ring-sky-600">
                                            <label for="topologyAplikasi" class="block text-sm font-medium leading-6 text-gray-900">Topology
                                                Aplikasi</label>
                                        </div>
                                        <div class="flex items-center gap-x-3">
                                            <input id="perjanjianKerjasama" name="lampiran" type="radio" value="Perjanjian Kerjasama" {{ old('lampiran') == 'Perjanjian Kerjasama' ? 'checked' : '' }} class="h-4 w-4 bg-gray-100 border-gray-300 text-sky-600 focus:ring-sky-600">
                                            <label for="perjanjianKerjasama" class="block text-sm font-medium leading-6 text-gray-900">Perjanjian
                                                Kerjasama</label>
                                        </div>
                                        <div class="flex items-center gap-x-3">
                                            <input id="brd" name="lampiran" type="radio" value="BRD" {{ old('lampiran') == 'BRD' ? 'checked' : '' }} class="h-4 w-4 bg-gray-100 border-gray-300 text-sky-600 focus:ring-sky-600">
                                            <label for="brd" class="block text-sm font-medium leading-6 text-gray-900">BRD</label>
                                        </div>
                                        <div class="flex items-center gap-x-3">
                                            <input id="lainnya" name="lampiran" type="radio" value="Lainnya" {{ old('lampiran') == 'Lainnya' ? 'checked' : '' }} class="h-4 w-4 bg-gray-100 border-gray-300 text-sky-600 focus:ring-sky-600">
                                            <label for="lainnya" class="block text-sm font-medium leading-6 text-gray-900">Lainnya.....</label>
                                        </div>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('lampiran')" class="mt-2" />
                            </fieldset>
                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <button type="reset" class="text-sm font-semibold leading-6 text-gray-900 hover:text-red-500 transition-colors">Reset</button>
                                <button class="inline-flex items-center px-4 py-2 bg-blue-700 border border-gray-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150" type="submit" name="word">{{ __('Export Docx') }}</button>
                                <x-primary-button>{{ __('Kirim') }}</x-primary-button>
                            </div>
                    </x-card>
                </div>
            </form>
        </div>
    </main>
    <footer class="mt-10 bg-blue-950">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="#" class="flex items-center">
                        <img src="{{ asset('build/image/logobjbputih.png') }}" class="h-8 me-3" alt="Bjb Logo" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Bank
                            bjb</span>
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
</body>

</html>