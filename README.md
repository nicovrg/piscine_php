# piscine_php

### Html

```html
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
</body>
</html>
```

- all informations related to char encoding, other stylesheet or script links ect ... will go on the head

- all informations related to content of the page will go in the body

- [html/css openclassrooms](https://openclassrooms.com/fr/courses/1603881-apprenez-a-creer-votre-site-web-avec-html5-et-css3)
- [html/css openclassrooms, page of usefull html tags](https://openclassrooms.com/fr/courses/1603881-apprenez-a-creer-votre-site-web-avec-html5-et-css3/1608357-memento-des-balises-html)

### Css

- [html/css openclassrooms](https://openclassrooms.com/fr/courses/1603881-apprenez-a-creer-votre-site-web-avec-html5-et-css3)

### Php

- [php openclassrooms](https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql)

- attention a bien utiliser == ou !== pour verifier le type de variable comparé!

### Regexp

- I: ^$[ab][a-b]

1. Une regexp comment par / et se termine par /
2. ^ indique que l'on cherche une expression en debut de ligne
3. $ indique que l'on cherche une expression en fin de ligne
4. [az] indique que l' on cherche soit a soit z
5. [a-z] indique que l' on cherche soit tout les characteres compris entre a et z
6. Exemple: /^t[oi]t[a-c]]$/ chercher une ligne (rien devant, rien apres) contenant soit tota/totb/totc/tita/titb/titc

- II: +*?{x}[^]

1. + indique que l'expression precedent le + peut etre repete UNE fois ou PLUSIEURS
2. * indique que l'expression precedent le * peut etre repete ZERO fois ou PLUSIEURS
3. ? indique que l'expression precedent le ? peut etre repete ZERO ou UNE fois
4. {4} indique que l'expression precedent le {4} doit etre repete 4 fois dans le cas ou l'on met 4 entre {}
5. [^] indique que l'on cherche tout sauf l'expression suivant le ^

- III: ()\x 

1. Si on met des (), on peut ensuite utiliser \ suivit par un nombre (1 pour les premieres parentheses) pour dire que l'on cherche le resultat du match des premieres parentheses
2. Exemple: /t([io])t\1/ va trouver soit titi soit toto mais tito ou toti ne seront jamais matché

### Variables variables 

```php
$var = "magic";
$$var = "variable";

echo ("$magic\n");
#cela va ecrire  variable
```

### Cockie

[amazing video to explain what's a cookie](https://www.youtube.com/watch?v=yED9q_chp8c)