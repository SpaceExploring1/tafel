<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Kind;

class ScoreController extends Controller
{
    public function store(Request $request)
    {
        $validation = $request->validate([
            'idKind' => 'required|integer|exists:kind,idKind',
            'score' => 'required|integer',
            'questions' => 'required|array',
        ]);

        $score = Score::create([
            'idKind' => $validation['idKind'],
            'score' => $validation['score'],
        ]);

        return response()->json($score, 201);
    }

    public function checkQuestions(Request $request)
    {
        $validation = $request->validate([
            'idKind' => 'required|integer|exists:kind,idKind',
            'answers' => 'required|array',
        ]);

        $kind = Kind::findOrFail($validation['idKind']);
        $totalScore = 0;
        $questions = [];

        for ($i = 0; $i < 20; $i++) {
            $num1 = rand(2, 10);
            $num2 = rand(2, 10);
            $correctAnswer = $num1 * $num2;
            $userAnswer = $validation['answers'][$i] ?? null;
            $isCorrect = $userAnswer == $correctAnswer;
            if ($isCorrect) $totalScore++;
            $questions[] = [
                'question' => "$num1 × $num2",
                'user_answer' => $userAnswer,
                'correct_answer' => $correctAnswer,
                'is_correct' => $isCorrect,
            ];
        }

        $score = Score::updateOrCreate(
            ['idKind' => $kind->idKind],
            ['score' => $totalScore]
        );

        return response()->json([
            'score' => $score,
            'questions' => $questions,
            'total' => $totalScore . '/20',
        ]);
    }

    // Keep other methods (index, show, update, destroy) as needed
}