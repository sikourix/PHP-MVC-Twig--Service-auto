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

//Déclarer la variable chauffeur pour l'utiliser dans chauffeur.html.twig
$chauffeur = ChauffeurPDO::getByVehicule($_GET['id']);
echo $twig->render(
    'chauffeur.html.twig',
    ['chauffeur' => $chauffeur]
);

// $voiture = VoiturePDO::getOne($_GET['id']);
