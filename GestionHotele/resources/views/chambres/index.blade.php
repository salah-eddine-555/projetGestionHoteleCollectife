<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method='GET' action='{{ route("chambres.index") }}'>
        <select name='tag'>
            <option value=''>Tous les tags</option>
                @foreach ($allTags as $tag)
            <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                @endforeach
            </select>
            <select name='property'>
            <option value=''>Toutes les propriétés</option>
                @foreach ($allProperties as $prop)
            <option value='{{ $prop->id }}'>{{ $prop->name }}</option>
                @endforeach
        </select>
        <button type='submit'>Filtrer</button>
    </form>
    
</body>
</html>
