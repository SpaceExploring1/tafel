<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tafels Oefenen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Tafels</a>
        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('register') }}">Registreer</a>
            <a class="nav-link" href="{{ route('tafels.show') }}">Tafels Oefenen</a>
            <a class="nav-link" href="{{ route('login') }}">Login</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h1>Tafels Oefenen</h1>

    @guest
        <div class="alert alert-warning">
            Log in om te oefenen!
            <a href="{{ route('login') }}" class="btn btn-primary btn-sm ms-2">Login</a>
        </div>
    @endguest

    @auth
    <form action="{{ route('tafels.check') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="tafelSelect" class="form-label">Selecteer een tafel (1-10):</label>
            <select name="tafel" id="tafelSelect" class="form-select" onchange="this.form.submit()">
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" @if(isset($selectedTafel) && $selectedTafel == $i) selected @endif>
                        Tafel {{ $i }}
                    </option>
                @endfor
            </select>
        </div>

        @foreach($questions as $index => $question)
            <div class="row mb-2">
                <div class="col-6">
                    <input type="text" class="form-control" value="{{ $question['question'] }}" readonly />
                </div>
                <div class="col-6">
                    <input type="number" name="answers[]" class="form-control" required />
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-success mt-3">Controleer Antwoorden</button>
    </form>

    @if(isset($total))
        <div class="alert alert-info mt-4">
            Jouw Score: {{ $total }} / 20
        </div>
    @endif
    @endauth
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
