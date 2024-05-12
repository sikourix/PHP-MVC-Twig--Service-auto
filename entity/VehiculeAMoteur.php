<?php

class VehiculeAMoteur extends Vehicule
{
    private $moteur;

    public function __construct(int $id, string $marque, string $modele, string $immatriculation, string $image, string $couleur, int $poids, float $capaciteReservoir, string $message, int $nbPlaces = 5, Moteur $moteur)
    {
        parent::__construct($id, $marque, $modele, $immatriculation, $image, $couleur, $poids, $capaciteReservoir, $message, $nbPlaces);
        $this->setMoteur($moteur);
    }

    public function demarrer()
    {
        return $this->moteur->demarrer();
    }
    public function arreter()
    {
        $this->moteur->arreter();
    }
    public function faireLePlein()
    {
        $this->moteur->arreter();
        $this->moteur->faireLePlein();
        $this->moteur->demarrer();
    }

    public function rouler(float $volume)
    {
        if (!$this->demarrer()) {
            $this->demarrer();
        }
        return $this->moteur->utiliser($volume);
    }
    /**
     * Get the value of moteur
     */
    public function getMoteur()
    {
        return $this->moteur;
    }

    /**
     * Set the value of moteur
     *
     * @return  self
     */
    public function setMoteur($moteur)
    {
        $this->moteur = $moteur;

        return $this;
    }
}
