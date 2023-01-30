@extends('layouts.master')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Cetak Laporan</h5>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Peminjaman</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Pengembalian</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false">Siswa</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <br>
                        <div class="col-md-6 mb-4">
                            <h6>Basic Choices</h6>
                            <p>Use <code>.choices</code> class for basic choices control.</p>
                            <div class="form-group">
                                <select class="choices form-select">
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        Integer interdum diam eleifend metus lacinia, quis gravida eros mollis. Fusce non sapien
                        sit amet magna dapibus
                        ultrices. Morbi tincidunt magna ex, eget faucibus sapien bibendum non. Duis a mauris ex.
                        Ut finibus risus sed massa
                        mattis porta. Aliquam sagittis massa et purus efficitur ultricies. Integer pretium dolor
                        at sapien laoreet ultricies.
                        Fusce congue et lorem id convallis. Nulla volutpat tellus nec molestie finibus. In nec
                        odio tincidunt eros finibus
                        ullamcorper. Ut sodales, dui nec posuere finibus, nisl sem aliquam metus, eu accumsan
                        lacus felis at odio. Sed lacus
                        quam, convallis quis condimentum ut, accumsan congue massa. Pellentesque et quam vel
                        massa pretium ullamcorper vitae eu
                        tortor.
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <br>
                        <div class="col-md-12 mb-4">
                            <h6>Nama Siswa</h6>
                            <div class="form-group">
                                <select class="choices form-select">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                        <button class="btn btn-primary" type="submit">P D F</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
