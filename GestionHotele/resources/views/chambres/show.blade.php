<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Chambre {{ $chambre->number }}</h1>
    <p>Prix : {{ $chambre->price_per_night }} €/nuit</p>
    <p>Capacité : {{ $chambre->capacity }} personnes</p>
    <h3>Tags</h3>
    @foreach ($chambre->tags as $tag)
        <span class="badge">{{ $tag->name }}</span>
    @endforeach
        <h3>Propriétés</h3>
    @foreach ($chambre->proprties as $proprtie)
        <span>{{ $proprtie->name }}</span>
    @endforeach
</body>
</html>
