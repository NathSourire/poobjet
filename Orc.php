<?php
require_once __DIR__ . '/Character.php';

class Orc extends Character
{
    protected int $damage;

    /**
     * méthode magique qui construit automatiquement la fonction
     * @param int $health
     * @param int $rage
     */
    public function __construct(int $health, int $rage)
    {
        parent::__construct($health, $rage);
        // $this->__toString();
    }

    /**
     * méthode magique qui affiche un message
     * @return string
     */
    public function __toString(): string
    {
        return 'La vie est de : ' . $this->getHealth() . ' La force de frappe est de : ' . $this->getRage() ;
    }

    /**
     * méthode qui retourne les dommages
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }

    /**
     * méthode attribut la valeur de dommage
     * @param int $damage
     */
    public function setDamage(int $damage)
    {
        $this->damage = $damage;
    }
    
    /**
     * attaque aléatoire comprise entre 600 et 800
     * @param int $damage
     */
    public function attack()
    {
        $this->setDamage(rand(600, 800)) ;
    }

}
