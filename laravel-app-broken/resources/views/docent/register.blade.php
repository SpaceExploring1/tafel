<!DOCTYPE html>
<html>

<head>
    <title>Nieuw Docent</title>
</head>

<body>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <h4>Voeg nieuw Docent toe</h4>
                    </div>
                    <div>
                        <form action="/docents" method="POST">
                            @csrf

                            <div>
                                <label for="name">Naam:</label>
                                <input type="text" name="name" required>
                            </div>

                            <div>
                                <label for="email">Email:</label>
                                <input type="email" name="email" required>
                            </div>

                            <div>
                                <label for="password">Wachtwoord:</label>
                                <input type="password" name="password" required>
                            </div>

                            <button type="submit">Registreren</button>
                            <a href="{{ route('docent.login') }}">Terug naar login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>