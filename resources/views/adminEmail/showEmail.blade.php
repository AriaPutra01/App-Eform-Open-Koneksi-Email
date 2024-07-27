<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Detail Data <i class="text-blue-500">{{ $post->nama }}</i>
        </h2>
    </x-slot>
    <div class="space-y-12">

        <x-card>

            <h2 class="text-base font-semibold leading-7 text-gray-900 dark:text-white">Data Pemohon</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600 dark:text-gray-400">Data pribadi pemohon</p>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                <div class="sm:col-span-3">
                    <x-input-label :value="__('Nama Ibu')" />
                    <x-text-input disabled class="block mt-1 w-full" type="text" :value="$post->nama_ibu" required
                        autofocus />
                </div>
                <div class="sm:col-span-3">
                    <x-input-label :value="__('Cabang / KCP / KK')" />
                    <x-text-input disabled class="block mt-1 w-full" type="text" :value="$post->cabang" required
                        autofocus />
                </div>
                <div class="sm:col-span-3">
                    <x-input-label :value="__('Jabatan')" />
                    <x-text-input disabled class="block mt-1 w-full" type="text" :value="$post->jabatan" required
                        autofocus />
                </div>
                <div class="sm:col-span-3">
                    <x-input-label :value="__('No Telepon / Ext')" />
                    <x-text-input disabled class="block mt-1 w-full" type="text" :value="$post->no_telp" required
                        autofocus />
                </div>
                <div class="sm:col-span-6">
                    <x-input-label :value="__('Alasan')" />
                    <textarea disabled rows="3"
                        class="mt-3 block w-full border-1 py-1.5 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-sky-500 dark:focus:border-sky-600 focus:ring-sky-500 dark:focus:ring-sky-600 rounded-md shadow-sm">{{ $post->alasan }}</textarea>
                </div>
                <div class="sm:col-span-3">
                    <x-input-label :value="__('Pendaftaran')" />
                    <x-text-input disabled class="block mt-1 w-full" type="text" :value="$post->pendaftaran" required
                        autofocus />
                </div>


            </div>
            <div class="my-10 space-y-10">
                <x-primary-button><a href="{{ route('adminEmail.word', $post->id) }}"> Export ke
                        Word</a></x-primary-button>

                <x-danger-button><a href="{{ route('adminEmail.tableEmail') }}"> Kembali
                    </a></x-danger-button>
            </div>

        </x-card>
    </div>
</x-app-layout>
