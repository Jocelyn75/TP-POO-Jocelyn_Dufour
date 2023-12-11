<?php

require_once "Ippo.php";
require_once "Challenger.php";

class Fight
{
    public function coupCritique()
    {
    rand(1,2);
    }
    public function fighting($ippo, $challenger)
    {
        $ippoStamina = $ippo->getStamina();
        $challengerStamina = $challenger->getStamina();

        for($i=0; $i<10; $i++)
        {    
            if($ippo->getSpeed() > $challenger->getSpeed())
                {   
                    $challengerStamina = $challengerStamina - $ippo->getStrength();
                    echo "Points de vie restants de Challenger : $challengerStamina \n";

                    if($ippoStamina < 0 )
                        {
                            return "Le combat est terminé, Challenger a gagné";
                        }
                    if($challengerStamina < 0)
                        {
                            return "Le combat est terminé, Ippo a gagné";
                        }
                    else
                    {
                        $ippoStamina = $ippoStamina - $challenger->getStrength();
                        echo "Points de vie restants d'Ippo : $ippoStamina \n";
                    }
                }
        }
    }
}
$fight = new Fight;
echo $fight->fighting($ippo, $challenger);


/*

$result = $this->coupCritique();
{
    if ($result == 1)
    { 
        return $ippo->getStrength() == $ippo->getStrength() * 2;
        echo "Coup critique pour Ippo !";

    }
    if ($result === 2)
    {
        return $challenger->getStrength() == $challenger->getStrength() * 2;
        echo "Coup critique pour Challenger !";
    }
}

*/

?>