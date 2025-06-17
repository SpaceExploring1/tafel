<!DOCTYPE html>
<html>

<head>
    <title>Docent Login</title>
</head>

<body>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <h3>Login Docent</h3>
                    </div>
                    <div>
                        @if ($errors->any())
                        <div>
                            {{ $errors->first() }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('docent.login') }}">
                            @csrf

                            <div>
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                            </div>

                            <div>
                                <label for="password">Wachtwoord:</label>
                                <input type="password" id="password" name="password" required>
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