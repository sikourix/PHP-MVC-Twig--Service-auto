<?php

class VehiculePDO
{
    public static function getAll()
    { //Préparer la requête
        $query = BDD->prepare('SELECT * FROM voitures');
        //Récupérer dans $query les résultats / Exécution de la requête SQL
        $query->execute();
        // Initialisation d'un tableau pour stocker les véhicules récupérés
        $vehicules = array();
        //$data pour ranger toutes les info / Boucle sur chaque ligne de résultat retourné par la requête
        while ($data = $query->fetch()) {
            $moteur = new Moteur($data['puissance']);
            //Vérification du type de véhicule et création de l'objet approprié
            if ($data['type'] === 'Fourgon') {
                $vehicules[] = new Fourgon($data['id'], $data['marque'], $data['modele'], $data['immatriculation'], $data['image'], $data['couleur'], $data['poids'], $data['reservoir'], $data['message'], $data['volume'], $data['type'],  $data['places'], $moteur);
            } else {
                $vehicules[] = new Voiture($data['id'], $data['marque'], $data['modele'], $data['immatriculation'], $data['image'], $data['couleur'], $data['poids'], $data['reservoir'], $data['message'], $data['type'],  $data['places'], $moteur);
            }
        }
        // Retourne le tableau contenant tous les véhicules récupérés
        return $vehicules;
    }

    public static function getOne($id)
    { { //préparer la requête pour selectionne une voiture avec un l'id(:id est une variable)
            $query = BDD->prepare('SELECT * FROM voitures WHERE id = :id');
            //executer la reqûete id comme paramètre(tableau en clé la valeur :id qu'on souhaite récup)
            $query->execute(array(':id' => $id));
            //$data pour ranger toutes les info

            $data = $query->fetch();

            $moteur = new Moteur($data['puissance']);
            //récupere le type
            if ($data['type'] == 'Fourgon') {
                $vehicule = new Fourgon($data['id'], $data['marque'], $data['modele'], $data['immatriculation'], $data['image'], $data['couleur'], $data['poids'], $data['reservoir'], $data['message'], $data['volume'], $data['type'],  $data['places'], $moteur);
            } else {
                $vehicule = new Voiture($data['id'], $data['marque'], $data['modele'], $data['immatriculation'], $data['image'], $data['couleur'], $data['poids'], $data['reservoir'], $data['message'], $data['type'],  $data['places'], $moteur);
            }
        }
        return $vehicule;
    }
}
