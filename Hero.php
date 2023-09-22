<?php
require_once __DIR__ . '/Character.php';



/**
 * création héro fille de la class Character
 */
class Hero extends Character
{
    private string $weapon;    //nom de l'arme
    private int $weaponDamage;  //puissance de l'arme
    private string $shield;    //nom de l'armure
    private int $shieldValue;   //puissance de l'armure

    /**
     * @param int $health
     * @param int $rage
     * @param string $weapon
     * @param int $weaponDamage
     * @param string $shield
     * @param int $shieldValue
     */
    public function __construct(int $health, int $rage, string $weapon, int $weaponDamage, string $shield, int $shieldValue = 0)
    {
        parent::__construct($health, $rage);
        $this->setWeapon($weapon);
        $this->setweaponDamage($weaponDamage);
        $this->setshield($shield);
        $this->setshieldValue($shieldValue);
    }

    /**
     * méthode magique qui affiche un message
     * @return string
     */
    public function __toString(): string
    {
        return 'La vie est de : ' . $this->getHealth() . ' La force de frappe est de : ' . $this->getRage() .  ' l\'arme est : ' . $this->weapon . ' la puissance de l\'arme est : ' . $this->weaponDamage . ', l\'armure est ' . $this->shield . ' la puissance de l\'armure est : ' . $this->shieldValue;
    }

    /**
     * création de méthode pour retourner des valeurs
     */
    public function getWeapon(): string
    {
        return $this->weapon;
    }
    public function getWeaponDamage(): int
    {
        return $this->weaponDamage;
    }
    public function getShield(): string
    {
        return $this->shield;
    }
    public function getShieldValue(): int
    {
        return $this->shieldValue;
    }

    /**
     * création de méthode pour attribuer des valeurs
     */
    public function setWeapon(string $weapon)
    {
        $this->weapon = $weapon;
    }
    public function setWeaponDamage(int $weaponDamage)
    {
        $this->weaponDamage = $weaponDamage;
    }
    public function setShield(string $shield)
    {
        $this->shield = $shield;
    }
    public function setShieldValue(int $shieldValue)
    {
        $this->shieldValue = $shieldValue;
    }

    /**
     * @param int $damage
     */
    public function attacked(int $damage)
    {
        // on stock les domage - la durabilité de l'armure
        $damageTaken = $damage - $this->getShieldValue();
        // si domage et superieur a 0 
        if ($damageTaken > 0){
            $this->setHealth($this->getHealth() - $damageTaken);
        }
        // on retire /15 a domage de l'armure
        $newValue = round($this->getShieldValue() - ($damage / 15));
        $newValue = ($newValue > 0 ) ? $newValue : 0 ;
        $this->setShieldValue($newValue);
        $this->setRage($this->getRage()+30); 
    }
}
// $hero = new Hero(1000, 150, ' hache', 150, 'armure', 250);
// echo $hero->__toString();
