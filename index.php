<?php
require_once './utilitaires/config.php';
require_once './utilitaires/PanneException.php';
require_once './pdo/connexion.php';
require_once './entity/Moteur.php';
require_once './pdo/VehiculePDO.php';
require_once './entity/Vehicule.php';
require_once './entity/VehiculeAMoteur.php';
require_once './entity/Voiture.php';
require_once './entity/Fourgon.php';
require_once './entity/Chauffeur.php';
require_once './pdo/ChauffeurPDO.php';

// $vehicules = VehiculePDO::getAll();

// foreach ($vehicules as $key => $value) {
//     echo $value->getMarque() . '<br>';
// }

// $vehicule = VehiculePDO::getOne(1);
// echo $vehicule->getMarque() . '<br>';

// // Récupération de tous les chauffeurs
// $chauffeurs = ChauffeurPDO::getAll();

// // Affichage de chaque chauffeur
// foreach ($chauffeurs as $key => $value) {
//     // Obtention du chemin de l'image pour chaque chauffeur
//     $imagePath = $value->getImage();

//     echo '<div>';
//     echo '<h2>' . $value->getNom() . ' '  . '</h2>';
//     echo $value->getVehicule()->getMoteur()->getPuissance() . 'cv<br>';
//     echo '<img src="' . $imagePath . '" alt="Photo du chauffeur">';
//     echo '</div>';
// }


// $chauffeur = ChauffeurPDO::getOne(2);
//echo $chauffeur->getNom() . ' ' . $chauffeur->getVehicule()->getMoteur()->getPuissance() . 'cv<br>';

$vehicules = VehiculePDO::getAll();

//afficher le contenu du html mais sans twig
echo $twig->render(
    'index.html.twig',
    ['vehicules' => $vehicules]
);
