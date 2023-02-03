@extends('layouts.master')
@section('content')
    @if (session('status'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-9">
            <h4>Data Buku E - Perpus</h4>
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
                    Tambah Buku
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
                            <form action="{{ Route('admin.tambah_buku') }}" enctype="multipart/form-data" method="POST"
                                autocomplete="off">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Judul Buku</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder=""
                                            name="judul" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Kategori</label>
                                        <select name="kategori_id" id="" class="form-select">

                                            <option>Pilih Opsi</option>

                                            @foreach ($kategori as $k)
                                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Penerbit</label>
                                        <select name="penerbit_id" id="" class="form-select">

                                            <option>Pilih Opsi</option>

                                            @foreach ($penerbit as $p)
                                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Pengarang</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder=""
                                            name="pengarang" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Tahun Terbit</label>
                                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder=""
                                            name="tahun_terbit" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Isbn</label>
                                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder=""
                                            name="isbn" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">jumlah buku baik</label>
                                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder=""
                                            name="j_buku_baik" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">jumlah buku rusak</label>
                                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder=""
                                            name="j_buku_rusak" required>
                                    </div>

                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label>Upload Gambar Buku</label>
                                            <input type="file" class="form-control" name="foto"
                                                placeholder="Gambar" />
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
                @foreach ($buku as $b)
                    <div class="modal fade" id="update-buku{{ $b->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.update.buku', $b->id) }}" enctype="multipart/form-data"
                                    method="post">
                                    @csrf
                                    @method('put')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Judul Buku</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="" name="judul" value="{{ $b->judul }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Kategori</label>
                                            <select name="kategori_id" id="" class="form-select">

                                                @foreach ($kategori as $k)
                                                    <option value="{{ $k->id }}" {{ $k->id === $b->kategori_id ? 'selected' : '' }}>{{ $k->nama }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Penerbit</label>
                                            <select name="penerbit_id" id="" class="form-select">

                                                @foreach ($penerbit as $k)
                                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Pengarang</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="" name="pengarang" value="{{ $b->pengarang }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Tahun Terbit</label>
                                            <input type="number" class="form-control" id="formGroupExampleInput"
                                                placeholder="" name="tahun_terbit" value="{{ $b->tahun_terbit }}"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">Isbn</label>
                                            <input type="number" class="form-control" id="formGroupExampleInput"
                                                placeholder="" name="isbn" value="{{ $b->isbn }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">jumlah buku baik</label>
                                            <input type="number" class="form-control" id="formGroupExampleInput"
                                                placeholder="" name="j_buku_baik" value="{{ $b->j_buku_baik }}"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">jumlah buku
                                                rusak</label>
                                            <input type="number" class="form-control" id="formGroupExampleInput"
                                                placeholder="" name="j_buku_rusak" value="{{ $b->j_buku_rusak }}"
                                                required>
                                        </div>

                                        <div class="col-12 mb-4">
                                            <div class="form-group">
                                                <label>Upload Gambar Buku</label>
                                                <input type="file" class="form-control" name="foto"
                                                    placeholder="Gambar" />
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
                @endforeach
                {{-- Modal EDIT --}}


                {{-- Modal DELETE --}}
                @foreach ($buku as $p)
                    <div class="modal fade modal-borderless" id="hapus-penerbit{{ $p->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action={{ url('/admin/hapus/buku/' . $p->id) }} method="POST"
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
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penerbit</th>
                            <th>Pengarang</th>
                            <th>Tahun Terbit</th>
                            <th>Isbn</th>
                            <th>Jml Buku Baik</th>
                            <th>Jml Buku Rusak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku as $b)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="align-middle">
                                    <img src="{{ $b->foto ?? '/assets/images/not-found.png' }}" alt=""
                                        width="100" height="100">
                                </td>
                                <td>{{ $b->judul }}</td>
                                <td>{{ $b->kategori->nama }}</td>
                                <td>{{ $b->penerbit->nama }}</td>
                                <td>{{ $b->pengarang }}</td>
                                <td>{{ $b->tahun_terbit }}</td>
                                <td>{{ $b->isbn }}</td>
                                <td>{{ $b->j_buku_baik }}</td>
                                <td>{{ $b->j_buku_rusak }}</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#update-buku{{ $b->id }}"><i
                                            class="bi bi-pencil-square"></i></button>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#hapus-penerbit{{ $b->id }}"><i
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
