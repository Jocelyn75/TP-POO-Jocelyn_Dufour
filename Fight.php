<?php

require_once "Ippo.php";
require_once "Challenger.php";

class Fight
{
    public function fighting($ippo, $challenger)
    {
        $i=0;
        for($i=0; $i<10; $i++)
        {
            if($ippo->getSpeed() > $challenger->getSpeed())
                {
                    return $challenger->getStamina() - $ippo->getStrength();
                }
        }
    }
}


$fight = new Fight;
echo $fight->fighting($ippo, $challenger);


?>