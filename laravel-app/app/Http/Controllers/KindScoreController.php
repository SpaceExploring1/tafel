<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KindScore;

class KindScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return KindScore::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'id_kind' => 'required|integer',
            'id_score' => 'required|integer',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $KindScore = KindScore::findOrFail($id);
        return response()->json($KindScore);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $KindScore = KindScore::findOrFail($id);
        $validation = $request->validate([
            'id_kind' => 'sometimes|integer',
            'id_score' => 'sometimes|integer',
        ]);
        $KindScore->update($validation);
        return response()->json($KindScore);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $KindScore = KindScore::findOrFail($id);
        $score = $KindScore->score;
        $KindScore->delete();
        if ($score) {
        $score->delete();
    }
        return redirect()->back()->with('success', 'Verwijderd');
    }
}
