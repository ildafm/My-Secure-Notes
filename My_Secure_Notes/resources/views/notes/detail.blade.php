@extends('master.master')

@section('content')
    <div class="pagetitle">
        <h1>Notes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"> <a href="/notes">My Notes</a></li>
                <li class="breadcrumb-item active">Detail Notes</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">

        <div class="card">

            {{-- session message --}}
            @if (session()->has('pesan_success'))
                <div class="alert alert-success alert-dismissible fade show mx-4 my-4" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session()->get('pesan_success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session()->has('pesan_error'))
                <div class="alert alert-danger alert-dismissible fade show mx-4 my-4" role="alert">
                    <i class="bi bi-exclamation-octagon me-1"></i>
                    {{ session()->get('pesan_error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- card body --}}
            <div class="card-body">
                <h5 class="card-title">{{ $note->theme }}
                    <div style="float: right">
                        {{-- Button Back to index --}}
                        <a class="btn btn-secondary btn-sm" href="{{ $active === 'notes' ? '/notes' : '/my-books' }}"><i
                                class="bi bi-arrow-left-circle"></i></a>

                        {{-- Button Edit --}}
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                            data-bs-target="#editModal" title="Edit Data {{ $note->theme }}">
                            <i class="bi bi-pencil"></i>
                        </button>

                        {{-- Button Delete --}}
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#smallModal" title="Hapus Data {{ $note->theme }}">
                            <i class="bi bi-trash"></i>
                        </button>


                    </div>
                </h5>

                <p style="white-space: pre-line">{{ $note->content }}</p>
            </div>
        </div>
    </section>


    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('notes.update', ['note' => $note->id]) }}" method="POST"
                    onsubmit="document.getElementById('btn_edit_submit').disabled = true">
                    @method('PUT')
                    @csrf

                    {{-- modal header --}}
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    {{-- modal body --}}
                    <div class="modal-body">
                        <div class="row">
                            {{-- theme --}}
                            <div class="col-12 mb-2">
                                <label for="theme">Theme</label>
                                <input class="form-control @error('theme') is-invalid @enderror" type="text"
                                    name="theme" value="{{ old('theme', $note->theme) }}"
                                    placeholder="Maximal 100 Karakter">

                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- content --}}
                            <div class="col-12 mb-2">
                                <label for="content">Content</label>
                                <textarea id="txtArea" class="form-control @error('content') is-invalid @enderror" maxlength="500" required
                                    onkeyup="count_up(this);" name="content" id="" cols="30" rows="5"
                                    placeholder="Maximal 500 Karakter"> {{ old('content', $note->content) }}</textarea>
                                <span class="text-muted pull-right" id="count1">Jumlah karakter:
                                    0/500</span>

                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- user_id --}}
                            <div class="col-12 mb-2" hidden>
                                <label for="user_id">ID User</label>
                                <input class="form-control @error('user_id') is-invalid @enderror" type="number"
                                    name="user_id" value="{{ $note->user_id }}">
                                @error('user_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>


                    {{-- modal footer --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btn_edit_submit" type="submit" class="btn btn-primary">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- End Edit Modal-->

    <!-- Delete Modal -->
    <div class="modal fade" id="smallModal" tabindex="-1">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                @php
                    $route = "$active.destroy";
                    if ($active == 'my-books') {
                        $param = 'my_book';
                    } else {
                        $param = 'note';
                    }
                @endphp
                <form action="{{ route($route, [$param => $note->id]) }}" method="post"
                    onsubmit="document.getElementById('btn_submit_delete').disabled = true;">
                    @method('DELETE')
                    @csrf

                    {{-- modal header --}}
                    <div class="modal-header">
                        <h5 class="modal-title">DANGER ZONE!!!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    {{-- modal body --}}
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus data {{ $note->theme }}
                    </div>
                    {{-- modal footer --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btn_submit_delete" type="submit" class="btn btn-danger">DELETE!!!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Delete Modal-->

    <script>
        var txtArea = document.getElementById('txtArea');

        count_up(txtArea);

        function count_up(obj) {
            document.getElementById('count1').innerHTML = "Jumlah karakter: " + obj.value.length + "/500";
        }
    </script>
@endsection
