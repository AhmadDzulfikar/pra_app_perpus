@extends('layouts.master')
@section('content')
    @if (session('status'))
        <div class="alert alert-{{ session('status') }}alert-dismissible fade show" role="alert">
            {{ session('message') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert">
                aria-label="Close"
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-9">
            <h3>Pesan Masuk</h3>
            <p class="text-subtitle text-muted">Pesan Dari Admin</p>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">

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
                                <td>{{ $p->status == 'terkirim' ? 'Belum Dibaca' : 'Terbaca' }}</td>
                                <td>{{ $p->tgl_kirim }}</td>
                                <td>
                                    @if ($p->status == 'terkirim')
                                        <form action="{{ route('admin.ubah_status', ['id' => $p->id]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="penerima_id" value="{{ Auth::user()->id }}">
                                            <button type="submit" class="btn btn-success">
                                                <i class="bi bi-check-lg"></i>
                                            </button>
                                        </form>
                                    @else
                                        <button class="btn btn-primary"><i class="bi bi-check2-all"></i></button>
                                    @endif
                                </td>
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
