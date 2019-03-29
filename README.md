# piscine_php

##### Html

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

##### Css

- [html/css openclassrooms](https://openclassrooms.com/fr/courses/1603881-apprenez-a-creer-votre-site-web-avec-html5-et-css3)

##### Php

- [php openclassrooms](https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql)

- attention a bien utiliser == ou !== pour verifier le type de variable comparé!

- launch a php server

1. php -S localhost:port_number
2. server was launch in /Users/nivergne/42_Nico/42_gitlab/ongoing/piscine_php/j03/
3. curl 'localhost:8100/ex02/print_get.php?login=nivergne&login=lalala'

### Variables variables 

```php
$var = "magic";
$$var = "variable";

echo ("$magic\n");
#cela va ecrire  variable
```

#####Web Related Notions

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


### Cockie

- [amazing video to explain what's a cookie](https://www.youtube.com/watch?v=yED9q_chp8c)

- Create a cookie

```php
if (!isset($_COOKIE['value']) || empty($_COOKIE['value']))
setcookie ('name', 'value', time() + 3600 * 24 * 365, null, null, false, true)
```

1. name of the cookie: name
2. value of the cookie: value
3. cookie life span: 3600 * 24 * 365 (second, hour, days = 1year here)
4. path of the cookie: null 
5. domain name of the cookie: null
6. https: true | http: false
7. acces of the cookie: true (to say access to cookie only through http, always put true to avoid javascript access for security)
8. always add the if to protect cookie from being refresh 

- Change a cookie

1. change the value when calling setcookie back
2. use htmlspecialchars to check it's not php code send as a cookie (could be executed by the machine)

```php
setcookie ('name', 'newvalue', time() + 3600 * 24 * 365, null, null, false, true)
<?= htmlspecialchars ($_COOKIE['lvalue]) ?>
```

[all the curl options explained, use with ctrl+f](http://www.mit.edu/afs.new/sipb/user/ssen/src/curl-7.11.1/docs/curl.html)