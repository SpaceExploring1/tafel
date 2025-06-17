<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Score::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'idTafeltje' => 'required|integer',
            'score' => 'required|integer',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $score = Score::findOrFail($id);
        return response()->json($score);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $score = Score::findOrFail($id);
        $validation = $request->validate([
            'idTafeltje' => 'sometimes|integer',
            'score' => 'sometimes|integer',
        ]);
        $score->update($validation);
        return redirect()->back()->with('success', 'Bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $score = Score::findOrFail($id);
        $score->delete();
        return response()->json(['message' => 'Verwijderd'], 204);
    }
}
