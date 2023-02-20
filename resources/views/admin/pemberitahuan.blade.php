@extends('layouts.master')
@section('content')
    @if (session('status'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-9">
            <h4>Pemberitahuan Perpustakaan</h4>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn shadow btn-primary mb-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal"><i class="bi bi-send"></i>
                    Tambah Pemberitahuan
                </button>
                <!-- Modal ADD DATA -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ Route('admin.tambah_pemberitahuan') }}" enctype="multipart/form-data"
                                method="POST" autocomplete="off">
                                @csrf
                                <div class="modal-body">
                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Isi</label>
                                            <input type="text" class="form-control" name="isi"
                                                placeholder="Isi Pemberitahuan" required />
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <select class="form-select" name="status" id="">
                                            <option value="" disabled selected>--PILIH OPSI--</option>
                                            <option value="aktif">Aktif</option>
                                            <option value="nonaktif">Nonaktif</option>
                                        </select>
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
                @foreach ($pemberitahuan as $p)
                    <div class="modal fade" id="update-penerbit{{ $p->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.update_pemberitahuan', $p->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">isi</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="" name="isi" value="{{ $p->isi }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label>Status</label>
                                            <select class="form-select" name="status" id="">
                                                <option value="" disabled selected>--PILIH OPSI--</option>
                                                <option value="aktif">Aktif</option>
                                                <option value="nonaktif">Nonaktif</option>
                                            </select>
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
                @foreach ($pemberitahuan as $p)
                    <div class="modal fade modal-borderless" id="hapus-penerbit{{ $p->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ url('/admin/hapus/pemberitahuan/' . $p->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-body">
                                        <center class="mt-3">
                                            <p>
                                                apakah anda yakin ingin menghapus Pemberitahuan ini?
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
                            <th>Isi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemberitahuan as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->isi }}</td>
                                <td>{{ $p->status }}</td>
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
