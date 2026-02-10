<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Test reservations</h1>
    <form action="{{route('reservation.filter')}}" method="POST">
        
        @csrf
        <label for="">date debut</label>
        <input type="date" name="date_debut" placeholder="date debut">
        <label for="">date fin</label>
        <input type="date" name="date_fin" placeholder="date debut">
        <button type="submit">rechcher</button>
    </form>

    <h2>payment</h2>
    <form action="{{ route('checkout')}}" method="POST">
        <button type="submit">payer</button>

    </form>
</body>
</html>