<?php

$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];

// Recupero la scelta dell'utente nelle select
$parking = $_GET['parking'] ?? null;
$vote = $_GET['vote'] ?? null;

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css' integrity='sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==' crossorigin='anonymous' />
    <title>PHP Hotel</title>
</head>

<body class="bg-dark">
    <div class="container pt-3">
        <!-- Title -->
        <h1 class="text-white">Hotels</h1>
        <hr class="text-secondary">
        <!-- Form -->
        <form action="" method="GET">
            <div class="form-group text-white">
                <!-- Select parking -->
                <label for="parking">Seleziona</label>
                <select name="parking" id="parking" class="form-select w-25 mt-1 mb-2">
                    <option value="">Tutti gli hotel</option>
                    <option value="true" <?= $parking == 'true' ? 'selected' : '' ?>>Con parcheggio</option>
                    <option value="false" <?= $parking == 'false' ? 'selected' : '' ?>>Senza parcheggio</option>
                </select>
                <!-- Select vote -->
                <label for="vote">Voto</label>
                <select name="vote" id="vote" class="form-select w-25 mt-1 mb-4">
                    <option value="0">Tutti gli hotel</option>
                    <option value="1" <?= $vote == '1' ? 'selected' : '' ?>>1 stella</option>
                    <option value="2" <?= $vote == '2' ? 'selected' : '' ?>>2 stelle</option>
                    <option value="3" <?= $vote == '3' ? 'selected' : '' ?>>3 stelle</option>
                    <option value="4" <?= $vote == '4' ? 'selected' : '' ?>>4 stelle</option>
                    <option value="5" <?= $vote == '5' ? 'selected' : '' ?>>5 stelle</option>
                </select>
                <!-- Buttons -->
                <input class="btn btn-primary" type="submit" value="Filtra">
                <a href="http://localhost/php-hotel" class="btn btn-danger">Annulla</a>
            </div>
        </form>
        <hr>
        <!-- Table -->
        <table class="table table-dark">
            <thead>
                <tr>
                    <!-- Foreach keys -->
                    <?php foreach ($hotels[0] as $key => $hotel) : ?>
                        <th scope="col"><?= ucfirst($key) ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <!-- Foreach value -->
                <?php foreach ($hotels as $hotel) : ?>
                    <!-- If filter parking -->
                    <?php if ((!$parking || $hotel['parking'] === ($parking == 'true')) && (!$vote || $hotel['vote'] >= $vote)) : ?>
                        <tr>
                            <td> <?= $hotel['name'] ?></td>
                            <td> <?= $hotel['description'] ?></td>
                            <td> <?= ($hotel['parking']) ? '&#10003;' : '&#10007;' ?></td>
                            <td> <?= $hotel['vote'] ?></td>
                            <td> <?= $hotel['distance_to_center'] ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>