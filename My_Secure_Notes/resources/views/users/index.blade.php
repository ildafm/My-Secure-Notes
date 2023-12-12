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

    <section class="section">
        {{-- Datatables Users --}}
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar users yang terdaftar</h5>

                {{-- delete session message --}}
                @if (session()->has('pesan_success_delete'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{ session()->get('pesan_success_delete') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session()->has('pesan_error_delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        {{ session()->get('pesan_error_delete') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Verified</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) > 0)
                            @php
                                $nomor = 1;
                            @endphp
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $nomor++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    {{-- status terverifikasi --}}
                                    <td>
                                        @if ($item->email_verified_at)
                                            {{-- jika terverifikasi maka tampilkan status verified --}}
                                            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                                                Verified</span>
                                        @else
                                            {{-- Jika belum terverifikasi tampilkan status unverfied --}}
                                            <span class="badge bg-warning text-dark"><i
                                                    class="bi bi-exclamation-triangle me-1"></i> Not yet</span>
                                        @endif
                                    </td>
                                    {{-- status keaktifan user --}}
                                    <td>
                                        @if ($item->deleted_at)
                                            {{-- jika statusnya adalah terhapus, maka tampilkan deactive  --}}
                                            <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i>
                                                Deactive</span>
                                        @elseif($item->email_verified_at == null)
                                            {{-- jika statusnya adalah belum terverifikasi, maka tampilkan unverified  --}}
                                            <span class="badge bg-warning text-dark"><i
                                                    class="bi bi-exclamation-triangle me-1"></i>
                                                Unverified</span>
                                        @else
                                            {{-- jika statusnya adalah belum terhapus, maka tampilkan unactive  --}}
                                            <span class="badge bg-primary"><i class="bi bi-star me-1"></i> Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- btn detail --}}
                                        <a href="{{ route('profile', ['id' => $item->id]) }}"
                                            title="Buka profile dari pengguna {{ $item->name }}"
                                            class="btn btn-primary btn-sm"><i class="bi bi-info-circle"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6"><i>Tidak ada data user</i></td>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
                <!-- End Table with hoverable rows -->

            </div>
        </div>
    </section>
@endsection
