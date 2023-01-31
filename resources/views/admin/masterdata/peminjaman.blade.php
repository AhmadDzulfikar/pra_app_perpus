@extends('layouts.master')
@section('content')
    @if (session('status'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-9">
            <h4>Data Peminjaman Buku E - Perpus</h4>
        </div>
        <div class="col-3">
            <a href="{{ Route('user.form_peminjaman') }}" class="btn btn-primary float">Pinjam</a>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>tgl Peminjaman</th>
                            <th>tgl Pengembalian</th>
                            <th>Kondisi Dipinjam</th>
                            <th>Kondisi Dikembalikan</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->user->username }}</td>
                                <td>{{ $p->buku->judul }}</td>
                                <td>{{ $p->tgl_peminjaman }}</td>
                                <td>{{ $p->tgl_pengembalian }}</td>
                                <td>{{ $p->kondisi_buku_saat_dipinjam }}</td>
                                <td>{{ $p->kondisi_buku_saat_dikembalikan }}</td>
                                <td>{{ $p->denda }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    </div>
@endsection
