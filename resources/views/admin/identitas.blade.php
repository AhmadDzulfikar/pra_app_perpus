@extends('layouts.master')
@section('content')
    <div class="mb-3">
        <center>
            <h3>Identitas Aplikasi</h3>
        </center>
    </div>
    <div class="mb-3">
        <center>
            <img src="{{ $identitas->foto }}" class="rounded-circle" style="width: 150px;" alt="Avatar" />

        </center>

    </div>

    <form class="form form-vertical" action="{{ url('admin/edit/identitas') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Identitas Aplikasi</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table bordered">
                    <tr>
                        <th>Foto</th>
                        <td>
                            <input type="file" class="form-control" name="foto" />
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Applikasi</th>
                        <td>
                            <input type="text" class="form-control" name="nama_app" value="{{ $identitas->nama_app }}" />
                        </td>
                    </tr>

                    <tr>
                        <th>Alamat Lengkap</th>
                        <td>
                            <textarea class="form-control" name="alamat_app" id="exampleFormControlTextarea1" rows="3">{{ $identitas->alamat_app }}</textarea>
                        </td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>
                            <input type="email" class="form-control" name="email_app"
                                value="{{ $identitas->email_app }}" />
                        </td>
                    </tr>

                    <tr>
                        <th>No Telp</th>
                        <td>
                            <input type="number" class="form-control" name="nomor_hp" value="{{ $identitas->nomor_hp }}" />
                        </td>
                    </tr>

                </table>

                <div class="col-12 d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary me-1 mb-1">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </form>
    </div>
    </div>
    </div>
@endsection
