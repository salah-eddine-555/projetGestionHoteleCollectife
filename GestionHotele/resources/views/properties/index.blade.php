<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
    <h2>Liste des Properties</h2>

    <ul>
    @foreach ($properties as $property)
        <li>{{ $property->name }}</li>
    @endforeach
    </ul>
    </body>
</html>

