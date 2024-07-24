<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Open Koneksi - EForm bjb</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <style>

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}
.logo{
  text-align: center;
  margin: 20px auto;
}

.head{
  text-align: center;
  margin-bottom: 20px;
  padding: 10px;
  box-sizing: border-box;
}

.header {
  background-color: #30a4dd;
  color: white;
  padding: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  border-radius: 5px;
  margin-bottom: 20px;
}
.container {
  max-width: 1000px;
  margin: 40px auto;
  padding: 20px;
  background-color: #f9f9f9;
  border: 1px solid #ccc;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  -ms-border-radius: 10px;
  -o-border-radius: 10px;
}

.card {
    margin-bottom: 20px;
  border-radius: 5px;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
  -o-border-radius: 5px;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 10px;
}

.form-control {
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
}

.col-md-6 {
  padding: 0 10px;
}

.btn-primary {
  background-color: #30a4dd;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.btn-warning {
  background-color: #ffc107;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.btn-success {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}


.btn-primary:hover {
  background-color: #115981;
}

.btn-waning:hover {
  background-color: #ffca2c;
  color: #fff;
}

footer {
  padding: 20px;
  background-color: #f9f9f9;
  text-align: center;
  border-top: 7px solid transparent;
  border-image: linear-gradient(
    to right,
    #115981 50%,
    #30a4dd 50%,
    #30a4dd 75%,
    #e5c41f 75%
  );
  border-image-slice: 1;
}

footer .row {
  margin-bottom: 20px;
}

footer h5 {
  color: #115981;
  font-weight: 600;
  margin-top: 0;
}

footer ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

footer li {
  margin-bottom: 10px;
}

footer a {
  color: #000;
  text-decoration: none;
}

footer a:hover {
  color: #30a4dd;
}

footer .fab {
  font-size: 18px;
  margin-right: 10px;
}

    </style>
</head>

<body>
    <!-- form -->
    <div class="logo">
        <a href="#">
            <img src="{{ asset('image/bang bjb.png') }}" alt="Logo" width="200" class="d-inline-block align-top" />
        </a>
    </div>
    <div class="container">
        <form action="{{ route('adminEmail.dataEmail.store') }}" method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="head">
                <h5 class="navbar-text ml-auto"><b>FORMULIR PERMOHONAN</b><br></h5>
                <h6>PENDAFTARAN PENGAKTIFAN PENGHAPUSAN E-MAIL</h6>
            </div>
            <!-- data pemohon -->
            <div class="header">
                <h6>JENIS PERMOHONAN</h6>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col">

                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}"
                                    placeholder="Sesuai dengan data SDM" />
                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="col">

                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" id="nama_ibu" name="nama_ibu"
                                    class="form-control @error('nama_ibu') is-invalid @enderror" value="{{ old('nama_ibu') }}"
                                    placeholder="Masukan Nama ibu kandung" />
                                <!-- error message untuk nama_ibu -->
                                @error('nama_ibu')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="cabang">Cabang/KCP/KK</label>
                        <input type="text" id="cabang" name="cabang"
                            class="form-control @error('cabang') is-invalid @enderror" value="{{ old('cabang') }}"
                            placeholder="Masukan Cabang/KCP/KK" />
                        <!-- error message untuk cabang -->
                        @error('cabang')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="row">

                        <div class="col">

                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <select id="jabatan" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
                                    <option value="">Pilih Jabatan</option>
                                    <option value="Manager" {{ old('jabatan') == 'Manager' ? 'selected' : '' }}>Manager</option>
                                    <option value="Staff" {{ old('jabatan') == 'Staff' ? 'selected' : '' }}>Staff</option>
                                    <option value="Intern" {{ old('jabatan') == 'Intern' ? 'selected' : '' }}>Intern</option>
                                </select>
                                <!-- error message untuk jabatan -->
                                @error('jabatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                        <div class="col">

                            <div class="form-group">
                                <label for="no_tlp">No. Telepon / Ext</label>
                                <input type="text" id="no_tlp" name="no_telp"
                                    class="form-control @error('no_tlp') is-invalid @enderror" value="{{ old('no_tlp') }}"
                                    placeholder="Masukan No. Telepon Anda" />
                                <!-- error message untuk no_tlp -->
                                @error('no_tlp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>

                    </div>


                    <div class="form-group">
                        <label for="alasan">Alasan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alasan"></textarea>
                        <!-- error message untuk alasan -->
                        @error('alasan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pendaftaran">Pendaftaran</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pendaftaran" id="inlineRadio1" value="pengaktifan" {{ old('pendaftaran') == 'pengaktifan' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio1">Pengaktifan</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pendaftaran" id="inlineRadio2" value="penghapusan" {{ old('pendaftaran') == 'penghapusan' ? 'checked' : '' }}>
                            <label class="form-check-label" for="inlineRadio2">Penghapusan</label>
                        </div>

                        <!-- error message untuk pendaftaran -->
                        @error('pendaftaran')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- end data koneksi -->
                    <!-- submit -->
                    <div class="button-group">
                        <input type="submit" value="Simpan" class="btn btn-primary" />
                        <input type="reset" value="Reset" class="btn btn-warning" />
                        <a href="{{ url('admin/dashboard') }}" class="btn btn-success">Kembali</a>
                    </div>

                    <!-- end submit -->
                </div>
            </div>
        </form>
    </div>
    <!-- footer -->
    <footer>
        <div class="row">
            <div class="col-md-4">
                <h5>Kantor Pusat</h5>
                <ul>
                    <li>Menara Bank BJB</li>
                    <li>Jl. Naripan No. 12-14</li>
                    <li>Bandung 40111</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Hubungi Kami</h5>
                <a href="#">
                    <p>14049</p>
                </a>
            </div>
            <div class="col-md-4">
                <h5>Media Sosial</h5>
                <ul>
                    <li>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- end footer -->
</body>

</html>
