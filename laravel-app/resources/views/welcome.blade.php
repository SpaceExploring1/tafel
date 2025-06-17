<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wie</title>
</head>
<body>
    <div>
        <div>
            <div>
                <div>
                    <div>
                        <h3>Wie ben je?</h3>
                    </div>
                    <div>
                       <button onclick="window.location.href='{{ route('kind.login') }}'">Kind</button>
                       <button onclick="window.location.href='{{ route('docent.login') }}'">Docent</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>