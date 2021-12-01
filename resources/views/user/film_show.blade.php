@extends('layout.main-user')

@section('title','Film Review')

@section('content')

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-8 mx-auto">
                <div class="list-group">
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col px-4 pt-4 pb-4 text-center">
                                <div>
                                    <h3>{{ $row->judul }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row">
                            <div class="col-md-12 text-center pb-3">
                                <img class="img-fluid" src="{{ asset('style/pict/'.$row->foto) }}" alt="Photo" class="col-md-12">
                            </div>
                            <div class="col-md-12 px-4 pt-4 border-top">
                                <div>
                                    <div class="float-right">{{ $row->genre }}</div>
                                    <h3>{{ $row->judul }}</h3>
                                    <p class="mb-0">{{ $row->sinopsis }}</p>
                                </div>
                            </div>
                            <div class="col-md-12 px-4 pt-4 border-top mt-3">
                                <div>
                                    <form action="{{ url('film/'.$row->id) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="hidden" name="id_film" value="{{ $row->id }}">
                                            <input type="text" name="nama" id="nama" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="rating">Rating</label> <small>( 1-10 )</small>
                                            <input type="number" name="rating" id="rating" min="1" max="10" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="komentar">Komentar</label>
                                            <textarea name="komentar" id="komentar" cols="3" rows="3" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group text-right">
                                            <button class="btn btn-success btn-sm"> Submit <i class="fas fa-paper-plane"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item pt-3">
                        <h5>Komentar</h5>
                        @foreach ($komen as $item)
                            <div class="row pb-2">
                                <div class="col-md-12 px-4 pt-4 border-top">
                                    <div>
                                        <div class="float-right">Rating : {{ $item->rating }}</div>
                                        <h6>{{ $item->nama }}</h6>
                                        <p class="mb-0"><?=$item->komentar?></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
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
