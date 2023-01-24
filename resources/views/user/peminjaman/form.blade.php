@extends('layouts.master')

@section('content')
        @if (session('status'))
            <div class="alert alert-{{ session('status') }}">
                {{ session('message') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>Form Peminjaman</h4>
            </div>
            <div class="card-body">
                <form class="form-group" method="POST" action="{{ Route('user.submit_peminjaman') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Nama</label>
                        <input class="form-control" name="user_id" readonly value="{{ Auth::user()->username }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label>Pilih Buku</label>
                        <select class="form-select" name="buku_id" required>
                            <option value="" disabled selected>--PILIH OPSI--</option>
                            @foreach ($bukus as $b)
                                <option value="{{ $b->id }}"
                                    {{ isset($buku_id) ? ($buku_id == $b->id ? 'selected' : '') : '' }}>
                                    {{ $b->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Peminjaman</label>
                        <input type="date" class="form-control" name="tgl_peminjaman" readonly value="{{ date('Y-m-d') }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label>Kondisi Buku</label>
                        <select class="form-select" name="kondisi_buku_saat_dipinjam" required>
                            <option value="" disabled selected>--PILIH OPSI--</option>
                            <option value="baik">Baik</option>
                            <option value="rusak">Rusak</option>
                        </select>
                    </div>
                    <div class="row mt-3">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                        <button class="btn btn-primary" type="submit">S U B M I T</button>
                    </div>
            </div>
        </div>
    @endsection
