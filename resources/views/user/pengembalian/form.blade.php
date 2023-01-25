@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Form Pengembalian buku</h4>
            </div>
            <div class="card-body">
                <form class="form-group" method="POST" action="{{ Route('user.submit_pengembalian') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Judul Buku</label>
                        <select class="form-select" name="buku_id" required>
                            <option value="" disabled selected>--PILIH OPSI--</option>
                            @foreach ($judul as $b)
                                <option value="{{ $b->buku->id }}">
                                    {{ $b->buku->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Pengembalian</label>
                        <input type="date" class="form-control" name="tgl_pengembalian" value="{{ date('Y-m-d') }}"
                            readonly>
                    </div>

                    <div class="mb-3">
                        <label>Kondisi Buku</label>
                        <select class="form-select" name="kondisi_buku_saat_dikembalikan" id="">
                            <option value="" disabled selected>--PILIH OPSI--</option>
                            <option value="baik">Baik</option>
                            <option value="rusak">Rusak (20.000)</option>
                            <option value="hilang">Hilang (50.000)</option>
                        </select>
                    </div>
                    <div class="row mt-3">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                        <button class="btn btn-primary" type="submit">S U B M I T</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
