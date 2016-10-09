-----------------------------------------
HOE ZET JE HET CRASSUS-PHP-PROJECT EEN BEETJE GOED OP
-----------------------------------------

0.1 Download PHPstorm, maak er een trial van (of link je schoolmail eraan via dat eduction programme van ze, dan kan je het een jaar legaal gebruken)

0.2 Maak géén nieuw project aan en/of folder - open een bestaand project vanuit Github
	- vul hier in hoe

0.3 Kijk of je dat project kan openen in PHPstorm en syncen met Github. Lukt dat niet, zoek 't op of als 't een permissions gekut is, let me know

0.4 Weet ik veel, lees tutorials on how to git https://guides.github.com/activities/hello-world/

1.1 Log in met ftps (gebruik FileZilla of zo)

FTPS
- username: 		is te vinden in postal.azure.com bij Instellingen > Eigenschappen, FTP-/IMPLEMENTATIEGEBRUIKER
- ftps hostname: 	is te vinden in portal.azure.com bij Instellingen > Eigenschappen, FTPS HOSTNAAM
- ftps wachtwoord:	0ur0b0r0s-PHP

1.2 Ga in Filezilla in het venster links (met jouw mappenstructuur) naar de map waarin je PhpstormProjects hebt staan
(meestal bij Users\[jouwnaam]\PhpstormProjects

1.3 Ga (venster links nog steeds) naar de map waarin 't project staat (dit geval 'crassus')

1.4 Verplaats vanuit de wwwroot van de site die je met FTPS in FileZilla geopend hebt (venster rechts) 
	- de map vendor
	- composer.json
	- composer.lock
	- composer.phar
naar naar jouw eigen projectmap (users\[jouwnaam]\PhpstormProjects\crassus - het venster links dus)

----------
EN NU HET EENMAAL KLAAR IS
----------

Als het goed is heb je nu je project open en kun je index.php bekijken en bewerken.

Maak wijzigingen, commit/push de shit

NB: KOM NIET AAN DE VENDOR-MAP EN DE DRIE COMPOSER-BESTANDEN (JSON, LOCK, PHAR). HEB JE VERDER OOK NIKS IN TE ZOEKEN.
ER ZIT NIKS INTERESSANTS IN BEHALVE EEN HOOP GEDOE OM MONGODB EN DIE HTTP-REQUESTS ALS 'PLUGINS' IN PHP TE KRIJGEN.

De site live: http://crassus-php.azurewebsites.net/

Ik heb het alleen niet voor elkaar gekregen om dit project lokaal te deployen - op de een of andere manier vindt
Phpstorm de FTP niet zo interessant en SSL-verbinden zijn ook niet beschikbaar via Azure met alleen IP-adressen...
Misschien lukt 't jullie wel.

----------
DOCS EN ANDERE ACHTERGRONDEN
----------

Er zijn twee plugins geïnstalleerd binnen dit project met een hoop gegoogle en console binnen Azure:
    - Guzzle
    - MongoDB

Guzzle is een PHP framework waarin je HTTP requests en zo
kan uitvoeren. Zegt het. Docs:
http://docs.guzzlephp.org/en/latest/quickstart.html

Als je MongoDB nog niet gedownload hebt, doe het alsnog.
https://www.mongodb.com/download-center?jmp=nav#community

MongoDB is de DB - in php is de syntax wat anders dan normaal
http://php.net/manual/en/set.mongodb.php

Meer docs van MongoDB in PHP
http://mongodb.github.io/mongo-php-library/classes/client/#mongodbclient

Beheer je database (kijken of dingen bestaan, toegevoegd zijn etc.) met Robomongo.
https://robomongo.org/download - download dan versie 0.9.0 RC10

Andere linkjes die voor niemand interessant zijn (wel gebruikt tijdens het opzetten van dit project)
http://pecl.php.net/package/mongodb/1.1.8/windows
http://docs.guzzlephp.org/en/latest/overview.html#installation
https://azure.microsoft.com/nl-nl/documentation/articles/web-sites-php-configure/
https://getcomposer.org/doc/00-intro.md
