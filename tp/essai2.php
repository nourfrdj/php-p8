<?php
function afficheCal($nbrecase,$nbdays){
  ?>
    <tr>
    <?php
        for ($vide=0;$vide<=$nbrecase;$vide++){
        if ($vide<=7){ ?>
           <td><?php echo "" ?></td>
      <?php  }

      else
    { ?>
    </td>
    <?php
        $i=$vide;
        while ($i <= $nbdays) { ?>
                        
            <?php
            for ($j = 1; $j <= 7; $j++) {
                if ($i <= $nbdays) {
            ?>
                    <td><?php echo $i; ?></td>
                <?php $i++;
                } else { ?>
               
            <?php
                }
            }
       
    }

    }
      }
}
?>
 function afficheCal($nbrecase,$nbdays){    ?>
            <tr>                      
                               <?php     for ($vide = 0; $vide <= $nbrecase; $vide++) {
                                        ?>
                                        <td><?php echo "  " ?></td>
                                        <?php
                                    }
                                    $x = 7;
                                    while ($vide <= $nbdays) { ?>
                                        <tr>
                                            <?php
                                            for ($j = 1; $j <= 7; $j++) {
                                                if ($vide <= $nbdays) {
                                            ?>
                                                    <td><?php echo $vide; ?></td>
                                                <?php $vide++;
                                                } else { ?>
                                                    <td><?php echo "" ?></td>
                                    <?php
                                                }
                                                <?php