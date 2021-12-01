@extends('layout.main')

@section('title','Film')

@section('breadcrums')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Film Edit</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Film</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header pl-3">
            <a href="{{ url('admin/film') }}" class="btn btn-warning btn-sm"> <i class="fas fa-arrow-left"></i> Back Menu</a>
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('admin/film/edit') }}" enctype="multipart/form-data" class="col-md-6 mx-auto">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul Film</label>
                    <input type="hidden" name="id" value="{{ $row->id }}">
                    <input type="hidden" name="old_foto" value="{{ $row->foto }}">
                    <input type="text" name="judul" id="judul" value="{{ old('judul')==null?$row->judul:old('judul') }}" class="form-control" placeholder="Judul Film" required>
                </div>
                <div class="form-group">
                    <label for="genre">Genre</label>
                    <input type="genre" name="genre" id="genre" value="{{ old('genre')==null?$row->genre:old('genre') }}" class="form-control" placeholder="Genre Film" required>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" value="{{ old('foto') }}" accept="image/png, image/gif, image/jpeg, image/jpg" class="form-control">
                </div>
                <div class="form-group">
                    <label for="sinopsis">Sinopsis</label>
                    <textarea name="sinopsis" id="sinopsis" cols="30" rows="3" placeholder="Sinopsis" class="form-control" required>{{ old('sinopsis')==null?$row->sinopsis:old('sinopsis') }}</textarea>
                </div>
                <div class="form-group text-right">
                    <button type="reset" class="btn btn-default"><i class="fas fa-undo"></i> Reset</button>
                    <button type="submit" class="btn btn-primary ml-3"><i class="fas fa-paper-plane"></i> Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script>
        function add_sukses(){
            Swal.fire({
                icon: 'success',
                title: ' &nbsp; Tambah Data Berhasil'
            });
        }
    
        function edit_sukses(){
            Swal.fire({
                icon: 'success',
                title: ' &nbsp; Edit Data Berhasil'
            });
        }
    
        function reset_sukses(){
            Swal.fire({
                icon: 'success',
                title: ' &nbsp; Reset Password Berhasil'
            });
        }

        function reset_gagal(){
            Swal.fire({
                icon: 'error',
                title: ' &nbsp; New dan Konfirmasi Password Tidak sesuai, silahkan coba lagi.'
            });
        }

        function delete_sukses(){
            Swal.fire({
                icon: 'success',
                title: ' &nbsp; Hapus Data Berhasil'
            });
        }
        
        function edit(id){
            var username = $('#username'+id).text();
            var nama_lengkap = $('#nama_lengkap'+id).text();
            var email = $('#email'+id).text();
            var hp = $('#hp'+id).text();
            var role = $('#role'+id).text();

            $('#idEdit').val(id);
            $('#usernameEdit').val(username);
            $('#nama_lengkapEdit').val(nama_lengkap);
            $('#emailEdit').val(email);
            $('#hpEdit').val(hp);
            document.getElementById('role'+role).selected = 'selected'
            $('#modalEdit').modal('show');
        }

        function del(id){
            Swal.fire({
            title: 'Apakah anda Yakin?',
            text: "Ingin Menghapus Data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ url('mu/users/delete') }}/"+id;
                }
            });
        }

        function reset(id){
            $('#idReset').val(id);
            $('#modalReset').modal('show');
        }
    </script>

    @if (session('add_sukses'))
        <script>
            add_sukses();
        </script>
    @endif
    @if (session('delete_sukses'))
        <script>
            delete_sukses();
        </script>
    @endif
    @if (session('edit_sukses'))
        <script>
            edit_sukses();
        </script>
    @endif
    @if (session('reset_sukses'))
        <script>
            reset_sukses();
        </script>
    @endif
    @if (session('reset_gagal'))
        <script>
            reset_gagal();
        </script>
    @endif
@endsection
