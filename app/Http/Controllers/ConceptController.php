<?php

namespace App\Http\Controllers;

use App\Models\Concept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConceptController extends Controller
{

    public function show(Concept $id)
    {

        return view('concepts.show', [
            "concept" => $id
        ]);
    }


    public function store()
    {


        // $concept = new Concept();
        // $concept->content = 'testing';
        // $concept->likes = 0;
        // $concept->user_id = 1;
        // $concept->save();

        $validated = request()->validate(
            [
                'content' => 'required|min:5|max:240'
            ]
        );

        $validated['user_id'] = Auth::user()->id;

        // Create new concept by getting its content from the form textarea

        Concept::create($validated);

        // $concept = Concept::create(['content' => request()->get('content', '')]);
        // $concept->save();


        return redirect()->route('dashboard')->with('success', 'concept created successfully!!');
    }

    public function destroy(Concept $id)
    {
        // delete a concept where id matches the id param 

        //        $concept = Concept::where('id',$id)->firstOrFail();
        // $concept->delete();

        // ROUTE MODEL BIDING HELPS TO SHORTEN THE CODE BELOW BY PASSING THE MODEL NAME "Concept" as parameter
        // Concept::where('id',$id)->firstOrFail()->delete();

        if (Auth::user()->id !== $id->user_id) {
            abort(404);
        }
        $id->delete();

        return redirect()->route('dashboard')->with('success', 'concept deleted successfully!!');
    }

    public function edit(Concept $id)
    {
        if (Auth::user()->id !== $id->user_id) {
            abort(404);
        }
        $editing = true;

        return view('concepts.show', [
            "concept" => $id, 'editing' => $editing
        ]);
    }

    public function update(Concept $id)
    {
        if (Auth::user()->id !== $id->user_id) {
            abort(404);
        }

        request()->validate(
            [
                'content' => 'required|min:5|max:240'
            ]
        );


        $id->content = request()->get('content', '');
        $id->save();


        return redirect()->route('concepts.show', $id->id)->with('success', 'Concept updated successfully!');
    }
}
