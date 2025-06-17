<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function show()
{
    $questions = [
        ['question' => '1 x 1 = ?'],
        ['question' => '2 x 3 = ?'],
        ['question' => '4 x 5 = ?'],
        // Add your questions dynamically here
    ];

    return view('tafels', compact('questions'));
}

}
