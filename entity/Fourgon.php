<?php
class Fourgon extends VehiculeAMoteur
{

    private $volume;
    private $type;

    public function __construct(int $id, string $marque, string $modele, string $immatriculation, string $image, string $couleur, int $poids,  float $capaciteReservoir, string $message, float $volume, string $type, int $nbPlaces = 3,  Moteur $moteur)
    {
        parent::__construct($id, $marque, $modele, $immatriculation, $image, $couleur, $poids, $capaciteReservoir, $message, $nbPlaces, $moteur);
        $this->setVolume($volume);
        $this->setType($type);
    }

    /**
     * Get the value of volume
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * Set the value of volume
     *
     * @return  self
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;

        return $this;
    }

    public function __toString()
    {
        $msg = parent::__toString();
        $msg .= sprintf('Volume : %s', $this->volume . 'm3');
        return $msg;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
