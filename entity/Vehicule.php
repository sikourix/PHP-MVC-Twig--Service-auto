<?php

abstract class Vehicule
{
    private static $nbVehicule = 0;

    protected $id;
    protected $marque;
    protected $modele;
    protected $immatriculation;
    protected $image;
    protected $couleur;
    protected $poids;
    protected $capaciteReservoir;
    protected $niveauCarburant;
    protected $nbPlaces;
    protected $assure;
    protected $message;


    public function __construct(int $id, string $marque, string $modele, string $immatriculation, string $image, string $couleur, int $poids, float $capaciteReservoir, string $message, int $nbPlaces = 5)
    {
        $this->setId($id);
        $this->setMarque($marque);
        $this->setModele($modele);
        $this->setImmatriculation($immatriculation);
        $this->setImage($image);
        $this->setCouleur($couleur);
        $this->setPoids($poids);
        $this->setCapaciteReservoir($capaciteReservoir);
        $this->setNiveauCarburant(5.0);
        $this->setNbPlaces($nbPlaces);
        $this->setAssure(false);
        $this->setMessage($message);
        self::$nbVehicule++;
    }

    public function repeindre($couleur = null)
    {
        if (!isset($couleur)) {
            $this->message = 'Erreur : J\'ai besoin de connaitre la nouvelle couleur !';
        } elseif ($couleur == $this->couleur) {
            $this->message = 'Merci de m\'avoir raffraîchi le teint !';
            $this->couleur = $couleur;
        } else {
            $this->message = 'J\'aime beaucoup cette couleur ' . $couleur . ' !';
            $this->couleur = $couleur;
        }
    }

    public function mettreCarburant($quantite)
    {
        if ($quantite > ($this->capaciteReservoir - $this->niveauCarburant)) {
            $this->message = 'Tu vas mouiller tes chaussures ! J\'ai déjà ' . $this->niveauCarburant . ' l.';
        } else {
            $this->niveauCarburant += $quantite;
            $this->message = 'Merci pour le carburant, j\'ai maintenant ' . $this->niveauCarburant . ' l';
        }
    }

    abstract public function demarrer();
    abstract public function arreter();
    abstract public function faireLePlein();



    /**
     * Get the value of immatriculation
     */
    public function getImmatriculation()
    {
        return substr($this->immatriculation, 0, 2) . ' ' . substr($this->immatriculation, 2, 3) . ' ' . substr($this->immatriculation, 5, 2);
    }

    /**
     * Set the value of immatriculation
     *
     */
    public function setImmatriculation($immatriculation)
    {
        $this->immatriculation = $immatriculation;
    }

    /**
     * Get the value of couleur
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set the value of couleur
     *
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }

    /**
     * Get the value of poids
     */
    public function getPoids()
    {
        return $this->poids;
    }

    /**
     * Set the value of poids
     *
     */
    public function setPoids($poids)
    {
        $this->poids = $poids;
    }


    /**
     * Get the value of capacitéReservoir
     */
    public function getCapaciteReservoir()
    {
        return $this->capaciteReservoir;
    }

    /**
     * Set the value of capacitéReservoir
     *
     */
    public function setCapaciteReservoir($capaciteReservoir)
    {
        $this->capaciteReservoir = (float)$capaciteReservoir;
    }

    /**
     * Get the value of niveauCarburant
     */
    public function getNiveauCarburant()
    {
        return $this->niveauCarburant;
    }

    /**
     * Set the value of niveauCarburant
     *
     */
    public function setNiveauCarburant($carburant)
    {
        if ($carburant <= $this->capaciteReservoir - $this->niveauCarburant) {
            $this->niveauCarburant += $carburant;
        } else {
            $this->message = "Trop de carburant";
        }
    }

    /**
     * Get the value of nbPlaces
     */
    public function getNbPlaces()
    {
        return $this->nbPlaces;
    }

    /**
     * Set the value of nbPlaces
     *
     */
    public function setNbPlaces($nbPlaces)
    {
        $this->nbPlaces = $nbPlaces;
    }

    /**
     * Get the value of assure
     */
    public function getAssure()
    {
        return $this->assure;
    }

    /**
     * Set the value of assure
     *
     */
    public function setAssure($assure)
    {
        $this->assure = $assure;
        if ($assure) {
            $this->message = "Merci de m'avoir assurée :)";
        } else {
            $this->message = "Attention ! L'assurance est obligatoire !";
        }
    }

    /**
     * Get the value of message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
    /**
     * Get the value of marque
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set the value of marque
     *
     * @return  self
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    /**
     * Get the value of nbVehicule
     */
    public static function getNbVehicule()
    {
        return self::$nbVehicule;
    }

    public function __toString()
    {
        $msg = 'Véhicule %s, de couleur %s et de poids %d kg avec %d places.';
        return sprintf($msg, $this->immatriculation, $this->couleur, $this->poids, $this->nbPlaces);
    }





    /**
     * Get the value of modele
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * Set the value of modele
     *
     * @return  self
     */
    public function setModele($modele)
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
