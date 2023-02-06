@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Cetak Laporan E - Perpus <span class="" style="color: red">PDF</span> </h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Laporan Peminjaman</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Laporan Pengembalian</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Laporan Siswa</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <br>

                            {{-- Form Peminjaman --}}
                            <form action="{{ route('admin.laporan_peminjaman') }}" method="POST" target="_blank">
                                @csrf
                                <div class="mt-4">
                                    <label for="">Tanggal Peminjaman</label>
                                    <input class="form-control" type="date" name="tgl_peminjaman" id=""
                                        required>
                                </div>
                                <div class="row mt-3">
                                    <button class="btn btn-primary" type="submit">Export to PDF</button>
                                </div>
                            </form>
                        </div>

                        {{-- Form Pengembalian --}}
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <br>

                            <form action="{{ route('admin.laporan_pengembalian') }}" method="POST" target="_blank">
                                @csrf
                                <div class="mt-4">
                                    <label for="">Tanggal Pengembalian</label>
                                    <input class="form-control" type="date" name="tgl_pengembalian" id=""
                                        required>
                                </div>
                                <div class="row mt-3">
                                    <button class="btn btn-danger" type="submit">Export to PDF</button>
                                </div>

                            </form>
                        </div>

                        {{-- Form Siswa --}}
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <br>

                            <form action="{{ route('admin.laporan_user') }}" method="POST" target="_blank">
                                @csrf
                                <div class="col-md-12 mb-4">
                                    <h6>Nama Siswa</h6>
                                    <div class="form-group">
                                        <select name="user_id" class="choices form-select">
                                            @foreach ($anggota as $a)
                                                <option value="{{ $a->id }}">{{ $a->username }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <button class="btn btn-primary" type="submit">Export to PDF</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- CETAK EXCEL --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Cetak Laporan E - Perpus <span class="" style="color:green">Excel</span></h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home1" role="tab"
                                aria-controls="home" aria-selected="true">Laporan Peminjaman</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile1" role="tab"
                                aria-controls="profile" aria-selected="false">Laporan Pengembalian</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact1" role="tab"
                                aria-controls="contact" aria-selected="false">Laporan Siswa</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home-tab">
                            <br>

                            {{-- Form Peminjaman --}}
                            <form action="{{ route('admin.laporan_excel') }}" method="POST" target="_blank">
                                @csrf
                                <div class="mt-4">
                                    <label for="">Tanggal Peminjaman</label>
                                    <input class="form-control" type="date" name="tgl_peminjaman" id=""
                                        required>
                                </div>
                                <div class="row mt-3">
                                    <button class="btn btn-success" type="submit">Export to Excel</button>
                                </div>
                            </form>
                        </div>

                        {{-- Form Pengembalian --}}
                        <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab">
                            <br>

                            <form action="{{ route('admin.excel_pengembalian') }}" method="POST" target="_blank">
                                @csrf
                                <div class="mt-4">
                                    <label for="">Tanggal Pengembalian</label>
                                    <input class="form-control" type="date" name="tgl_pengembalian" id=""
                                        required>
                                </div>
                                <div class="row mt-3">
                                    <button class="btn btn-success" type="submit">Export to Excel</button>
                                </div>

                            </form>
                        </div>

                        {{-- Form Siswa --}}
                        <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab">
                            <br>

                            <form action="{{ route('admin.excel_user') }}" method="POST" target="_blank">
                                @csrf
                                <div class="col-md-12 mb-4">
                                    <h6>Nama Siswa</h6>
                                    <div class="form-group">
                                        <select name="user_id" class="choices form-select">
                                            @foreach ($anggota as $a)
                                                <option value="{{ $a->id }}">{{ $a->username }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <button class="btn btn-success" type="submit">Export to Excel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
