<?php

require_once('./challenger.php');
require_once('./ippo.php');

class Fight3 {


  public function fighting(Ippo $ippo, Challenger $challenger)
  {
 
    $staminaMaxIppo = $ippo->stamina;
    $staminaMaxChallenger = $challenger->stamina;

    for($round = 1; $round <= 10; $round++)
    {
      if(rand(1, 2) === 1)
      {
        $ippo->strength = $challenger->stamina;
        $challenger->stamina = $challenger->stamina - $ippo->strength;

        echo "C'est Parti pour le ROUND " . $round . " ! \n"; 

        echo "Je n'en crois pas mes yeux " . strtoupper($ippo->name) . " a mis K.O " . $challenger->name . " au $round ROOUNNND !\n";
        echo "Avec un coup SURPUISSSSSSANT !!!!!!  \n";

        echo "Stamina " . $challenger->name . " : " . $challenger->stamina. " sur " . $staminaMaxChallenger . "\n";
        echo "Stamina " . $ippo->name . " : " . $ippo->stamina . " sur " . $staminaMaxIppo . "\n";
  
        break;
      }
      elseif(rand(1, 2) === 2)
      {
        $challenger->strength = $ippo->stamina;
        $ippo->stamina = $ippo->stamina - $challenger->strength;

        echo "C'est Parti pour le ROUND " . $round . " ! \n"; 
        echo "Je n'en crois pas mes yeux " . strtoupper($challenger->name) . " a mis K.O " . $ippo->name . " au $round ROOUNNND !\n";
        echo "Avec un coup SURPUISSSSSSANT !!!!!!  \n";

        echo "Stamina " . $ippo->name . " : " . $ippo->stamina . " sur " . $staminaMaxIppo . "\n";
        echo "Stamina " . $challenger->name . " : " . $challenger->stamina. " sur " . $staminaMaxChallenger . "\n";

        break;
      }
      if($ippo->speed > $challenger->speed)
      {
        echo "C'est Parti pour le ROUND " . $round . " ! \n"; 
        $challenger->stamina = $challenger->stamina - $ippo->strength;
  
        echo "Commentateur : Quel coup terrible de " . $ippo->name . " !!! naniii !! \n";
        echo "Stamina " . $challenger->name . " : " . $challenger->stamina. " sur " . $staminaMaxChallenger . "\n";
  
        $ippo->stamina = $ippo->stamina - $challenger->strength; 
        echo "Commentateur : La réponse de " . $challenger->name . " mais quel cooup incroyableee ! \n";
        echo "Stamina " . $ippo->name . " : " . $ippo->stamina . " sur " . $staminaMaxIppo . "\n";
        echo "Commentateur : FIN DU ROOUNNNNNNND " . $round . "  YAHHHHHHHH ! \n \n";
      }else{

        $ippo->stamina = $ippo->stamina - $challenger->strength;
        
        echo "Commentateur : Quel coup terrible de " . $challenger->name . " !!! naniii !! \n";
        echo "Stamina " . $ippo->name . " : " . $ippo->stamina . " sur " .$staminaMaxIppo . "\n";

        $challenger->stamina = $challenger->stamina - $ippo->strength;

        echo "Commentateur : La réponse de " . $challenger->name . " mais quel cooup incroyableee ! \n";
        echo "Stamina " . $challenger->name . " : " . $challenger->stamina. " sur " . $staminaMaxChallenger . "\n";
        echo "Commentateur : FIN DU ROOUNNNNNNND " . $round . "  YAHHHHHHHH ! \n";
      }
      if($round === 10 )
      {
        if($ippo->stamina > $challenger->stamina)
        {
          echo "Le WINNNNNNEEEEEEEEERRRRR EST " .  $ippo->name . " YaTTTTTHHHHH \n";  
        }
        else
        {
          echo "Le WINNNNNNEEEEEEEEERRRRR EST " . $challenger->name . " YaTTTTTHHHHH \n";  
        }
      }
    }
  }
}

$fight = new Fight3;
echo $fight->fighting($ippo, $challenger);