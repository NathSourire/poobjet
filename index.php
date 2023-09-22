<?php

require_once __DIR__ . '/Hero.php';
require_once __DIR__ . '/Orc.php';




$hero = new Hero(1000, 0, 'hache', 120, 'armure', 600,);
$orc = new Orc(600, 0);

// echo $hero;
// echo $orc;



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Jeu de combat crée lors d'une initiation à la programmation orientée objet sur le thème de Eden Eternal ">
    <link rel="shortcut icon" href="/public/assets/img/eden_eternal_icon.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Combat initiation</title>
</head>

<body>
    <audio src="https://soundcloud.com/mmomusic/eden-eternal-track-10?in=mmomusic/sets/eden-eternal&utm_source=clipboard&utm_medium=text&utm_campaign=social_sharing"></audio>
    <main class="container-fluid">
        <div class="row ">
            <?php

            while ($hero->getHealth() > 0 && $orc->getHealth() > 0) {
                $orc->attack();
                $damageHero = $orc->getDamage() - $hero->getShieldValue();
                if ($hero->getRage() >= 100) {
                    $orc->setHealth($orc->getHealth() - $hero->getWeaponDamage());
                    $hero->setRage(0);
                } elseif ($orc->getHealth() > 0) {
                    $newHealth = $orc->getHealth() - $hero->getWeaponDamage();
                    $orc->setHealth($newHealth);
                }
                $hero->attacked($orc->getDamage()); ?>

                <div class="orcLife col-lg-3 my-2 ">
                    <p> La force de frappe est de : <?= $orc->getDamage() ?></p>
                    <p> La vie de l'orc est de : <?= $orc->getHealth() ?></p>
                </div>
                <div class="heroLife offset-md-6 col-lg-3 my-2 ">
                    <p> La vie est de : <?= $hero->getHealth() ?></p>
                    <p> La force de rage est de : <?= $hero->getRage() ?></p>
                    <p> les dégâts absorbés est : <?= $damageHero ?> </p>
                    <p> la puissance de l'armure est : <?= $hero->getShieldValue() ?></p>
                </div>

                <?php
                // $newHealth = ($newHealth > 0) ? $newHealth : 0; 
                if ($hero->getHealth() <= 0) { ?>
                    <div class="winner2 col-6 ">
                        <img class="position-absolute bottom-50 end-50" src="/public/assets/img/ogre.png" alt="Ogre">
                        <p class="text-center position-absolute top-50 start-50">L'orc a gagné </p>
                    </div>
                <?php } elseif ($orc->getHealth() <= 0) { ?>
                    <div class="winner1 col-6">
                        <img class="position-absolute top-50 start-50" src="/public/assets/img/Warrior.webp" alt="Guerrier">
                        <p class="text-center position-absolute bottom-50 end-50">Le héro a gagné </p>
                    </div>
            <?php }
            } ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>