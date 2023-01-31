    @extends('layouts.master')
    @section('content')
        @if (session('status'))
            <div class="alert alert-{{ session('status') }}">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-9">
                <h4>Data Penerbit E - Perpus</h4>
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
                        Tambah Penerbit
                    </button>
                    <!-- Modal ADD DATA -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penerbit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ Route('admin.tambah_penerbit') }}" enctype="multipart/form-data"
                                    method="POST" autocomplete="off">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Kode Penerbit</label>
                                            <input type="text" class="form-control" name="kode"
                                                value="{{ $kode }}" readonly />
                                        </div>

                                        <div class="col-12 mb-4">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" name="nama"
                                                    placeholder="Nama Penerbit" required />
                                            </div>
                                        </div>

                                        <div class="col-12 mb-4">
                                            <div class="form-group">
                                                <label>Status Penerbit</label>
                                                <select class="form-select" required name="verif">
                                                    <option value="" disabled selected>--Pilih Opsi--</option>
                                                    <option value="unverified">Unverified</option>
                                                    <option value="verified">Verified</option>
                                                </select>
                                            </div>
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
                    <!-- Modal ADD DATA -->

                    {{-- Modal EDIT  --}}
                    @foreach ($penerbit as $p)
                        <div class="modal fade" id="update-penerbit{{ $p->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin.update_penerbit', $p->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="formGroupExampleInput" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="formGroupExampleInput"
                                                    placeholder="" name="nama" value="{{ $p->nama }}" required>
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
                    @foreach ($penerbit as $p)
                        <div class="modal fade modal-borderless" id="hapus-penerbit{{ $p->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action={{ url('/admin/hapus/penerbit/' . $p->id) }} method="POST"
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
                                <th>Nama Penerbit</th>
                                <th>Verif</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penerbit as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->kode }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td class="align-middle">
                                        <form action="{{ route('admin.update_status_penerbit', $p->id) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            <input type="hidden" value="{{ $p->verif }}" name="verif">
                                            <button type="submit"
                                                class="btn shadow btn-outline-{{ $p->verif == 'verified' ? 'success' : 'danger' }}">
                                                {{ $p->verif }}
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#update-penerbit{{ $p->id }}"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapus-penerbit{{ $p->id }}"><i
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
