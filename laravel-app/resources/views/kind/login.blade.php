<!DOCTYPE html>
<html>

<head>
    <title>Kind Login</title>
</head>

<body>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <h3>Login Kind</h3>
                    </div>
                    <div>
                        @if ($errors->any())
                        <div>
                            {{ $errors->first() }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('kind.login') }}">
                            @csrf

                            <div>
                                <label for="gebruikersnaam">Gebruikersnaam:</label>
                                <input type="text" id="gebruikersnaam" name="gebruikersnaam" value="{{ old('gebruikersnaam') }}" required autofocus>
                            </div>

                            <div>
                                <label for="wachtwoord">Wachtwoord:</label>
                                <input type="password" id="wachtwoord" name="wachtwoord" required>
                            </div>

                            <button type="submit">Login</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>