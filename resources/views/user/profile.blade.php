@extends('layouts.master')

@section('content')
    <div class="row">
        @if (session('status'))
            <div class="alert alert-{{ session('status') }}" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <div class="mb-3">
            <center>
                <h3>Profil Saya</h3>
            </center>
        </div>
        <div class="mb-3">
            <center>
                <img src="{{ Auth::user()->foto == null ? 'profile.png' : Auth::user()->foto }}" class="rounded-circle"
                    style="width: 150px;" alt="Avatar" />

            </center>

        </div>
        <form action="{{ Route('user.gambar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h4>Update Profile</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table bordered">
                        <tr>
                            <th>Foto</th>
                            <td>
                                <input type="file" class="form-control" name="foto">
                            </td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>
                                <input class="form-control" type="text" name="fullname"
                                    value="{{ Auth::user()->fullname }}">
                            </td>
                        </tr>

                        <tr>
                            <th>Username</th>
                            <td>
                                <input class="form-control" type="text" name="username"
                                    value="{{ Auth::user()->username }}">
                            </td>
                        </tr>

                        <tr>
                            <th>NIS</th>
                            <td>
                                <input class="form-control" type="text" name="nis" value="{{ Auth::user()->nis }}">
                            </td>
                        </tr>

                        <tr>
                            <th>Alamat</th>
                            <td>
                                <textarea name="alamat" class="form-control">{{ Auth::user()->alamat }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td>
                                <input class="form-control" type="password" name="password"
                                    placeholder="Sandi belum dirubah" autocomplete="" required>
                            </td>
                        </tr>

                        <tr>
                            <th>Kelas</th>
                            <td>
                                <input class="form-control" type="text" name="kelas" value="{{ Auth::user()->kelas }}">
                            </td>
                        </tr>

                    </table>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    @endsection
