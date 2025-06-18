<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TafelController extends Controller
{
    public function show(Request $request)
    {
        // Default tafel to 1 or from query param
        $selectedTafel = $request->query('tafel', 1);
        $selectedTafel = max(1, min(10, (int)$selectedTafel)); // Clamp between 1-10

        // Generate 20 questions for the selected tafel
        $questions = [];
        for ($i = 1; $i <= 20; $i++) {
            $questions[] = [
                'question' => "{$selectedTafel} × {$i}",
                'answer' => $selectedTafel * $i,
            ];
        }

        return view('tafels', compact('questions', 'selectedTafel'));
    }

    public function check(Request $request)
    {
        $answers = $request->input('answers', []);
        $tafel = $request->input('tafel', 1);
        $tafel = max(1, min(10, (int)$tafel));

        $score = 0;
        for ($i = 0; $i < 20; $i++) {
            $correct = $tafel * ($i + 1);
            if (isset($answers[$i]) && intval($answers[$i]) === $correct) {
                $score++;
            }
        }

        // regenerate questions to show again
        $questions = [];
        for ($i = 1; $i <= 20; $i++) {
            $questions[] = [
                'question' => "{$tafel} × {$i}",
                'answer' => $tafel * $i,
            ];
        }

        return view('tafels', ['questions' => $questions, 'total' => $score, 'selectedTafel' => $tafel]);
    }
}
