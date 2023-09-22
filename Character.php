<?php


class Character
{
    protected int $health;
    protected int $rage;

    /**
     * méthode qui retourne la valeur de la vie
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * méthode qui retourne la force de frappe
     * @return int
     */
    public function getRage(): int
    {
        return $this->rage;
    }

    /**
     * méthode attribut la valeur de santé
     * @param int $health
     */
    public function setHealth(int $health)
    {
        $this->health = $health;
    }

    /**
     * méthode attribut la valeur de la force de frappe
     * @param int $rage
     */
    public function setRage(int $rage)
    {
        $this->rage = $rage;
    }


    /**
     * méthode magique appelée automatiquement lors de l'instance de la class.
     * hydrate l'objet (on lui affecte des valeurs)
     * @param int $health
     * @param int $rage
     */
    public function __construct(int $health, int $rage)
    {
        // $this->health = $health;
        // $this->rage = $rage;
        //ou
        $this->setHealth($health);
        $this->setRage($rage);
    }
}
