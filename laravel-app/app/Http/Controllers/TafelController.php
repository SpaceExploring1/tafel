<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tafel;

class TafelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Tafel::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nummer' => 'required|integer',
        ]);

        $tafel = Tafel::create($validation);
        return response()->json($tafel, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tafel = Tafel::findOrFail($id);
        return response()->json($tafel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tafel = Tafel::findOrFail($id);
        $validation = $request->validate([
            'nummer' => 'sometimes|integer',
        ]);
        $tafel->update($validation);
        return redirect()->back()->with('success', 'Bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tafel = Tafel::findOrFail($id);
        $tafel->delete();
        return redirect()->back()->with('success', 'Verwijderd');
    }
}