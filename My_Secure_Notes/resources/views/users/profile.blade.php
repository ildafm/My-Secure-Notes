@extends('master.master')

@section('content')
    <div class="pagetitle">
        <h1>Notes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Notes</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            {{-- left card --}}
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="../template/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <h2>{{ $user_profile->name }}</h2>
                        {{-- <h3>Web Designer</h3> --}}
                        {{-- <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div> --}}
                    </div>
                </div>

            </div>

            {{-- right card --}}
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            {{-- edit profile --}}
                            <li class="nav-item {{ $oldPane == 'general' ? 'active' : '' }}">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>

                            {{-- change password --}}
                            <li class="nav-item {{ $oldPane == 'password' ? 'active' : '' }}">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            {{-- tab pane edit profile --}}
                            <div class="tab-pane fade profile-edit pt-3 {{ $oldPane == 'general' ? 'active show' : '' }}"
                                id="profile-edit">

                                {{-- input session message --}}
                                @if (session()->has('pesan_success_edit'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="bi bi-check-circle me-1"></i>
                                        {{ session()->get('pesan_success_edit') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @elseif(session()->has('pesan_error_edit'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-octagon me-1"></i>
                                        {{ session()->get('pesan_error_edit') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif

                                <!-- Profile Edit Form -->
                                <form
                                    action="{{ route('profile_edit', ['user_id' => $user_profile->id, 'edit_mode' => 'general']) }}"
                                    onsubmit="document.getElementById('btn_submit_general').disabled = true" method="POST">
                                    @method('PUT')
                                    @csrf

                                    {{-- email --}}
                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="text" class="form-control" id="email"
                                                value="{{ $user_profile->email }}" disabled>
                                        </div>
                                    </div>

                                    {{-- username --}}
                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name"
                                                value="{{ $user_profile->name }}" placeholder="Maximal 255 Karakter"
                                                maxlength="255">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button id="btn_submit_general" type="submit" class="btn btn-primary">Save
                                            Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            {{-- tab pane change password --}}
                            <div class="tab-pane fade pt-3 {{ $oldPane == 'password' ? 'active show' : '' }}"
                                id="profile-change-password">
                                <!-- Change Password Form -->
                                <form
                                    action="{{ route('profile_edit', ['user_id' => $user_profile->id, 'edit_mode' => 'password']) }}"
                                    method="POST"
                                    onsubmit="document.getElementById('btn_submit_password').disabled = true">
                                    @method('PUT')
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="current_password" type="password"
                                                class="form-control @error('current_password') is-invalid @enderror"
                                                required id="currentPassword">
                                        </div>
                                        @error('current_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" required
                                                class="form-control @error('password') is-invalid @enderror" id="password">
                                        </div>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                            New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password_confirmation" type="password" required
                                                class="form-control @error('password_confirmation')
                                                is-invalid
                                            @enderror"
                                                id="password_confirmation">
                                        </div>
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="text-center">
                                        <button id="btn_submit_password" type="submit" class="btn btn-primary">Change
                                            Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
