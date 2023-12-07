<?php

class Ippo
{
    public $_name;
    public $_stamina;
    public $_speed;
    public $_strength;

    public function __construct($name, $stamina, $speed, $strength)
{
    $this->setName($name);
    $this->setStamina($stamina);
    $this->setSpeed($speed);
    $this->setStrength($strength);
}

    public function setName($name)
    {
        if(is_string($name))
        {
            $this->_name = $name;
        }
        else
        {
            return false;
        }
    }

    public function setStamina($stamina)
        {
        if(is_int($stamina))
        {
            $this->_stamina = $stamina;
        }
        else
        {
            return false;
        }
        }

    public function setSpeed($speed)
    {
        if(is_int($speed))
        {
            $this->_speed = $speed;
        }
        else
        {
            return false;
        }
    }

    public function setStrength($strength)
    {
        if(is_int($strength))
        {
            $this->_strength = $strength;
        }
        else
        {
            return false;
        }
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getStamina()
    {
        return $this->_stamina;
    }

    public function getSpeed()
    {
        return $this->_speed;
    }

    public function getStrength()
    {
        return $this->_strength;
    }



}

$ippo = new Ippo("Ippo", 20762, 90, 1721);
echo $ippo->getName() . "\n";
echo $ippo->getStamina() . "\n";
echo $ippo->getSpeed() . "\n";
echo $ippo->getStrength() . "\n";
?>