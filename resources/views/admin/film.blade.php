@extends('layout.main')

@section('title','Film')

@section('breadcrums')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Film</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a>Admin</a></li>
                <li class="breadcrumb-item active">Film</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header pl-3">
            <a href="{{ url('admin/film/add') }}" class="btn btn-primary btn-sm"> <i class="fas fa-user-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <table id="table1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="20px">No</th>
                        <th>Judul</th>
                        <th>Genre</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Sinopsis</th>
                        <th class="text-center" width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->genre }}</td>
                            <td class="text-center">
                                <a href="{{ asset('style/pict/'.$item->foto) }}" target="__blank">
                                    <img src="{{ asset('style/pict/'.$item->foto) }}" alt="" srcset="" width="100px">
                                </a>
                            </td>
                            <td>{{ $item->sinopsis }}</td>
                            <td class="text-center">
                                <a href="{{ url('admin/film/edit/'.$item->id) }}" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i> Edit</a>
                                <button onclick="del({{ $item->id }})" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
