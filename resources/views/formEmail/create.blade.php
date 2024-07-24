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
    <nav x-data="{ isOpen: false }" class="bg-blue-950 mt-3 mx-5 rounded-md">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0 mr-6">
                        <img class="w-8" src="{{ asset('build/image/logobjbputih.png') }}" alt="Bank Bjb">
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-center space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="{{ route('dashboard') }}"
                                class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-black hover:bg-opacity-30 hover:text-white"
                                aria-current="page">Dashboard</a>
                            <a href="{{ route('pemohon.formKoneksi.create') }}"
                                class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-black hover:bg-opacity-30 hover:text-white">Form
                                koneksi</a>
                            <a href="{{ route('permohonan.formEmail.create') }}"
                                class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Form
                                e-mail</a>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" @click="isOpen = !isOpen"
                        class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
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
        <div x-show=isOpen class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="{{ route('dashboard') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                    aria-current="page">Dashboard</a>
                <a href="{{ route('pemohon.formKoneksi.create') }}"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Form
                    koneksi</a>
                <a href="{{ route('permohonan.formEmail.create') }}"
                    class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Form
                    e-mail</a>
            </div>
        </div>
    </nav>
    <header class="bg-white shadow-md">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-center text-3xl font-bold tracking-tight text-gray-900">Form Pengajuan E-Mail </h1>
        </div>
    </header>
    <main>

        <x-slot name="header">
            <h2 class="text-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Buat Data Pemohon') }}
            </h2>
        </x-slot>
        <form action="{{ route('permohonan.formEmail.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-12" style="padding-bottom: 3rem">
                <x-card>

                    <h2 class="text-base font-semibold leading-7 text-gray-900 dark:text-white">Data Pemohon</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-400">Data pribadi pemohon</p>
                    <fieldset style="margin-top: 2rem;">
                        <legend class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-400">Jenis
                            Permohonan
                        </legend>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="flex items-center gap-x-3">
                                <input id="pendaftaran" name="pendaftaran" type="radio" value="Pendaftaran"
                                    {{ old('initiateConnection') == 'Pendaftaran' ? 'checked' : '' }}
                                    class="h-4 w-4 dark:bg-gray-900 border-gray-300 text-sky-600 focus:ring-sky-600">
                                <label for="pendaftaran"
                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-400">Pendafaran</label>
                            </div>
                            <div class="flex items-center gap-x-3">
                                <input id="pengaktifan" name="pendaftaran" type="radio" value="Pengaktifan"
                                    {{ old('initiateConnection') == 'Pengaktifan' ? 'checked' : '' }}
                                    class="@error('initiateConnection') is-invalid @enderror h-4 w-4 dark:bg-gray-900 border-gray-300 text-sky-600 focus:ring-sky-600">
                                <label for="pengaktifan"
                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-400">Pengaktifan</label>
                            </div>
                            <div class="flex items-center gap-x-3">
                                <input id="pendafatran" name="pendaftaran" type="radio" value="Penghapusan"
                                    {{ old('initiateConnection') == 'Penghapusan' ? 'checked' : '' }}
                                    class="@error('initiateConnection') is-invalid @enderror h-4 w-4 dark:bg-gray-900 border-gray-300 text-sky-600 focus:ring-sky-600">
                                <label for="penghapusan"
                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-400">Penghapusan</label>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('initiateConnection')" class="mt-2" />
                    </fieldset>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <x-input-label for="nama" :value="'Nama Lengkap'" />
                            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                                :value="old('nama')" required autofocus placeholder="Masukan Nama Lengkap Anda" />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>
                        <div class="sm:col-span-3">
                            <x-input-label for="nama_ibu" :value="'Nama Ibu Kandung'" />
                            <x-text-input id="nama_ibu" class="block mt-1 w-full" type="text" name="nama_ibu"
                                :value="old('nama_ibu')" required autofocus placeholder="Masukan Nama Ibu Anda" />
                            <x-input-error :messages="$errors->get('nama_ibu')" class="mt-2" />
                        </div>
                        <div class="sm:col-span-3">
                            <x-input-label for="cabang" :value="'Cabang'" />
                            <x-text-input id="cabang" class="block mt-1 w-full" type="text" name="cabang"
                                :value="old('cabang')" required autofocus placeholder="Masukan Cabang" />
                            <x-input-error :messages="$errors->get('cabang')" class="mt-2" />
                        </div>

                        <div class="sm:col-span-3">
                            <x-input-label for="jabatan" :value="'Jabatan'" />
                            <select id="countries"
                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="jabatan" name="jabatan">
                                <option value="">Pilih Jabatan Anda</option>
                                <option value="Teller" {{ old('jabatan') == 'Teller' ? 'selected' : '' }}>Teller
                                </option>
                                <option value="Customer Service"
                                    {{ old('jabatan') == 'Customer Service' ? 'selected' : '' }}>Customer Service
                                </option>
                                <option value="Marketing" {{ old('jabatan') == 'Marketing' ? 'selected' : '' }}>
                                    Marketing
                                </option>
                                <option value="Staf/Back Office"
                                    {{ old('jabatan') == 'Staf/Back Office' ? 'selected' : '' }}>Staf/Back Office
                                </option>
                                <option value="Supervisor" {{ old('jabatan') == 'Supervisor' ? 'selected' : '' }}>
                                    Supervisor
                                </option>
                                <option value="Pimpinan KK" {{ old('jabatan') == 'Pimpinan KK' ? 'selected' : '' }}>
                                    Pimpinan
                                    KK</option>
                                <option value="Pimpinan KCP" {{ old('jabatan') == 'Pimpinan KCP' ? 'selected' : '' }}>
                                    Pimpinan KCP</option>
                                <option value="Manager" {{ old('jabatan') == 'Manager' ? 'selected' : '' }}>
                                    Manager
                                </option>
                                <option value="Pimpinan Cabang"
                                    {{ old('jabatan') == 'Pimpinan  Cabang' ? 'selected' : '' }}>Pimpinan Cabang
                                </option>
                            </select>
                            <x-input-error :messages="$errors->get('cabang')" class="mt-2" />
                        </div>

                        <div class="sm:col-span-full">
                            <x-input-label for="no_telp" :value="'No Telepon'" />
                            <x-text-input id="no_telp" class="block mt-1 w-full" type="number" name="no_telp"
                                :value="old('no_telp')" required autofocus placeholder="Masukan No Telepon Anda" />
                            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
                        </div>
                    </div>
                </x-card>
                <x-card>

                    <div class="col-span-full">
                        <x-input-label class="text-base font-semibold leading-7 text-gray-900 dark:text-white"
                            for="alasan" :value="'Alasan'" />
                        <textarea id="alasan" name="alasan" rows="3"
                            class="mt-3 block w-full border-1 py-1.5 border-gray-300 dark:border-gray-700  dark:bg-gray-900 dark:text-gray-300 focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md shadow-sm"
                            placeholder="Masukan Alasan Anda">{{ old('alasan') }}</textarea>
                        <x-input-error :messages="$errors->get('alasan')" class="mt-2" />
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="reset"
                            class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-400">Reset</button>

                        <button type="submit"
                            class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-400"
                            name="exportPdf">Export Word</button>
                        <x-primary-button>{{ __('Kirim') }}</x-primary-button>

                    </div>


                </x-card>
            </div>
        </form>

    </main>
</body>

</html>
