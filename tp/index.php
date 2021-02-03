<?php
$monthsArray = [
    1 => 'Janvier',
    2 => 'Février',
    3 => 'Mars',
    4 => 'Avril',
    5 => 'Mai',
    6 => 'Juin',
    7 => 'Juillet',
    8 => 'Août',
    9 => 'Septembre',
    10 => 'Octobre',
    11 => 'Novembre',
    12 => 'Décembre'
];

$yearMin = 2015;
$yearMax = 2025;
$daysArray = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];
if (isset($_POST['btnSubmit'])) {
    $totalDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $_POST['year']);
    $firstDayInMonth = date('w', mktime(12, 0, 0, $_POST['month'], 1, $_POST['year']));
    $month = $monthsArray[$_POST['month']];
    $year = $_POST['year'];
} else {
    $totalDaysInMonth = cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y'));
    $firstDayInMonth =  date('w', mktime(12, 0, 0, date('n'), 1, date('Y')));
    setlocale(LC_TIME, ["fr"], ["fra"], ["fr_FR"]);
    $month = utf8_encode(strftime('%B'));
    $year = date('Y');
}
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
            <form method="POST">
                <div class="m-1">
                    <select name="month" id="month">
                        <option selected disabled>Choisir un mois</option>
                        <?php
                        foreach ($monthsArray as $key => $value) { ?>
                            <option value="<?= $key ?>" <?= isset($_POST['month']) && $_POST['month'] == $key ? "selected" : "" ?>><?= $value ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="m-1">
                    <select name="year" id="year">
                        <option selected disabled>Choisir une année</option>
                        <?php
                        for ($i = $yearMin; $i <= $yearMax; $i++) { ?>
                            <option <?= isset($_POST['year']) && $_POST['year'] == $i ? "selected" : "" ?>><?= $i ?></option>
                            <!-- si la value n'est pas precisé il prendra la valeur de l'option
                            l'avantage de cet isset est de garder les valeur des champs et des choix en cas de rafraichissement de la page  -->
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" name="btnSubmit" class="btn btn-lg btn-secondary mt-2">Afficher </button>
            </form>
        </div>
        <div>
            <h2><?= "$month - $year" ?></h2>
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
                    $case = 1;
                    $day = 1;
                    while ($day <= $totalDaysInMonth) { ?>
                        <tr>
                            <?php
                            for ($i = 1; $i <= 7; $i++) {
                                if ($case >= $firstDayInMonth && $day <= $totalDaysInMonth) { ?>
                                    <td><?= $day ?></td>
                                <?php
                                    $day++;
                                } else { ?>
                                    <td class="bg-secondary"></td>
                            <?php }
                                $case++;
                            } ?>
                        </tr>
                    <?php
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>