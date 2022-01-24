<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all()->toArray();
        return array_reverse($notes);
    }

    public function store(Request $request)
    {
        $note = new Note([
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]);
        $note->save();

        return response()->json('Note created!');
    }

    public function show($id)
    {
        $note = Note::find($id);
        return response()->json($note);
    }


    public function update($id, Request $request)
    {
        $note = Note::find($id);
        $note->update($request->all());

        return response()->json('Note updated!');
    }

    public function destroy($id)
    {
        $note = Note::find($id);
        $note->delete();

        return response()->json('Note deleted!');
    }
}
