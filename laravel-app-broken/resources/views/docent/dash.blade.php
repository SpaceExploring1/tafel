<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kinderen</title>
</head>
<header>
    <a href="/kind/register">Kind registreren</a>
</header>
<body>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <h4>Overzicht van alle resultaten</h4>
                    </div>
                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <!-- <th>ID</th> -->
                                    <th>Naam</th>
                                    <th>Tafel</th>
                                    <th>Score</th>
                                    <th>Bijwerken / Verwijder</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Alles as $kind)
                                <tr>
                                    <!-- <td>{{ $kind->idKind }}</td> -->
                                    <td>{{ $kind->gebruikersnaam }}</td>
                                    <td>{{ $kind->tafel }}</td>
                                    <td>{{ $kind->score }}</td>
                                    <td>
                                        <form action="score/{{ $kind->idScore }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="score" value="{{ $kind->score }}" required>
                                            <button type="submit">Bijwerken</button>
                                        </form>
                                        <form action="kindscores/{{ $kind->idKindScore }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Verwijder</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div>
            <div>
                <div>
                    <div>
                        <h4>Overzicht van alle kinderen</h4>
                    </div>
                    <div>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Naam</th>
                                    <th>Bijwerken / Verwijder</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kinds as $kind)
                                <tr>
                                    <td>{{ $kind->idKind }}</td>
                                    <td>{{ $kind->gebruikersnaam }}</td>
                                    <td>
                                        <form action="kinds/{{ $kind->idKind }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="gebruikersnaam" value="{{ $kind->gebruikersnaam }}" required>
                                            <button type="submit">Bijwerken</button>
                                        </form>
                                        <form action="kinds/{{ $kind->idKind }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Verwijder</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>