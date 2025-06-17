<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Tafeltjes oefenen</title>
</head>

<body>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <h4>Oefenen van tafeltjes</h4>
                    </div>
                    <div>
                        @if (isset($_GET['score']))
                            @if ($_GET['score'] >15)
                            <div>
                                Je score is: {{ $_GET['score'] }}
                            </div>
                            @else
                            <div>
                                Je score is: {{ $_GET['score'] }}
                            </div>
                            @endif
                        @endif

                        @if (!isset($_POST['idTafeltje']))
                        <form method="POST" action="/opdracht">
                            @csrf
                            <div>
                                <label for="tafeltje">Kies een tafeltje:</label>
                                <select name="idTafeltje" id="tafeltje" required>
                                    @foreach ($tafels as $tafel)
                                    <option value="{{ $tafel->idTafeltje }}" {{ (old('idTafeltje') == $tafel->idTafeltje) ? 'selected' : '' }}>
                                        {{ $tafel->nummer }}-tafel
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit">Start oefening</button>
                        </form>
                        @endif

                        @if (!empty($vragen))
                        <h5>20 vragen met de {{ $gekozenTafel }}-tafel</h5>
                        <form method="POST" action="/opdracht">
                            @csrf
                            <input type="hidden" name="idTafeltje" value="{{$gekozenTafel}}">
                            <div>
                                @foreach ($vragen as $vraag)
                                <div>
                                    <div>
                                        <label>{{ $vraag['vraag'] }} =</label>
                                        <input type="number" style="width: 100px;" name="antwoord[]" required>
                                        <input type="hidden" name="juisteAntwoord[]" value="{{ $vraag['juisteAntwoord'] }}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <button type="submit">Klaar</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>