<?php

require_once "Ippo.php";
require_once "Challenger.php";

class Fight
{
    public function fighting($ippo, $challenger)
    {
        $ippoStamina = $ippo->getStamina();
        $challengerStamina = $challenger->getStamina();
        for($i=0; $i<15; $i++)
        {
            if($ippo->getSpeed() > $challenger->getSpeed())
                {
                    $challengerStamina = $challengerStamina - $ippo->getStrength();
                    echo "Points de vie restants d'Ippo : $ippoStamina \n Points de vie restants de Challenger : $challengerStamina \n";
                    if($ippo->getSpeed() > $challenger->getSpeed())
                    {
                        $ippoStamina = $ippoStamina - $challenger->getStrength();
                        echo "Points de vie restants d'Ippo : $ippoStamina \n Points de vie restants de Challenger : $challengerStamina";
                        if($ippoStamina < 0 || $challengerStamina < 0 )
                        {
                            return "Le combat est terminé";
                        }
                    }
                    else
                    {
                        $ippoStamina = $ippo->getStamina() - $challenger->getStrength();
                    }
                }
            else
                {
                $ippoStamina = $ippo->getStamina() - $challenger->getStrength();
                }
        }
    }
}
$fight = new Fight;
echo $fight->fighting($ippo, $challenger);

?>