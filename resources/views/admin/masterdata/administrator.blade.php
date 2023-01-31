    @extends('layouts.master')
    @section('content')
        @if (session('status'))
            <div class="alert alert-{{ session('status') }}">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-9">
                <h4>Data Anggota E - Perpus</h4>
            </div>
            <div class="col-3">
                <a href="{{ Route('user.form_peminjaman') }}" class="btn btn-primary float">Pinjam</a>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn shadow btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"><i class="bi bi-send"></i>
                        Tambah Administrator
                    </button>
                    <!-- Modal ADD DATA -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peserta Didik</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action={{ route('admin.tambah_admin') }} enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" name="fullname"
                                                placeholder="Nama Lengkap" />
                                        </div>
                                    </div>
        
                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Nama Pengguna</label>
                                            <input type="text" class="form-control" name="username"
                                                placeholder="Nama Pengguna" required />
                                        </div>
                                    </div>
        
                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Password"
                                                required autocomplete="new-password" />
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                    <!-- Modal ADD DATA -->

                    {{-- Modal EDIT  --}}
                @foreach ($admin as $a)
                <div class="modal fade" id="update-anggota{{ $a->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ url('/admin/edit/admin/' . $a->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Fullnamep</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="" name="fullname" value="{{ $a->fullname }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">username</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="" name="username" value="{{ $a->username }}" required>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- Modal EDIT --}}


                    {{-- Modal DELETE --}}
                    @foreach ($admin as $a)
                    <div class="modal fade modal-borderless" id="hapus-anggota{{ $a->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action={{ url('/admin/hapus/admin/' . $a->id) }} method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-body">
                                        <center class="mt-3">
                                            <p>
                                                apakah anda yakin ingin menghapus data ini?
                                            </p>

                                        </center>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tidak</button>
                                        <button type="submit" class="btn btn-danger">Hapus!</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                    {{-- Modal Delete --}}

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Terakhir Login</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admin as $a)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $a->fullname }}</td>
                                    <td>{{ $a->username }}</td>
                                    <td>{{ $a->password }}</td>
                                    <td>{{ $a->terakhir_login }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#update-anggota{{ $a->id }}"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapus-anggota{{ $a->id }}"><i
                                                class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        </div>
    @endsection
