<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function view(){

        $notes = Note::where('user_id', auth()->id())->latest()->paginate(5); 

        return view('pages.home',['notes' => $notes]);
    }
    public function note(){
        return view('pages.note');
    }
    public function store(Request $request)
    {
      // Validate the request data
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
    ]);

    // Create a new note using the validated data
    $note = new Note();
    $note->title = $validatedData['title'];
    $note->content = $validatedData['content'];
    // Assuming you have user authentication, set the user_id to the authenticated user's ID
    $note->user_id = auth()->id(); // Adjust this according to your authentication method

    // Save the note to the database
    $note->save();

    // Redirect back with success message
    return redirect()->route('home')->with('success', 'Note created successfully');
    }

    public function edit($id)
    {
        $note = Note::findOrFail($id);

        return view('pages.edit', compact('note'));
    }


    public function update(Request $request, $id)
    {
        // Retrieve the note to update
        $note = Note::findOrFail($id);
        
        // Update the note attributes with the new data
        $note->update($request->all());

        return redirect()->route('home')->with('success', 'Note created successfully');
        
    }

    public function destroy($id){

        $note = Note::findOrFail($id);

        $note->delete();

        return redirect()->route('home')->with('success', 'Note created successfully');

        
    }




}
