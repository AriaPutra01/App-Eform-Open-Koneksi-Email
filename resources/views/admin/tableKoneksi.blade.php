<x-app-layout>
    <x-slot name="header">
        <h2 class="text-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Form pemohon') }}
        </h2>
    </x-slot>

    <x-card>
        <a href="{{ route('admin.dataKoneksi.create') }}"
            class="bg-sky-500 dark:bg-sky-700 hover:bg-sky-700 dark:hover:bg-sky-500 text-white font-bold py-2 px-4 rounded">TAMBAH
            DATA</a>
        <a href="{{ route('admin.export.excel') }}"
            class="bg-green-500 dark:bg-green-700 hover:bg-green-700 dark:hover:bg-green-500 text-white font-bold py-2 px-4 rounded">EXPORT
            EXCEL</a>
        <div class="overflow-x-auto my-5">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No. </th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Divisi</th>
                        <th scope="col" class="px-6 py-3">Grup</th>
                        <th scope="col" class="px-6 py-3">Waktu mulai</th>
                        <th scope="col" class="px-6 py-3">Waktu selesai</th>
                        <th scope="col" class="px-6 py-3" style="width: 20%">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pemohons as $p)
                        <tr class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                            <td class="px-6 py-4">{{ $loop->index + 1 }}</td>
                            <!-- mencetak nomor urut -->
                            <td class="px-6 py-4">{{ $p->nama }}</td>
                            <td class="px-6 py-4">{{ $p->divisi }}</td>
                            <td class="px-6 py-4">{{ $p->grup }}</td>
                            <td class="px-6 py-4">{{ $p->mulai }}</td>
                            <td class="px-6 py-4">{{ $p->sampai }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('admin.dataKoneksi.show', $p->id) }}"
                                    class="m-2 inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">SHOW</a>
                                <x-danger-button x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'konfirmasiHapusPemohon')">{{ __('Hapus') }}</x-danger-button>
                                <x-modal name="konfirmasiHapusPemohon" focusable>
                                    <form method="POST" action="{{ route('admin.dataKoneksi.destroy', $p->id) }}" class="p-6">
                                        @csrf
                                        @method('DELETE')
                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            {{ __('Apakah Anda yakin ingin menghapus data ini?') }}
                                        </h2>
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('Setelah data ini dihapus, semua sumber daya dan datanya akan dihapus secara permanen.') }}
                                        </p>
                                        <div class="mt-6 flex justify-end">
                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Membatalkan') }}
                                            </x-secondary-button>
                                            <x-danger-button class="ms-3">
                                                {{ __('Hapus Data') }}
                                            </x-danger-button>
                                        </div>
                                    </form>
                                </x-modal>
                            </td>
                        </tr>
                    @empty
                        <div
                            class="mb-5 text-red-600 dark:text-red-100 bg-red-100 dark:bg-red-800 border border-red-300 rounded py-2 px-4">
                            Data pemohon belum Tersedia.
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $pemohons->links() }}
    </x-card>
</x-app-layout>
