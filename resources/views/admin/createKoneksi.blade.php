<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buat Data Pemohon') }}
        </h2>
    </x-slot>
    <form action="{{ route('admin.dataKoneksi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-12">
            <x-card>

                <div class="col-span-full">
                    <x-input-label class="text-base font-semibold leading-7 text-gray-900 dark:text-white" for="tujuan"
                        :value="__('Tujuan Pengajuan')" />
                    <textarea id="tujuan" name="tujuan" rows="3"
                        class="mt-3 block w-full border-1 py-1.5 border-gray-300 dark:border-gray-700  dark:bg-gray-900 dark:text-gray-300 focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md shadow-sm">{{ old('tujuan') }}</textarea>
                    <x-input-error :messages="$errors->get('tujuan')" class="mt-2" />
                </div>
            </x-card>
            <x-card>

                <h2 class="text-base font-semibold leading-7 text-gray-900 dark:text-white">Data Pemohon</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-400">Data pribadi pemohon</p>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <x-input-label for="nama" :value="__('Nama Lengkap')" />
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                            :value="old('nama')" required autofocus />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>
                    <div class="sm:col-span-3">
                        <x-input-label for="nik" :value="__('NIK')" />
                        <x-text-input id="nik" class="block mt-1 w-full" type="number" name="nik"
                            :value="old('nik')" required autofocus />
                        <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                    </div>
                    <div class="sm:col-span-6">
                        <x-input-label for="email" :value="__('Alamat Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="sm:col-span-3">
                        <x-input-label for="divisi" :value="__('Divisi')" />
                        <x-text-input id="divisi" class="block mt-1 w-full" type="text" name="divisi"
                            :value="old('divisi')" required autofocus />
                        <x-input-error :messages="$errors->get('divisi')" class="mt-2" />
                    </div>
                    <div class="sm:col-span-3">
                        <x-input-label for="grup" :value="__('Grup')" />
                        <x-text-input id="grup" class="block mt-1 w-full" type="text" name="grup"
                            :value="old('grup')" required autofocus />
                        <x-input-error :messages="$errors->get('grup')" class="mt-2" />
                    </div>
                </div>
            </x-card>
            <x-card>

                <h2 class="text-base font-semibold leading-7 text-gray-900 dark:text-white">Informasi Koneksi</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-400">Detail pengajuan koneksi
                </p>
                <div class="my-10 space-y-10">
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <fieldset class="sm:col-span-3">
                            <legend class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-400">
                                Kebutuhan Akses</legend>
                            <div class="mt-6 space-y-6">
                                <div class="flex items-center gap-x-3">
                                    <input id="production" name="kebutuhan" type="radio" value="production"
                                        {{ old('kebutuhan') == 'production' ? 'checked' : '' }}
                                        class="@error('kebutuhan') is-invalid @enderror h-4 w-4 dark:bg-gray-900 border-gray-300 text-sky-600 focus:ring-sky-600">
                                    <label for="production"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-400">Production</label>
                                </div>
                                <div class="flex items-center gap-x-3">
                                    <input id="development" name="kebutuhan" type="radio" value="development"
                                        {{ old('kebutuhan') == 'development' ? 'checked' : '' }}
                                        class="@error('kebutuhan') is-invalid @enderror h-4 w-4 dark:bg-gray-900 border-gray-300 text-sky-600 focus:ring-sky-600">
                                    <label for="development"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-400">Development</label>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('kebutuhan')" class="mt-2" />
                        </fieldset>
                        <fieldset class="sm:col-span-3">
                            <legend class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-400">Akses
                                Koneksi</legend>
                            <div class="mt-6 space-y-6">
                                <div class="flex items-center gap-x-3">
                                    <input id="internal" name="akses" type="radio" value="internal"
                                        {{ old('akses') == 'internal' ? 'checked' : '' }}
                                        class="@error('akses') is-invalid @enderror h-4 w-4 dark:bg-gray-900 border-gray-300 text-sky-600 focus:ring-sky-600">
                                    <label for="internal"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-400">Internal</label>
                                </div>
                                <div class="flex items-center gap-x-3">
                                    <input id="pihakKetiga" name="akses" type="radio" value="pihakKetiga"
                                        {{ old('akses') == 'pihakKetiga' ? 'checked' : '' }}
                                        class="@error('akses') is-invalid @enderror h-4 w-4 dark:bg-gray-900 border-gray-300 text-sky-600 focus:ring-sky-600">
                                    <label for="pihakKetiga"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-400">Pihak
                                        Ketiga</label>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('akses')" class="mt-2" />
                        </fieldset>
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <x-input-label for="koneksiAplikasi" :value="__('Nama Aplikasi / Koneksi')" />
                    <x-text-input id="koneksiAplikasi" class="block mt-1 w-full" type="text" name="koneksiAplikasi"
                        :value="old('koneksiAplikasi')" required autofocus />
                    <x-input-error :messages="$errors->get('koneksiAplikasi')" class="mt-2" />
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <x-input-label for="mulai" :value="__('Jangka Waktu Mulai')" />
                        <x-text-input id="mulai" class="block mt-1 w-full" type="date" name="mulai"
                            :value="old('mulai')" required autofocus />
                        <x-input-error :messages="$errors->get('mulai')" class="mt-2" />
                    </div>
                    <div class="sm:col-span-3">
                        <x-input-label for="sampai" :value="__('Selesai')" />
                        <x-text-input id="sampai" class="block mt-1 w-full" type="date" name="sampai"
                            :value="old('sampai')" required autofocus />
                        <x-input-error :messages="$errors->get('sampai')" class="mt-2" />
                    </div>
                    <div class="sm:col-span-2 sm:col-start-1">
                        <x-input-label for="ipSource" :value="__('IP Source')" />
                        <div id="ipSourceContainer">
                            <x-text-input id="ipSource" class="block mt-2 w-full" type="text" name="ipSource[]"
                                :value="old('ipSource.0', '')" required autofocus />
                        </div>
                        <x-input-error :messages="$errors->get('ipSource')" class="mt-2" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-input-label for="ipDestination" :value="__('IP Destination')" />
                        <div id="ipDestinationContainer">
                            <x-text-input id="ipDestination" class="block mt-2 w-full" type="text"
                                name="ipDestination[]" :value="old('ipDestination.0', '')" required autofocus />
                        </div>
                        <x-input-error :messages="$errors->get('ipDestination')" class="mt-2" />
                    </div>
                    <div class="sm:col-span-2">
                        <x-input-label for="port" :value="__('Port')" />
                        <div id="portContainer">
                            <x-text-input id="port" class="block mt-2 w-full" type="number" name="port[]"
                                :value="old('port.0', '')" required autofocus />
                        </div>
                        <x-input-error :messages="$errors->get('port')" class="mt-2" />
                    </div>
                    <button type="button" id="addFields"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah IP
                        Port</button>
                </div>
                <div class="my-10 space-y-10">
                    <fieldset>
                        <legend class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-400"><i>Initiate
                                Connection</i>
                        </legend>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="flex items-center gap-x-3">
                                <input id="bankBjb" name="initiateConnection" type="radio" value="Bank bjb"
                                    {{ old('initiateConnection') == 'Bank bjb' ? 'checked' : '' }}
                                    class="@error('initiateConnection') is-invalid @enderror h-4 w-4 dark:bg-gray-900 border-gray-300 text-sky-600 focus:ring-sky-600">
                                <label for="bank bjb"
                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-400">bank
                                    bjb</label>
                            </div>
                            <div class="flex items-center gap-x-3">
                                <input id="pihakKetiga" name="initiateConnection" type="radio"
                                    value="Pihak Ketiga"
                                    {{ old('initiateConnection') == 'Pihak Ketiga' ? 'checked' : '' }}
                                    class="@error('initiateConnection') is-invalid @enderror h-4 w-4 dark:bg-gray-900 border-gray-300 text-sky-600 focus:ring-sky-600">
                                <label for="pihakKetiga"
                                    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-400">Pihak
                                    Ketiga</label>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('initiateConnection')" class="mt-2" />
                    </fieldset>
                    <fieldset>
                        <legend class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-400">Lampiran
                        </legend>
                        <div class="mt-6 space-y-6">
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="flex items-center gap-x-3">
                                    <input id="topologyAplikasi" name="lampiran" type="radio"
                                        value="Topology Aplikasi"
                                        {{ old('lampiran') == 'Topology Aplikasi' ? 'checked' : '' }}
                                        class="@error('lampiran') is-invalid @enderror h-4 w-4 dark:bg-gray-900 border-gray-300 text-sky-600 focus:ring-sky-600">
                                    <label for="topologyAplikasi"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-400">Topology
                                        Aplikasi</label>
                                </div>
                                <div class="flex items-center gap-x-3">
                                    <input id="perjanjianKerjasama" name="lampiran" type="radio"
                                        value="Perjanjian Kerjasama"
                                        {{ old('lampiran') == 'Perjanjian Kerjasama' ? 'checked' : '' }}
                                        class="@error('lampiran') is-invalid @enderror h-4 w-4 dark:bg-gray-900 border-gray-300 text-sky-600 focus:ring-sky-600">
                                    <label for="perjanjianKerjasama"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-400">Perjanjian
                                        Kerjasama</label>
                                </div>
                                <div class="flex items-center gap-x-3">
                                    <input id="brd" name="lampiran" type="radio" value="BRD"
                                        {{ old('lampiran') == 'BRD' ? 'checked' : '' }}
                                        class="@error('lampiran') is-invalid @enderror h-4 w-4 dark:bg-gray-900 border-gray-300 text-sky-600 focus:ring-sky-600">
                                    <label for="brd"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-400">BRD</label>
                                </div>
                                <div class="flex items-center gap-x-3">
                                    <input id="lainnya" name="lampiran" type="radio" value="Lainnya"
                                        {{ old('lampiran') == 'Lainnya' ? 'checked' : '' }}
                                        class="@error('lampiran') is-invalid @enderror h-4 w-4 dark:bg-gray-900 border-gray-300 text-sky-600 focus:ring-sky-600">
                                    <label for="lainnya"
                                        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-400">Lainnya.....</label>
                                </div>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('lampiran')" class="mt-2" />
                    </fieldset>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="reset"
                            class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-400">Reset</button>
                        <x-primary-button>{{ __('Kirim') }}</x-primary-button>
                    </div>
            </x-card>
        </div>
    </form>
</x-app-layout>
