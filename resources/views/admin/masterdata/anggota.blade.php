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
                    Tambah Anggota
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
                            <form action={{ route('admin.tambah_anggota') }} enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Kode Anggota</label>
                                        <input type="text" class="form-control" name="kode"
                                            value="{{ $kode }}" readonly />
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>NIS</label>
                                            <input type="text" class="form-control" name="nis" placeholder="NIS"
                                                required />
                                        </div>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username"
                                                placeholder="Username" required aria-autocomplete="none" />
                                        </div>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Fullname</label>
                                            <input type="text" class="form-control" name="fullname"
                                                placeholder="Fullname" required />
                                        </div>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Password" required autocomplete="new-password" />
                                        </div>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <input type="text" class="form-control" name="kelas" placeholder="Kelas"
                                                required />
                                        </div>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="3" name="alamat"></textarea>
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
                @foreach ($anggota as $a)
                    <div class="modal fade" id="update-anggota{{ $a->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ url('/admin/edit/anggota/' . $a->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="modal-body">

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">nis</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="" name="nis" value="{{ $a->nis }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="" name="fullname" value="{{ $a->fullname }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">username</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="" name="username" value="{{ $a->username }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">kelas</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="" name="kelas" value="{{ $a->kelas }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">alamat</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="" value="{{ $a->alamat }}" name="alamat" required>
                                        </div>

                                        {{-- <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">status</label>
                                            <select name="verif_id" class="form-select" required>
                                                <option value="" disabled selected>-- pilih opsion</option>
                                                <option value="verified">verified</option>
                                                <option value="unverified">unverified</option>
                                            </select>
                                        </div> --}}

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
                @foreach ($anggota as $a)
                    <div class="modal fade modal-borderless" id="hapus-anggota{{ $a->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action={{ url('/admin/hapus/anggota/' . $a->id) }} method="POST"
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
                            <th>Kode</th>
                            <th>Nis</th>
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>Verif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota as $a)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $a->kode }}</td>
                                <td>{{ $a->nis }}</td>
                                <td>{{ $a->username }}</td>
                                <td>{{ $a->fullname }}</td>
                                <td>{{ $a->kelas }}</td>
                                <td>{{ $a->alamat }}</td>

                                <td class="align-middle">
                                    <form action="{{ route('admin.update_status', $a->id) }}" method="POST"
                                        style="display: inline-block">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="{{ $a->verif }}" name="verif">
                                        <button type="submit"
                                            class="btn btn-{{ $a->verif == 'verified' ? 'success' : 'danger' }}">
                                            {{ $a->verif }}
                                        </button>
                                    </form>
                                </td>

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
