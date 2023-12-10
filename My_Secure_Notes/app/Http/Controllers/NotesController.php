<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{

    private $title, $active, $userId;

    public function __construct()
    {
        $this->title = 'My Notes';
        $this->active = 'notes';
    }

    public function index()
    {
        //
        $this->userId = Auth::user()->id; // Mendapatkan id pengguna yang sedang login

        // Menggunakan Eloquent untuk mengambil data notes
        $notes = Notes::where('user_id', $this->userId)
            ->orderByDesc('id')
            ->limit(6)
            ->get();


        return view('notes.index')
            ->with('title', $this->title)
            ->with('active', $this->active)
            ->with('notes', $notes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $validateData = $request->validate([
            'theme' => 'required|string|max:100',
            'content' => 'required|string|max:700',
            'user_id' => 'required|integer',
        ], [
            'theme.required' => "Kolom :attribute tidak boleh kosong",
            'content.required' => "Kolom :attribute tidak boleh kosong",
        ]);

        if ($validateData['user_id'] == Auth::user()->id) {
            try {
                $new_notes = new Notes();
                $new_notes->theme = $validateData['theme'];
                $new_notes->content = $validateData['content'];
                $new_notes->user_id = $validateData['user_id'];

                $new_notes->save();
                $request->session()->flash('pesan_success_input', 'Berhasil menambahkan catatan');
            } catch (\Throwable $th) {
                $request->session()->flash('pesan_error_input', 'Gagal menambahkan catatan');
            }
        } else {
            $request->session()->flash('pesan_error_input', 'Gagal menambahkan catatan');
        }


        return redirect()->back();
        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $note = Notes::findOrFail($id);

        return view('notes.detail')
            ->with('title', $this->title)
            ->with('active', $this->active)
            ->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function edit(Notes $notes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notes $note)
    {
        //
        $validateData = $request->validate([
            'theme' => 'required|string|max:100',
            'content' => 'required|string|max:700',
            'user_id' => 'required|integer',
        ], [
            'theme.required' => "Kolom :attribute tidak boleh kosong",
            'content.required' => "Kolom :attribute tidak boleh kosong",
        ]);


        if ($validateData['user_id'] == Auth::user()->id) {
            try {
                $note->update([
                    'theme' => $validateData['theme'],
                    'content' => $validateData['content'],
                ]);

                $request->session()->flash('pesan_success', 'Perubahan data berhasil');
            } catch (\Throwable $th) {
                $request->session()->flash('pesan_error', 'Perubahan data gagal');
            }
        } else {
            $request->session()->flash('pesan_error', 'Perubahan data gagal');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notes $note)
    {
        //
        $theme = $note->theme;

        if ($note) {
            $note->delete();
            return redirect()->route('notes.index')->with('pesan_success_delete', "Catatan $theme berhasil dihapus");
        } else {
            return redirect()->route('notes.index')->with('pesan_error_delete', "Catatan $theme tidak ditemukan");
        }
    }
}
