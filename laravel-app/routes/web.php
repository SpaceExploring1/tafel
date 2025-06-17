<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\KindController;
use App\Http\Controllers\TafelController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\KindScoreController;
use App\Http\Controllers\UsersController;
use App\Models\Kind;
use App\Models\KindScore;
use App\Models\Score;

use Illuminate\Support\Facades\DB;
//session
use Illuminate\Support\Facades\Session;


// Alleen voor ingelogde kinderen
Route::get('/kinds/{id}', [KindController::class, 'show']);
Route::middleware('kind')->group(function () {
    Route::match(['get', 'post'], '/opdracht', function (Request $request) {
        $tafels = App\Models\Tafel::all();
        $vragen = [];
        $gekozenTafel = null;
        $score = 0;

        if ($request->isMethod('post')) {
            $tafelId = $request->input('idTafeltje');
            $tafel = App\Models\Tafel::findOrFail($tafelId);
            $gekozenTafel = $tafel->nummer;

            if($request->input('antwoord')){
                $juisteAntwoorden = $request->input('juisteAntwoord');
                $antwoorden = $request->input('antwoord');
                foreach ($antwoorden as $i => $antwoord) {
                    if (isset($juisteAntwoorden[$i]) && $antwoord == $juisteAntwoorden[$i]) {
                        $score++;
                    }
                }
                    $Score = Score::create([
                        'idTafeltje' => $request->input('idTafeltje'),
                        'score' => $score,
                    ]);

                    KindScore::create([
                        'idKind' => Session::get('kind_id'),
                        'idScore' => $Score->idScore,
                    ]);
                    return redirect('/opdracht?score=' . $score);
            }

            // Genereer 20 vragen voor die tafel
            for ($i = 0; $i < 20; $i++) {
                
                $vragen[] = [
                    'vraag' => "0",
                    'juisteAntwoord' => 0,
                ];
            }
        }

        return view('kind.opdracht', compact('tafels', 'vragen', 'gekozenTafel'));
    });
});
// -------------------------------------------


// Alleen voor docenten
Route::middleware('docent')->group(function () {
    Route::get('/kind/register', function () {
        return view('kind.register');
    });

    Route::get('/kinds', [KindController::class, 'index']);
    Route::post('/kinds', [KindController::class, 'store']);
    Route::put('/kinds/{id}', [KindController::class, 'update']);
    Route::delete('/kinds/{id}', [KindController::class, 'destroy']);

    Route::get('/tafels', [TafelController::class, 'index']);
    Route::get('/tafels/{id}', [TafelController::class, 'show']);
    Route::post('/tafels', [TafelController::class, 'store']);
    Route::put('/tafels/{id}', [TafelController::class, 'update']);
    Route::delete('/tafels/{id}', [TafelController::class, 'destroy']);

    Route::get('/dash', function () {
        $Alles = DB::table('kind')
            ->join('kind_score', 'kind.idKind', '=', 'kind_score.idKind') // let op: idKind
            ->join('score', 'kind_score.idScore', '=', 'score.idScore')   // let op: idScore
            ->join('tafel', 'score.idTafeltje', '=', 'tafel.idTafeltje') // let op: idTafeltje
            ->select(
                'kind.idKind',
                'kind_score.idKindScore',
                'score.idScore',
                'kind.gebruikersnaam',
                'score.score',
                'tafel.nummer as tafel'
            )
            ->get();

        KindScoreController::class;
        ScoreController::class;
        KindController::class;
        $kindController = new KindController();
        $kinds = $kindController->index();
        TafelController::class;
        $tafelController = new TafelController();
        $tafels = $tafelController->index();


        return view('docent.dash', compact('Alles', 'kinds', 'tafels'));
    });
    
    Route::put('/score/{id}', [ScoreController::class, 'update']);
    Route::delete('/kindscores/{id}', [KindScoreController::class, 'destroy']);

    
});// -------------------------------------------


// Alle gebruikers
Route::get('/', function () {
    return view('welcome');
});

Route::get('/kind/login', [KindController::class, 'loginForm'])->name('kind.login.form');
Route::post('/kind/login', [KindController::class, 'login'])->name('kind.login');

Route::get('/docent/login', [UsersController::class, 'loginForm'])->name('docent.login.form');
Route::post('/docent/login', [UsersController::class, 'login'])->name('docent.login');
// -------------------------------------------
// // Alleen voor Administratoren
//     Route::get('/docent/register', function () {
//         return view('docent.register');
//     });
//     Route::get('/docents', [UsersController::class, 'index']);
//     Route::get('/docent/{id}', [UsersController::class, 'show']);
//     Route::post('/docents', [UsersController::class, 'store']);
//     Route::put('/docent/{id}', [UsersController::class, 'update']);
//     Route::delete('/docent/{id}', [UsersController::class, 'destroy']);
//     // ---------------------------