@extends('layouts.master')
@section('content')
    @if (session('status'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-9">
            <h4>Buku yang sudah dikembalikan</h4>
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
                            <th>Judul Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Kondisi Dipinjam</th>
                            <th>Kondisi Dikembalikan</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($judul as $key => $peminjaman)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $peminjaman->user->username }}</td>
                                <td>{{ $peminjaman->buku->judul }}</td>
                                <td>{{ $peminjaman->tgl_peminjaman }}</td>
                                <td>{{ $peminjaman->tgl_pengembalian }}</td>
                                <td>{{ $peminjaman->kondisi_buku_saat_dipinjam }}</td>
                                <td>{{ $peminjaman->kondisi_buku_saat_dikembalikan }}</td>
                                <td>{{ $peminjaman->denda }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    </div>
@endsection
