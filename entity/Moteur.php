<?php
define("CONSO_MIN", 0.1);
class Moteur
{
    private $volumeReservoir;
    private $volumeTotal;
    private $demarre;
    private $puissance;

    public function __construct(int $puissance, float $volumeReservoir = 10, float $volumeTotal = 50, bool $demarre = false)
    {
        $this->setPuissance($puissance);
        $this->setVolumeReservoir($volumeReservoir);
        $this->setVolumeTotal($volumeTotal);
        $this->setDemarre($demarre);
    }

    public function faireLePlein()
    {
        $volumeNecessaire = $this->volumeTotal - $this->volumeReservoir;
        $this->volumeReservoir = $this->volumeTotal;
        return ("Plein effectué avec " . $volumeNecessaire . " litres");
    }
    public function demarrer()
    {
        if (!$this->demarre && $this->volumeReservoir > CONSO_MIN) {
            $this->demarre = true;
        } else {
            throw new Exception('Le niveau du carburant est trop bas');
        }
        return $this->demarre;
    }
    public function arreter()
    {
        $this->demarre = false;
        return $this->demarre;
    }

    public function utiliser($carburant)
    {
        if ($this->volumeReservoir > $carburant) {
            $this->volumeReservoir -= ($carburant + CONSO_MIN);
        } else {
            $this->volumeReservoir = 0;
            throw new PanneException('Aïe ! Panne d\'essence !');
        }
    }
    /**
     * Get the value of volumeReservoir
     */
    public function getVolumeReservoir()
    {
        return $this->volumeReservoir;
    }

    /**
     * Set the value of volumeReservoir
     *
     * @return  self
     */
    public function setVolumeReservoir($volumeReservoir)
    {
        $this->volumeReservoir = $volumeReservoir;

        return $this;
    }

    /**
     * Get the value of volumeTotal
     */
    public function getVolumeTotal()
    {
        return $this->volumeTotal;
    }

    /**
     * Set the value of volumeTotal
     *
     * @return  self
     */
    public function setVolumeTotal($volumeTotal)
    {
        $this->volumeTotal = $volumeTotal;

        return $this;
    }

    /**
     * Get the value of demarre
     */
    public function getDemarre()
    {
        return $this->demarre;
    }

    /**
     * Set the value of demarre
     *
     * @return  self
     */
    public function setDemarre($demarre)
    {
        $this->demarre = $demarre;

        return $this;
    }

    /**
     * Get the value of puissance
     */
    public function getPuissance()
    {
        return $this->puissance;
    }

    /**
     * Set the value of puissance
     *
     * @return  self
     */
    public function setPuissance($puissance)
    {
        $this->puissance = $puissance;

        return $this;
    }
}
