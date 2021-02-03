<?php
$monthsArray = [
    1 => 'Janvier',
    2 => 'Fevrier',
    3 => 'Mars',
    4 => 'Avril',
    5 => 'Mai',
    6 => 'Juin',
    7 => 'Juillet',
    8 => 'Aout',
    9 => 'Septembre',
    10 => 'Octobre',
    11 => 'Novembre',
    12 => 'Decembre'
];
$yearMin = 2015;
$yearMax = 2025;
$daysArray = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon premier Calendrier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>
    <div class="container text-center">
        <h1>Mon Calendrier</h1>
        <div class="container">
            <form method="GET">
                <div class="m-1">
                    <select name="month" id="month">
                        <option selected disabled>Choisir un mois</option>
                        <?php
                        foreach ($monthsArray as $key => $value) { ?>
                            <option value="<?= $key ?>" <?= isset($_GET['month']) && $_GET['month'] == $key ? "selected" : "" ?>><?= $value ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="m-1">
                    <select name="year" id="year">
                        <option selected disabled>Choisir une année</option>
                        <?php
                        for ($i = $yearMin; $i <= $yearMax; $i++) { ?>
                            <option <?= isset($_GET['year']) && $_GET['year'] == $i ? "selected" : "" ?>><?= $i ?></option>
                            <!-- si la value n'est pas precisé il prendra la valeur de l'option
                            l'avantage de cet isset est de garder les valeur des champs et des choix en cas de rafraichissement de la page  -->
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-lg btn-secondary mt-2">Afficher </button>
            </form>
        </div>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <?php foreach ($daysArray as $day) { ?>
                            <th><?= $day ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $row = 1;
                    $case = 1;

                    while ($row <= 6) { ?>
                        <tr>
                            <?php
                            for ($i = 1; $i <= 7; $i++) { ?>
                                <td><?= $case ?></td>
                            <?php
                                $case++;
                            } ?>
                        </tr>
                    <?php

                        $row++;
                    } ?>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>