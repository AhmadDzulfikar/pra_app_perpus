@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col">
            @foreach ($pemberitahuans as $pemberitahuan)
                <div class="alert alert-primary" role="alert">
                    {{ $pemberitahuan->isi }}
                </div>
            @endforeach

            <div class="row">
                @foreach ($kategori as $k)
                    @if ($k->bukus->count() < 1)
                        {{ null }}
                    @else
                        <div class="col-12">
                            <h4>
                                <span class="badge bg-light-danger">{{ $k->nama }}</span>
                            </h4>
                            <div class="row d-flex flex-row flex-nowrap overflow-auto">
                                @foreach ($k->bukus as $buku)
                                    <div class="col-xl-3 col-md-3 col-sm-3">
                                        <div class="card"style="max-height:500px; min-height:425px">
                                            <div class="card-header">
                                                <img src="{{ $buku->foto ?? '/assets/images/not-found.png' }}"
                                                    style="height: 150px;object-fit: cover;" class="card-img"
                                                    alt="....">
                                            </div>
                                            <div class="card-body">
                                                <h4 style="font-size: 24px; font-weight: bold">
                                                    {{ $buku->judul }}
                                                </h4>
                                                <span class="badge bg-secondary">{{ $buku->kategori->nama }}
                                                </span>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="text-start">
                                                            {{ $buku->pengarang }}
                                                        </p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="text-end">{{ $buku->penerbit->nama }}</p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="card-footer">
                                                <form method="POST" action="{{ route('user.form_peminjaman_dashboard') }}">
                                                    @csrf
                                                    <input type="hidden" value="{{ $buku->id }}" name="buku_id">
                                                    <button type="submit" class="btn btn-primary">Pinjam</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            {{-- <h1>yes

    </h1> --}}
        @endsection
