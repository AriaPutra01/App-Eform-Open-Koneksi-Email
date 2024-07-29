<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eform - bank bjb</title>
    {{-- icon --}}
    <link rel="icon" href="{{ asset('build/image/logobjb.png') }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

</head>

<body x-data="modalHandler">

    <x-app-layout>

        <x-slot name="header">
            <h2 class="text-center font-semibold text-gray-800 leading-tight">
                {{ __('Data Form pemohon') }}
            </h2>
        </x-slot>

        <x-card>
            <div class="card-header">
                <h3 class="card-title">Data Permohonan Pengajuan Dan Penghapusan Email</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                {{-- <center>
                <a href="{{ url('admin/create') }}" class="btn btn-md btn-primary mb-3">Buat Permohonan</a>
                <a href="/pegawai/cetak_pdf" class="btn btn-md btn-primary mb-3" target="_blank">CETAK PDF</a>
            </center> --}}
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nama ibu</th>
                            <th>Cabang</th>
                            <th>Jabatan</th>
                            <th>No telp</th>
                            <th>Alasan</th>
                            <th>Pendaftaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $post->nama }}</td>
                                <td>{{ $post->nama_ibu }}</td>
                                <td>{{ $post->cabang }}</td>
                                <td>{{ $post->jabatan }}</td>
                                <td>{{ $post->no_telp }}</td>
                                <td>{{ $post->alasan }}</td>
                                <td>{{ $post->pendaftaran }}</td>

                                <td class="text-center">

                                    <a href="{{ route('adminEmail.dataEmail.show', $post->id) }}"
                                        class="m-2 inline-block bg-gray-500 hover:bg-gray-700 text-white py-1 px-4 rounded">SHOW</a>
                                    <button
                                        @click="$dispatch('open-modal', 'konfirmasiHapusPemohon-{{ $post->id }}')"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        {{ __('Hapus') }}
                                    </button>
                                    <x-modal name="konfirmasiHapusPemohon-{{ $post->id }}" focusable>
                                        <form method="POST"
                                            action="{{ route('adminEmail.dataEmail.destroy', $post->id) }}"
                                            class="p-6">
                                            @csrf
                                            @method('DELETE')
                                            <h2 class="text-lg font-medium text-gray-900">
                                                {{ __('Apakah Anda yakin ingin menghapus data ini?') }}
                                            </h2>
                                            <p class="mt-1 text-sm text-gray-600">
                                                {{ __('Setelah data ini dihapus, semua sumber daya dan datanya akan dihapus secara permanen.') }}
                                            </p>
                                            <div class="mt-6 flex justify-end">
                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                    {{ __('Membatalkan') }}
                                                </x-secondary-button>
                                                <x-danger-button type="submit">
                                                    {{ __('Hapus Data') }}
                                                </x-danger-button>
                                            </div>
                                        </form>
                                    </x-modal>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Post belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nama ibu</th>
                            <th>Cabang</th>
                            <th>Jabatan</th>
                            <th>No telp</th>
                            <th>Alasan</th>
                            <th>Pendaftaran</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </x-card>

    </x-app-layout>
    <!-- /.card -->

    <!-- jQuery -->
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('lte/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('lte/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('lte/dist/js/pages/dashboard.js') }}"></script>

    <!-- jQuery -->
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('lte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('lte/dist/js/demo.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('lte/plugins/chart.js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('lte/plugins/chart.js/Chart.bundle.min.js') }}"></script>

    <script>
        $(function() {
            // Create button with flexibility for custom URL and text
            var createButtonUrl = "{{ route('adminEmail.dataEmail.create') }}"; // Replace with your actual URL
            var createButtonText = "Create"; // Customize text as needed
            var createButton =
                `<a href="${createButtonUrl}" class="btn btn-md btn-primary">${createButtonText}</a>`;

            console.log("Create button HTML:", createButton); // Log the button HTML to the console

            // Prepend create button with error handling for non-existent element
            var container = $('#example1_wrapper .col-md-6:eq(0)');
            console.log("Container element:", container); // Log the container element to the console

            if (container.length > 0) {
                container.prepend(createButton);
                console.log("Button prepended to container!"); // Log a success message
            } else {
                console.warn("Create button container not found. Consider adjusting the selector.");
            }

            // Initialize DataTables with enhancements
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [{
                        "extend": 'copy',
                        "exportOptions": {
                            "columns": [1, 2, 3, 4, 5, 6,
                                7
                            ] // Export only "Nama" column (adjust as needed)
                        }
                    },
                    {
                        "extend": 'excel',
                        "exportOptions": {
                            "columns": [1, 2, 3, 4, 5, 6,
                                7
                            ] // Export all visible columns (more flexible)
                        }
                    },
                    {
                        "extend": 'print',
                        "exportOptions": {
                            "columns": [1, 2, 3, 4, 5, 6,
                                7
                            ] // Export all visible columns (more flexible)
                        }
                    },
                    'colvis' // Include column visibility toggle
                ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            // Add create button to DataTables buttons container
            var buttonsContainer = $('#example1_wrapper .col-md-6:eq(0) .dt-buttons');
            console.log("Buttons container element:",
                buttonsContainer); // Log the buttons container element to the console
            buttonsContainer.prepend(createButton);

            // Initialize DataTables for #example2 (consider combining for efficiency)
            $("#example2").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true
            });
        });
    </script>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('modalHandler', () => ({
                showModal: false,
                openModal(modalName) {
                    this.showModal = true;
                    this.$nextTick(() => {
                        this.$refs[modalName].showModal();
                    });
                },
                closeModal(modalName) {
                    this.$refs[modalName].close();
                    this.showModal = false;
                }
            }));
        });
    </script>

</body>

</html>
