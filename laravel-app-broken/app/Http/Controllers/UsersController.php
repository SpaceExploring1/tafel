<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string',
        ]);
        $validation['password'] = Hash::make($validation['password']);
        $User = User::create($validation);
        return response()->json($User, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function loginForm()
    {
        return view('docent.login');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $User = User::where('email', $request->email)->first();

        if ($User && Hash::check($request->password, $User->password)) {

            Session::put('id', $User->id);
            return redirect('/dash')->with('success', 'Ingelogd als ' . $User->email);
        }

        return back()->withErrors(['email' => 'Ongeldige inloggegevens'])->withInput();
    }
}
