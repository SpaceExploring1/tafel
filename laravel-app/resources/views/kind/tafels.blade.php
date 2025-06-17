{{-- resources/views/tafels.blade.php --}}
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tafels Oefenen</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            z-index: 1000;
        }
        .popup.show {
            display: block;
        }
        .table-row {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <!-- Navigation -->
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

    <!-- Main Container -->
    <div class="container mt-4">
        <h1>Tafels Oefenen</h1>

        <!-- Dropdown for selecting tafel range -->
        <div class="dropdown mb-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="tafelsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                Tafels
            </button>
            <ul class="dropdown-menu" aria-labelledby="tafelsDropdown">
                <li><a class="dropdown-item" href="#">1-10*N</a></li>
                <li><a class="dropdown-item" href="#">1-20*N</a></li>
                <li><a class="dropdown-item" href="#">1-40*N</a></li>
                <li><a class="dropdown-item" href="#">1-80*N</a></li>
                <li><a class="dropdown-item" href="#">1-100*N</a></li>
            </ul>
        </div>

        <!-- Popup for login -->
        @guest
        <div id="loginPopup" class="popup">
            <p>Log in om te oefenen!</p>
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        </div>
        @endguest

        <!-- Questions form -->
        @auth
        <form action="{{ route('tafels.check') }}" method="POST" class="mt-4">
            @csrf
            <input type="hidden" name="idKind" value="{{ auth()->user()->idKind ?? '' }}">
            @foreach($questions as $index => $question)
                <div class="row table-row">
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
            <h3 class="mt-4">Jouw Score: {{ $total }}</h3>
        @endif
        @endauth

    </div>

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Pass auth check result to JS
        const isLoggedIn = @json(auth()->check());

        document.addEventListener('DOMContentLoaded', function() {
            const tafelsLinks = document.querySelectorAll('#tafelsDropdown .dropdown-item');
            tafelsLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    if (!isLoggedIn) {
                        e.preventDefault();
                        document.getElementById('loginPopup').classList.add('show');
                    }
                    // TODO: Add logic here if logged in to change questions dynamically
                });
            });
        });
    </script>
</body>
</html>
