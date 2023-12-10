@extends('master.master')
@section('content')
    <div class="pagetitle">
        <h1>My Books</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">My Books</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            {{-- data tabel --}}
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Semua catatan saya</h5>

                        {{-- delete session message --}}
                        @if (session()->has('pesan_success_delete'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                {{ session()->get('pesan_success_delete') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @elseif(session()->has('pesan_error_delete'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-octagon me-1"></i>
                                {{ session()->get('pesan_error_delete') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Theme</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($notes) > 0)
                                    @php
                                        $nomor = 1;
                                    @endphp
                                    @foreach ($notes as $item)
                                        <tr>
                                            <td>{{ $nomor++ }}</td>
                                            <td>{{ $item->theme }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('my-books.show', ['my_book' => $item->id]) }}"><i
                                                        class="bi bi-info-circle"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3"><i>Kamu belum membuat catatan apapun</i></td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
            {{-- end data tablel --}}

            {{-- recent activity --}}
            <div class="col-lg-4">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Aktivitas terbaru</h5>

                        <div class="activity">

                            @if (count($recent_activity) > 0)
                                @foreach ($recent_activity as $item)
                                    @php
                                        $history_time = 0;
                                        $item_time = 0;

                                        if ($item->deleted_at != null) {
                                            $item_time = strtotime($item->deleted_at);
                                        } elseif ($item->created_at == $item->updated_at) {
                                            $item_time = strtotime($item->created_at);
                                        } elseif ($item->created_at != $item->updated_at) {
                                            $item_time = strtotime($item->updated_at);
                                        } else {
                                            $item_time = 0;
                                        }

                                        $current_time = time();

                                        $history_time = $current_time - $item_time;

                                        $thisItemTime = 0;
                                        $param = 'sec';
                                        // masih dalam hitungan detik
                                        if ($history_time < 60) {
                                            $thisItemTime = $history_time;
                                            $param = 'sec';
                                            $final_time = "$thisItemTime $param";
                                        }
                                        // jika sudah lewat 1 menit (60) detik
                                        elseif ($history_time < 3600) {
                                            $thisItemTime = floor($history_time / 60);
                                            $param = 'min';
                                            $final_time = "$thisItemTime $param";
                                        }
                                        // Jika sudah lewat 1 jam (3600 detik)
                                        elseif ($history_time < 86400) {
                                            $thisItemTime = floor($history_time / 3600);
                                            $param = 'hour';
                                            $final_time = "$thisItemTime $param";
                                        }
                                        // Jika sudah lewat 1 hari (86400 detik)
                                        elseif ($history_time < 604800) {
                                            $thisItemTime = floor($history_time / 86400);
                                            $param = 'day';
                                            $final_time = "$thisItemTime $param";
                                        }
                                        // Jika sudah lewat 1 minggu (604800 detik)
                                        else {
                                            $thisItemTime = floor($history_time / 604800);
                                            $param = 'week';
                                            $final_time = "$thisItemTime $param";
                                        }
                                    @endphp

                                    @if ($item->deleted_at != null)
                                        <div class="activity-item d-flex">
                                            <div class="activite-label">{{ $final_time }}</div>
                                            <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                            <div class="activity-content">
                                                Menghapus Catatan <a href="#"
                                                    class="fw-bold text-dark">{{ $item->theme }}</a>
                                            </div>
                                        </div>
                                        {{-- Jika aktivitas tersebut baru ditambahkan --}}
                                    @elseif ($item->created_at == $item->updated_at)
                                        <div class="activity-item d-flex">
                                            <div class="activite-label">{{ $final_time }}</div>
                                            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                            <div class="activity-content">
                                                Menambahkan Catatan <a href="#"
                                                    class="fw-bold text-dark">{{ $item->theme }}</a>
                                            </div>
                                        </div>
                                    @elseif ($item->created_at != $item->updated_at)
                                        <div class="activity-item d-flex">
                                            <div class="activite-label">{{ $final_time }}</div>
                                            <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                            <div class="activity-content">
                                                Mengubah Catatan <a href="#"
                                                    class="fw-bold text-dark">{{ $item->theme }}</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="activity-item d-flex">
                                            <div class="activite-label">zero</div>
                                            <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                            <div class="activity-content">
                                                <i>Kesalahan pengambilan data</i>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <p><i>Tidak ada aktivitas terbaru</i></p>
                            @endif



                        </div>

                    </div>
                </div>

            </div>
            {{-- end recent activity --}}
        </div>
    </section>
@endsection
