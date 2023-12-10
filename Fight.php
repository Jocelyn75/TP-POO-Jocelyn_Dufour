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
                    $result = $challenger->getStamina() - $ippo->getStrength();
                }
            else 
            {
                $result = $ippo->getStamina() - $challenger->getStrength();
            }
        }
        return $result;
    }
}
$fight = new Fight;
echo $fight->fighting($ippo, $challenger);

?>