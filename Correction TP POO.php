<?php

// On importe la class Ippo et Challenger.
require_once('./challenger.php'); 
require_once('./ippo.php');

class Fight2 {
  
  private $stMaxIppo; // propriété private qui contiendra la valeur de la stamina max de Ippo
  private $stMaxChallenger; // propriété private qui contiendra la valeur de la stamina max du challenger

  /** 
  * Notre constructeur reçoit deux objets (class ippo et class challenger) en paramètre, 
  * ce qui nous permattra d'initialiser nos propriétés.
  * 
  * @param object $ippo
  * @param object $challenger
  */
  public function __construct(Object $ippo, Object $challenger)
  {
    $this->stMaxIppo = $ippo->stamina; // J'initialise la stamina maximum de Ippo dans ma propriété stMaxIppo grâce à mon paramètre $ippo
    $this->stMaxChallenger = $challenger->stamina; // J'initialise la stamina maximum du challenger dans ma propriété stMaxChallenger grâce à mon paramètre $challenger
  } 

  /**
   * Methode qui sera appelé pour afficher le vainqueur du combat.
   * 
   * @param objet $ippo 
   * @param objet $challenger
   * @return string la methode return un string
  */
  private function endFight(object $ippo, object $challenger) : string
  { 
    /**
     * Si la stamina de ippo et supérieur à celui du challenger alors Ippo a gagné, 
     * si ce n'est pas le cas c'est que le challenger a gagné.
    */
      if($ippo->stamina > $challenger->stamina)
      {
        return "Le WINNNNNNEEEEEEEEERRRRR EST " .  $ippo->name . " YaTTTTTHHHHH !!! \n";  
      }
      else
      {
        return "Le WINNNNNNEEEEEEEEERRRRR EST " . $challenger->name . " YaTTTTTHHHHH !!! \n";  
      }
  }

  /**
   * Methode qui permet d'effectuer un coup critique/ko à son adversaire.
   * 
   * Les fonctions déclarées avec un type de retour void doivent return une déclaration de retour 
   * vide ou bien une methode qui annule le script.
   * 
   * @param int $round
   * @param objet $ippo
   * @param objet $challenger
   * @return void
   */
  private function randoom_ko($round, $ippo, $challenger) : void
  {
    /**
     * La methode rand() dans la condition permet de génèrer un nombre entre 1 et 20, et si elle génère le nombre 1,
     * alors ippo inflige un coup critique/ko à son adversaire, ce qui réduira sa vie a zéro.     
     */
    if(rand(1, 20) === 1 ) 
    {
      // Index  - KO 
      $ippo->strengh = $challenger->stamina; // La force de ippo et égal à la stamina restante de son adversaire, ce qui permettra de réduire la stamina de son adversaire à 0 en un coup.
      $challenger->stamina = $challenger->stamina - $ippo->strengh; //  Du coup si on soustrait la stamine du challenger - la force de ippo. le challenger n'aura plus de vie, ce qui le mettra ko

      echo "C'est Parti pour le ROUND " . $round . " ! \n"; 

      echo "Je n'en crois pas mes yeux " . strtoupper($ippo->name) . " a mis K.O " . $challenger->name . " au $round ROOUNNND !\n";
      echo "Avec un coup SURPUISSSSSSANT !!!!!!  \n";

      echo "Stamina " . $challenger->name . " : " . $challenger->stamina. " sur " . $this->stMaxChallenger . "\n";
      echo "Stamina " . $ippo->name . " : " . $ippo->stamina . " sur " . $this->stMaxIppo . "\n";

      echo $this->endFight($ippo, $challenger); // J'appelle la methode enFight() pour afficher le gagnant.
      
      exit();  //On stop le script grâce à la méthode exit(), parce qu'on est dans une boucle sinon le code continuera de s'exécuter.
    }
    elseif(rand(1, 20) === 2) // sinonSi rand() génère le nombre 2, alors challenger inflige un coup critique/ko à son adversaire, ce qui réduira sa vie a zéro.     
    {
      // Index  - Lire index KO
      $challenger->strengh = $ippo->stamina;
      $ippo->stamina = $ippo->stamina - $challenger->strengh;

      echo "C'est Parti pour le ROUND " . $round . " ! \n"; 
      echo "Je n'en crois pas mes yeux " . strtoupper($challenger->name) . " a mis K.O " . $ippo->name . " au $round ROOUNNND !\n";
      echo "Avec un coup SURPUISSSSSSANT !!!!!!  \n";

      echo "Stamina " . $ippo->name . " : " . $ippo->stamina . " sur " . $this->stMaxIppo . "\n";
      echo "Stamina " . $challenger->name . " : " . $challenger->stamina. " sur " . $this->stMaxChallenger . "\n";

      echo $this->endFight($ippo, $challenger); // J'appelle la methode enFight() pour afficher le gagnant.

      exit();  //On stop le script grâce à la méthode exit(), parce qu'on est dans une boucle sinon le code continuera de s'exécuter.
    }
  }

  /**
   * Méthode qui permet de lancer le combat round par round.
   * 
   * @param objet $ippo
   * @param objet $challenger
   * 
   */
  public function fighting(Ippo $ippo, Challenger $challenger)
  {

    for($round = 1; $round <= 10; $round++) // tant que le round n'est pas égal à 10, la boucle ne s'arrête pas.
    {
      /** 
       * Methode $this->randoom_ko()
       * N'importe qui peut mettre KO à n'importe quel moment du coup on appelle la méthode random_ko() avant, 
       * pour qu'elle puisse s'exécuter.
       */ 
      $this->randoom_ko($round, $ippo, $challenger); 

      if($ippo->speed > $challenger->speed) // si la vitesse de ippo est plus rapide que la vitesse du challenger alors ippo frappe le premier. sinon c'est l'inverse.
      {
        echo "C'est Parti pour le ROUND " . $round . " ! \n"; 
        $challenger->stamina = $challenger->stamina - $ippo->strengh; // la stamina du challenger est égale, à sa propre stamine (-) la force de son adversaire. 
  
        echo "Commentateur : Quel coup terrible de " . $ippo->name . " !!! naniii !! \n";
        echo "Stamina " . $challenger->name . " : " . $challenger->stamina. " sur " . $this->stMaxChallenger . "\n";
  
        $ippo->stamina = $ippo->stamina - $challenger->strengh; // la stamina du ippo est égale, à sa propre stamine (-) la force de son adversaire. 
        echo "Commentateur : La réponse de " . $challenger->name . " mais quel cooup incroyableee ! \n";
        echo "Stamina " . $ippo->name . " : " . $ippo->stamina . " sur " . $this->stMaxIppo . "\n";
        echo "Commentateur : FIN DU ROOUNNNNNNND " . $round . "  YAHHHHHHHH ! \n \n";
      }else{

        $ippo->stamina = $ippo->stamina - $challenger->strengh; // la stamina du ippo est égale, à sa propre stamine (-) la force de son adversaire. 
        
        echo "Commentateur : Quel coup terrible de " . $challenger->name . " !!! naniii !! \n";
        echo "Stamina " . $ippo->name . " : " . $ippo->stamina . " sur " .$this->stMaxIppo . "\n";

        $challenger->stamina = $challenger->stamina - $ippo->strengh; // la stamina du challenger est égale, à sa propre stamine (-) la force de son adversaire. 

        echo "Commentateur : La réponse de " . $challenger->name . " mais quel cooup incroyableee ! \n";
        echo "Stamina " . $challenger->name . " : " . $challenger->stamina. " sur " . $this->stMaxChallenger . "\n";
        echo "Commentateur : FIN DU ROOUNNNNNNND " . $round . "  YAHHHHHHHH ! \n";
      }
      if($round === 10) echo $this->endFight($ippo, $challenger); // J'appelle la methode enFight() pour afficher le gagnant.
    }
  }
}

$fight = new Fight2($ippo, $challenger);
echo $fight->fighting($ippo, $challenger);