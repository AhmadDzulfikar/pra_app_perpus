@extends('layouts.master')
@section('content')
    @if (session('status'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-9">
            <h3>Pesan Terkirim</h3>
            <p class="text-subtitle text-muted">Kirim Pesan Ke Admin</p>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn shadow btn-primary mb-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal"><i class="bi bi-send"></i>
                    Kirim Pesan
                </button>

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Pengirim</th>
                            <th>Judul Pesan</th>
                            <th>Isi Pesan</th>
                            <th>Status Pesan</th>
                            <th>Tanggal Kirim</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesan as $key => $p)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $p->pengirim->fullname }}</td>
                                <td>{{ $p->judul }}</td>
                                <td>{{ $p->isi }}</td>
                                <td>{{ $p->status }}</td>
                                <td>{{ $p->tgl_kirim }}</td>
                                {{-- <td><button class="btn btn-danger"><i class="bi bi-trash"></i></button></td> --}}
                                {{-- <td><button class="btn btn-success"><i class="bi bi-check-lg"></i></button></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    {{-- </div> --}}
    </div>

@endsection
