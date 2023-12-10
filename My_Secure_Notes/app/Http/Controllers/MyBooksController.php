<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class MyBooksController extends Controller
{
    //

    private $title, $active, $userId;

    public function __construct()
    {
        $this->title = 'My Books';
        $this->active = 'my-books';
    }

    public function index()
    {
        $this->userId = Auth::user()->id; // Mendapatkan id pengguna yang sedang login

        // Menggunakan Eloquent untuk mengambil data notes
        $notes = Notes::where('user_id', $this->userId)
            ->orderByDesc('id')
            ->get();

        $allNotes = Notes::withTrashed('user_id', $this->userId)
            ->orderByDesc('updated_at')
            ->limit(6)
            ->get();

        $recent_activity = [];

        $getCurrentEpoch = time();
        $getOneMonthEpochAgo = strtotime("-30 days"); // get epoch 30 days ago

        foreach ($allNotes as $data) {
            if (strtotime($data->created_at) < $getCurrentEpoch && strtotime($data->created_at) >= $getOneMonthEpochAgo) {
                $recent_activity[] = $data;
            } else {
                break;
            }
        }

        return view('myBooks.index')
            ->with('title', $this->title)
            ->with('active', $this->active)
            ->with('recent_activity', $recent_activity)
            ->with('notes', $notes);
    }

    public function show($id)
    {
        //
        $note = Notes::findOrFail($id);

        return view('notes.detail')
            ->with('title', $this->title)
            ->with('active', $this->active)
            ->with('note', $note);
    }

    public function destroy(Notes $my_book)
    {
        //
        $theme = $my_book->theme;

        if ($my_book) {
            $my_book->delete();
            return redirect()->route('my-books.index')->with('pesan_success_delete', "Catatan $theme berhasil dihapus");
        } else {
            return redirect()->route('my-books.index')->with('pesan_error_delete', "Catatan $theme tidak ditemukan");
        }
    }
}
