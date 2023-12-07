1 -> Class Ippo (dans un fichier Ippo.php)

Créez une classe Ippo. Cette classe doit avoir 4 propriétés (name, stamina, speed, strength). Chacune de ces propriétés doit avoir un getter et un setter. Un constructeur est attendu pour initialiser les setters. Ensuite, créez un objet de cette classe et fournissez à votre constructeur les valeurs suivantes :

- Ippo pour le name
- 20762 pour la stamina (la stamina représente les points de vie du boxeur)
- 90 pour le speed (speed représente la vitesse)
- 1721 pour la strength (strength représente la force du boxeur)

2 - Class Challenger (Dans un fichier challenger.php)

Faites exactement la même chose que la classe Ippo dans cette classe. Modifiez simplement les valeurs fournies à votre constructeur.

3 -> Créer une classe Fight (Dans un fichier Fight.php)

-> Importez le fichier "Ippo" et le fichier "challenger" dans Fight.php

-> Dans la classe "Fight", créez une méthode "fighting" qui doit prendre deux paramètres. Le premier paramètre représente l'objet que vous avez instancié de la classe Ippo, et le second l'objet que vous avez instancié de la classe Challenger.

Dans cette méthode, mettez en place un système de rounds (10 rounds max) où les personnages s'affrontent tour par tour. Le personnage le plus rapide frappe en premier.

À chaque tour, la stamina doit être réduite par la force de celui qui frappe. Par exemple : $staminaIppo = $ippo->stamina - $challenger->strength.

Affichez à chaque round la stamina restante de chaque personnage.

Quand la stamina de l'un des deux personnages tombe à zéro, le combat est terminé.

Ajoutez la probabilité d'effectuer un coup critique (strength multiplié par 2).