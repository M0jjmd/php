<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Habitaciones</title>
</head>

<body>
    <h1>Lista de Habitaciones</h1>

    <ol>
        @foreach($rooms as $room)
        <li>
            Type: {{ htmlspecialchars($room['bed_type']) }}<br>
            Number: {{ htmlspecialchars($room['room_number']) }}<br>
            Price: {{ htmlspecialchars($room['rate']) }}<br>
            Discount: {{ htmlspecialchars($room['offer_price']) }}<br>
        </li>
        @endforeach
    </ol>
</body>

</html>