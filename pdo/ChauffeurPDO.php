<?php

class ChauffeurPDO
{
    // Autres méthodes de la classe

    public static function getAll()
    {

        $query = BDD->prepare('SELECT * FROM chauffeurs');
        $query->execute();
        $chauffeurs = array();

        while ($data = $query->fetch()) {
            // Créez des objets Chauffeur et ajoutez-les à un tableau
            $vehicule = VehiculePDO::getOne($data['vehicule']);

            $chauffeurs[] = new Chauffeur($data['id'], $data['nom'], $data['prenom'], $data['image'], $vehicule);
        }

        return $chauffeurs;
    }

    public static function getOne($id)
    {

        $query = BDD->prepare('SELECT * FROM chauffeurs WHERE id = :id');
        $query->execute(array(':id' => $id));
        $data = $query->fetch();
        $vehicule = VehiculePDO::getOne($data['vehicule']);
        $chauffeur = new Chauffeur($data['id'], $data['nom'], $data['prenom'], $data['image'], $vehicule);

        return $chauffeur;
    }

    public static function getByVehicule($id)
    {

        $query = BDD->prepare('SELECT * FROM chauffeurs WHERE vehicule = :id');
        $query->execute(array(':id' => $id));
        $data = $query->fetch();
        $vehicule = VehiculePDO::getOne($data['vehicule']);
        $chauffeur = new Chauffeur($data['id'], $data['nom'], $data['prenom'], $data['image'], $vehicule);

        return $chauffeur;
    }
}
