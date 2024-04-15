


<?php
/*
Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale. Prima stampate in pagina i dati, senza preoccuparvi dello stile. Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus:
1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
*/

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

// Parking check Function
function parkingCheck($parking)
{
    if ($parking) {
        return '<span class="text-success">Yes</span>';
    } else {
        return '<span class="text-danger">No</span>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- /BOOTSTRAP -->
   
</head>
<body>

    <div class="container">
        <h1>Hotel List</h1>

        <!-- Form to filter parkings' hotel -->
        <form method="GET">
            <label for="parking"> Only with Parking ? Check that :</label>
            <input type="checkbox" name="parking"> <!-- ON or OFF --> <br>
            <button class="btn-secondary" type="submit"> Filter </button>
        </form>

        <!-- Table with Hotels' Details -->
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Parking</th>
                    <th>Vote</th>
                    <th>Distance to Center</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($hotels as $hotel): ?>
                    <?php if($_GET['parking'] == 'on' && !$hotel['parking'] ) continue; ?>
                    <!-- CONTINUE: Skip the code inside in this statement and continue to iterate on "FOREACH" cycle over this statement.
                    In this way, you can control, ALL ELEMENTS in a single moment and print in page together.
                    -->

                    <tr>
                        <td class="font-weight-bold"><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <td><?php echo parkingCheck($hotel['parking']); ?></td>
                        <td><?php echo $hotel['vote'] ?> / 5</td>
                        <td><?php echo $hotel['distance_to_center'] ?> Km</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
