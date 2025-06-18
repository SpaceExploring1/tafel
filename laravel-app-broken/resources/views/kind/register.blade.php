<!DOCTYPE html>
<html>

<head>
    <title>Nieuw Kind</title>
</head>

<body>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <h4>Voeg nieuw Kind toe</h4>
                    </div>
                    <div>
                        <form action="/kinds" method="POST">
                            @csrf

                            <div>
                                <label for="gebruikersnaam">Gebruikersnaam:</label>
                                <input type="text" name="gebruikersnaam" required>
                            </div>

                            <div>
                                <label for="wachtwoord">Wachtwoord:</label>
                                <input type="password" name="wachtwoord" required>
                            </div>

                            <button type="submit">Registreren</button>
                            <a href="{{ route('kind.login') }}">Terug naar login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>