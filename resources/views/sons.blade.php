<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sound Forest - Les sons</title>
</head>
<body>
    <h1>
        Les sons
    </h1>
    <ul>
            @foreach ($sons as $son)
                <li><a href="#">{{ $son->description }}</a></li>
            @endforeach
    </ul>

</body>
</html>