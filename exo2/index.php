<!doctype html>
<html lang="fr">

<head>
      <meta charset="utf-8">
      <title>partie7 exo3</title>
</head>

<body>
      <p><?= "voici la date formatée" ?></p>
      <p><?= date("d/m/Y") //facon procedurale 
            ?></p>
      <p><?= date('l jS \of F Y h:i:s A')

            ?>
      <p><?php
            // correction exo1
            // $date2= new DateTime(); instanciation de l'objet date qu'on va utiliser grace avec ces methodes
            //echo date2=>format("j/m/y"); pour utiliser une methode on utilise la fleche et pour afficher un attribut on utilise le .
            setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
            echo "<br><br><br>";
            echo "exo3 <br>";
            echo utf8_encode(strftime('%A %d %B %Y %I:%M:%S')) . " <br>";;
            // %A :le jour de la semaine en toutes lettres 
            //%d :le jour du mois en deux chiffres
            //%B: le mois en toutes lettres %b lers lettres en abrege
            //%Y : l'znnée sur 4 chiffres
            // %I: l'heure 0-12
            //%M: minutes
            //%S : secondes
            echo "<br><br><br>";

            echo "exo4 <br>";

            //le timestamps le nom de seconde ecoulées  depuis le 1er janvier 1970 à minuit
            //$timestamp2=new dateTime()
            //echo $timestamp2 ->get_timestamp();
            echo ' le  Timestamp actuel : ' . time() . '<br>';
            //$timestamp2=new dateTime("02/08/2016 15:00");
            //echo $timestamp2 ->get_timestamp();
            //echo $timestamp2 ->get_timestamp();
            echo "le timesptam pour la date 02/08/2016 a 15h00 est  " . mktime('15', '00', '02', '08', '2016');
            echo "<br><br><br>";


            echo "exo5 <br>";
            // ma methode etais pas la bonne 
            $dat_jour = intval(date("dmy"));
            echo $dat_jour . "<br>  ";
            $dat = 060516;
            $diff = $dat_jour - $dat;
            echo " le nombre de jour qui sépare la date du jour avec le 16 mai 2016" . $diff;
            echo "<br>";
            //correction de l'exo

            //$start_date=strtotime("2016-05-16"0);
            //$end_date=time("2021-02-01");
            //echo floor((start_date-$end_date)/86400)  ;     86400 c'est le nombre de secondes par 24h


            //Autre Solution

            //$date1 = new DateTime(date("d-m-y"));
            //$date2= new DateTime(date("16-05-2016));
            //$intervalle=date1->diff($date2);
            //$nbdays=$intervalle->format('%a');
            // methode qui recupere les jours : $nbdays=$intervalle->days;
            //echo $nbdays;

            echo "<br><br><br>";
            echo "exo6 <br>";

            $nbdays = cal_days_in_month(CAL_GREGORIAN, 2, 2016);
            echo " le nombre de jours du mois de fevrier est $nbdays";
            // autre solution 
            $nico1 = date('t', mktime(0, 0, 0, 2, 1, 2016));
            //mktime pour convertir
            echo "<br> une deuxieme solution " . $nico1;

            echo "<br><br><br>";

            echo "exo7 <br>";
            echo date('d-m-Y', strtotime('+20 days'));

            //autre ssolution 
            //$date1  = new DateTime(date());
            //$date1->add(new DateInterval("P20D"));ajouter un intervalle p=periode 20 D=days jour
            //echo $date1-> format("l m y");


            echo "<br><br><br>";
            echo "exo8 <br>";

            echo date('d-m-Y', strtotime('-22 days'));
            //autre ssolution 
            // $date1  = new DateTime();
            // $date1->sub(new DateInterval("P22D")); //enlever un intervalle p=periode 20 D=days jour
            // echo $date1-> format("l m y");
            ?>
</body>

</html>