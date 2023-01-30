@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form action="{{ route('user.register') }}" method="POST">

                            @csrf

                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="number" class="form-control form-control-xl" placeholder="NIS" name="nis"
                                    required>
                                <div class="form-control-icon">
                                    <i class="bi bi-alexa"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" class="form-control form-control-xl" placeholder="Fullname"
                                    name="fullname" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person-plus"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text"
                                    class="form-control form-control-xl @error('username') is-invalid @enderror"
                                    placeholder="Username" name="username" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="password" class="form-control form-control-xl" placeholder="Password"
                                    autocomplete="new-password" required name="password">
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" class="form-control form-control-xl" placeholder="Kelas" required
                                    name="kelas">
                                <div class="form-control-icon">
                                    <i class="bi bi-building"></i>
                                </div>
                            </div>
                            {{-- <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Alamat" required
                                name="alamat">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div> --}}
                            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
