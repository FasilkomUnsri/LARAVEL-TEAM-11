@extends('layout.main-user')

@section('title','Film')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
        <h2 class="text-center display-4">Search</h2>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="/">
                    <div class="input-group input-group-lg">
                        <input type="search" name="search" class="form-control form-control-lg" placeholder="Cari Judul Film disini" value="{{ @$_GET['search'] }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-10 offset-md-1">
                <div class="list-group">
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col px-4 pt-4 pb-4">
                                <div>
                                    <h3>DAFTAR FILM</h3>
                                    <p class="mb-0">Daftar - daftar film, dan silahkan review</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($data as $item)  
                        <div class="list-group-item">
                            <div class="row">
                                <div class="col-auto">
                                    <img class="img-fluid" src="{{ asset('style/pict/'.$item->foto) }}" alt="Photo" style="max-height: 160px;">
                                </div>
                                <div class="col px-4">
                                    <div>
                                        <div class="float-right">{{ $item->genre }}</div>
                                        <h3>{{ $item->judul }}</h3>
                                        <p class="mb-0">{{ $item->sinopsis }}</p>
                                        <div class="text-right">
                                            <a href="{{ url('film/'.$item->id) }}" class="btn btn-primary btn-sm"> Selengkapnya <i class="fas fa-arrow-right"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
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
                    window.location.href = "{{ url('admin/film/delete') }}/"+id;
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
