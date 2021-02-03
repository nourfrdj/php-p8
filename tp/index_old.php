<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>partie8 TP</title>
</head>
<body>
    <?php
    if (isset($_POST['afficher'])) {
        $mois = $_POST['mois']; //je recupere le mois a traiter
        $annee = $_POST['annee']; // je recupere l'année
        $nbdays = cal_days_in_month(CAL_GREGORIAN, $mois, $annee); // chercher le nombre de jours pour le moi x de l'année y selon le calendrier gregorian
        $premierjour = getdate(strtotime($mois . "/01/" . $annee))["wday"]; // chercher le premier jours de la semaine avec ca valeur numerique 0:dimanche 6: samedi 
        echo 'le premier jour de la semaine est ' . $premierjour;
    ?>
        <div class="container">
            <table class="table table-bordered border-info">
                <thead class="table-info text-center">
                    <tr>
                        <th scope="col">Lundi</th>
                        <th scope="col">Mardi</th>
                        <th scope="col">Mercredi</th>
                        <th scope="col">Jeudi</th>
                        <th scope="col">Vendredi</th>
                        <th scope="col">Samedi</th>
                        <th scope="col">Dimanche</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $joursferie = [ // pour le
                        [
                            "01/01" => "Jour de l'an",
                           
                            "01/05" => "Fete de travail YOUPPIIIII",
                            "08/05"=>"Victoire 1945",
                            "14/07"=> "fete Nationale",
                        ]
                    ];
                    function afficheCal($nbrecase, $nbdays)
                    { ?>
                        <tr>
                            <?php

                            echo "le nombre de case vide $nbrecase et le nombre de jours en total est :  $nbdays <br>";
                            $i = 0;
                            for ($vide = 1; $vide <= $nbrecase; $vide++) { ?>
                                <td><?= " "; ?></td>
                            <?php }
                            for ($j = $nbrecase; $j < 7; $j++) { ?>
                                <td><?php $i++;
                                    echo $i; ?></td>
                            <?php  } ?>
                        </tr>
                        <?php
                        while ($i < $nbdays) { ?>
                            <tr>
                                <?php for ($j = 1; $j <= 7; $j++) { ?>
                                    <td><?php if ($i == $nbdays) {
                                            break;
                                        } else {
                                            $i++;
                                            echo $i; ?></td>
                                    }

                            <?php }
                                    } ?>
                            </tr>

                    <?php }
                    }
                    switch ($premierjour) {
                        case 1:
                            afficheCal(2, $nbdays); // on est decalé de une journée avec les numeros de jours de semaine que php renvoi
                            break;
                        case 2:
                            afficheCal(3, $nbdays);
                            break;
                        case 3:
                            afficheCal(4, $nbdays);
                            break;
                        case '4':
                            afficheCal(5, $nbdays);
                            break;
                        case '5':
                            afficheCal(6, $nbdays);
                            break;
                        case '6':
                            afficheCal(7, $nbdays);
                            break;
                        case '7':
                            afficheCal(7, $nbdays);
                            break;
                    }
                } else { ?>

                    <div class="container">
                        <form method="POST" action='index_old.php'>
                            <select name="mois" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected>Veuillez selectionner un mois</option>
                                <option value="1">Janvier</option>
                                <option value="2">Fevrier</option>
                                <option value="3">Mars</option>
                                <option value="4">Avril</option>
                                <option value="5">Mai</option>
                                <option value="6">Juin</option>
                                <option value="7">Juillet</option>
                                <option value="8">Aout</option>
                                <option value="9">Septembre</option>
                                <option value="10">Octobre</option>
                                <option value="11">Novombre</option>
                                <option value="12">Decembre</option>

                            </select>
                            <select name="annee" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected>Veuillez selectionner une année</option>
                                <?php
                                for ($i = date('Y'); $i >= 1950; $i--) { ?>
                                    <option value="<?= $i ?>"><?php echo $i; ?></option>
                                <?php }
                                ?>
                            </select>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit" name="afficher">afficher le calendrier</button>
                            </div>
                        </form>
                    </div>

                <?php
                } ?>
                </tbody>
            </table>



</body>

</html>