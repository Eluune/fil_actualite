<?php
  include("bdd/config.php");
  include("bdd/bdd.php");

  // Requete récupérations des evenements de la bdd
  $sql = "SELECT * FROM evenement";
  $resultats=$bdd->query($sql);
  $tableau=$resultats->fetchAll(PDO::FETCH_OBJ);
  $resultats->closeCursor();

  function resumer($texte, $mots)
  {
    if(!isset($mot)) { $mots = 30; }
    $chaine = explode(" ", $texte);
    $r = "";

    for($i = 0 ; $i < $mots ; $i++)
    {
      $r = $r." ".$chaine[$i];
    }

    $r = $r."[...]";
    return $r;
  }

  function formaterDate($date)
  {
    $date = explode("-", $date);

    switch($date[1])
    {
      case "01": $mois = "Janvier"; break;
      case "02": $mois = "Février"; break;
      case "03": $mois = "Mars"; break;
      case "04": $mois = "Avril"; break;
      case "05": $mois = "Mai"; break;
      case "06": $mois = "Juin"; break;
      case "07": $mois = "Juillet"; break;
      case "08": $mois = "Août"; break;
      case "09": $mois = "Septembre"; break;
      case "10": $mois = "Octobre"; break;
      case "11": $mois = "Novembre"; break;
      case "12": $mois = "Décembre"; break;
    }

    $r = $date[2]." ".$mois." ".$date[0];

    return $r;
  }
?>

<div class="timeline">
  <?php for($i = 0 ; $i < count($tableau) ; $i++): ?>
    <?php if($i % 2 == 0): ?>

      <div class="container left">
        <div class="content gauche" id="content<?php echo($tableau[$i]->id); ?>">

          <div class="sub-content">
            <table>
              <tr> <th class="titre"><?php echo($tableau[$i]->nom); ?></th> </tr>
              <tr> <td class="ss-titre">Synopsis</td> </tr>
              <tr>
                <td class="synopsis">
                  <span id="synopsis-resume<?php echo($tableau[$i]->id); ?>">
                    <?php
                      $texte = resumer($tableau[$i]->synopsis, 30);
                      echo($texte);
                    ?>
                  </span>
                  <span class="synopsis-entier" id="synopsis-entier<?php echo($tableau[$i]->id); ?>"> <?php echo($tableau[$i]->synopsis); ?> </span>
                </td>
              </tr>
            </table>
          </div>

          <img class="affiche" src="<?php echo($tableau[$i]->affiche); ?>" alt="<?php echo($tableau[$i]->nom); ?>">

          <div class="date dategauche">
            Programmation de la semaine du <br>
            <?php
              $date = formaterDate($tableau[$i]->date);
              echo($date);
            ?>
          </div>

          <button  class="btn_gauche" id="voirplus<?php echo($tableau[$i]->id); ?>" type="button" name="button"> VOIR PLUS </button>

          <div class="informations" id="info<?php echo($tableau[$i]->id); ?>">
            <table>
              <tr>
                <th> Date de sortie </th>
                <td>
                  <?php
                    $date = formaterDate($tableau[$i]->datesortie);
                    echo($date);
                  ?>
                </td>
              </tr>

              <tr>
                <th> Genre </th>
                <td> <?php echo($tableau[$i]->genre); ?> </td>
              </tr>

              <tr>
                <th> Réalisateur </th>
                <td> <?php echo($tableau[$i]->realisateur); ?> </td>
              </tr>

              <tr>
                <th> Acteurs </th>
                <td> <?php echo($tableau[$i]->acteurs); ?> </td>
              </tr>
            </table>
          </div>
        </div>
      </div>

    <?php endIf; ?>

    <?php if($i % 2 == 1): ?>

      <div class="container right">
        <div class="content droite">

          <div class="date datedroite">
            Programmation de la semaine du <br>
            <?php
              $date = formaterDate($tableau[$i]->date);
              echo($date);
            ?>
          </div>

          <img class="affiche" src="<?php echo($tableau[$i]->affiche); ?>" alt="<?php echo($tableau[$i]->nom); ?>">

          <div class="sub-content">
            <table>
              <tr> <th class="titre"><?php echo($tableau[$i]->nom); ?></th> </tr>
              <tr> <td class="ss-titre">Synopsis</td> </tr>
              <tr>
                <td class="synopsis">
                  <span id="synopsis-resume<?php echo($tableau[$i]->id); ?>">
                    <?php
                      $texte = resumer($tableau[$i]->synopsis, 30);
                      echo($texte);
                    ?>
                  </span>
                  <span class="synopsis-entier" id="synopsis-entier<?php echo($tableau[$i]->id); ?>"> <?php echo($tableau[$i]->synopsis); ?> </span>
                </td>
              </tr>
            </table>
          </div>

          <button  class="btn_gauche" id="voirplus<?php echo($tableau[$i]->id); ?>" type="button" name="button"> VOIR PLUS </button>

          <div class="informations" id="info<?php echo($tableau[$i]->id); ?>">
            <table>
              <tr>
                <th> Date de sortie </th>
                <td>
                  <?php
                    $date = formaterDate($tableau[$i]->datesortie);
                    echo($date);
                  ?>
                </td>
              </tr>

              <tr>
                <th> Genre </th>
                <td> <?php echo($tableau[$i]->genre); ?> </td>
              </tr>

              <tr>
                <th> Réalisateur </th>
                <td> <?php echo($tableau[$i]->realisateur); ?> </td>
              </tr>

              <tr>
                <th> Acteurs </th>
                <td> <?php echo($tableau[$i]->acteurs); ?> </td>
              </tr>
            </table>
          </div>

        </div>
      </div>

    <?php endIf; ?>
  <?php endFor; ?>
</div>
