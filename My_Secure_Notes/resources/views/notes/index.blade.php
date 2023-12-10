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

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="col-12">

                    {{-- Catatan Terbaru --}}
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Catatan Terbaru</h5>

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

                            <table class="table table-hover">
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
                                                    {{-- btn detail --}}
                                                    <a href="{{ route('notes.show', ['note' => $item->id]) }}"
                                                        class="btn btn-primary btn-sm"><i class="bi bi-info-circle"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3"><i>Kamu belum membuat catatan apapun</i></td>
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                            <!-- End Table with hoverable rows -->

                        </div>
                    </div>
                </div><!-- End Catatan Terbaru -->

            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">
                <!-- Buat Catatan Baru -->
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Buat Catatan Baru</h5>

                        {{-- input session message --}}
                        @if (session()->has('pesan_success_input'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-1"></i>
                                {{ session()->get('pesan_success_input') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @elseif(session()->has('pesan_error_input'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-octagon me-1"></i>
                                {{ session()->get('pesan_error_input') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- form penambahan data --}}
                        <form action="{{ route('notes.store') }}" method="POST"
                            onsubmit="document.getElementById('btn_submit').disabled = true;">
                            @csrf

                            <div class="row">
                                {{-- kolom theme --}}
                                <div class="col-12 mb-2">
                                    <label for="theme">Tema Catatan</label>
                                    <input name="theme" type="text"
                                        class="form-control @error('theme') is-invalid @enderror" required maxlength="100"
                                        placeholder="Maximal 100 karakter" required value="{{ old('theme') }}">
                                </div>
                                @error('theme')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                {{-- kolom content --}}
                                <div class="col-12 mb-2">
                                    <label for="content">Content</label>
                                    <textarea name="content" id="" cols="30" rows="7"
                                        class="form-control @error('content') is-invalid @enderror" maxlength="500" required onkeyup="count_up(this);"
                                        placeholder="Maximal 500 karakter">{{ old('content') }}</textarea>
                                    <span class="text-muted pull-right" id="count1">Jumlah karakter:
                                        0/500</span>
                                </div>
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <div class="col-12 mb-2" hidden>
                                    <label for="user_id">ID User</label>
                                    <input class="form-control" type="text" name="user_id" readonly
                                        value="{{ Auth::user()->id }}">
                                </div>

                                {{-- Button simpan --}}
                                <div class="col-12 mt-2">
                                    <button id="btn_submit" type="submit" class="btn btn-success btn-sm">Simpan</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div><!-- End Buat Catatan Baru -->

            </div><!-- End Right side columns -->

        </div>
    </section>

    <script>
        function count_up(obj) {
            document.getElementById('count1').innerHTML = "Jumlah karakter: " + obj.value.length + "/500";
        }
    </script>
@endsection
