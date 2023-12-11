<?php

require_once "Ippo.php";
require_once "Challenger.php";

class Fight
{
    public function fighting(Ippo $ippo, Challenger $challenger) // Ici, Ippo et Challenger indiquent que l'on ne peut mettre en paramètre qu'un objet issu de la classe Ippo/Challenger. C'est une "injection par indépendance". 
    {
        $ippoStamina = $ippo->getStamina();
        $challengerStamina = $challenger->getStamina();

        for($i=0; $i<10; $i++)
        {   
            if(rand(1,10) === 1)
            {
                $challengerStamina = $challengerStamina - $ippo->getStrength() * 2;
                echo "Coup critique pour Ippo ! \n";
            }

            if($ippo->getSpeed() > $challenger->getSpeed())
                
            $challengerStamina = $challengerStamina - $ippo->getStrength();
            echo "Points de vie restants de Challenger : $challengerStamina \n";

            if($ippoStamina <= 0 )
                {
                    return "Le combat est terminé, Challenger a gagné";
                }
            if($challengerStamina <= 0)
                {
                    return "Le combat est terminé, Ippo a gagné";
                }
            else
            {
                if(rand(1,10) === 2)
                {
                    $ippoStamina = $ippoStamina - $challenger->getStrength() * 2;
                    echo "Coup critique pour Challenger ! \n";
                }
                $ippoStamina = $ippoStamina - $challenger->getStrength();
                echo "Points de vie restants d'Ippo : $ippoStamina \n";
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