geldvoorelkaar
==============

Geldvoorelkaar is een platform waar je kan investeren in verschillende projecten. In je account heb je de mogelijkheid om inzicht te krijgen in de projecten waar je in geïnvesteerd hebt. Dit project is gemaakt om het overzicht van je projecten te verbeteren.

##Benodigdheden:##
Apache om PHP code te kunnen uitvoeren.

##Starten##
2 mogelijke plekken waar je deze software kan plaatsen: lokaal op je pc/laptop of op een server/webhosting.

1. Download de code van dit project op de server. Dit kan via de terminal met <pre>wget https://github.com/iceburg1991/geldvoorelkaar/archive/v1.1.zip</pre>
2. Pak het gedownloade bestand uit met  <pre>unzip v1.1.zip</pre>
3. Installeer de benodigde onderdelen met Composer <pre>php composer.phar install</pre>
4. Open de webpagina op http://jouw domein.nl/geldvoorelkaar/

##Troubeshooting ##
Mocht je een error krijgen dat de Twig extension de 'intl' nodig heeft, dan komt dat omdat jouw PHP die draait geen Intl extensie geactiveerd heeft. 
Standaard zit dit in PHP5, dus je hoeft het alleen maar te activeren door een simele tag weg te halen in de php.ini. Lees hier meer erover:
[Stackoverflow oplossing](http://stackoverflow.com/questions/25948853/how-to-install-the-intl-extension-for-twig)
##Waarom dit project?##
Geldvoorelkaar is een interessant financieel platform waar ik gebruik van maak. Wat ik belangrijk vind is dat ik op maandelijkse basis weet hoe ik ervoor sta. Ik wil het gevoel hebben dat ik een volledig overzicht heb van de projecten waar ik geinvesteerd heb, maar dit gevoel heb ik momenteel niet. Een concreet voorbeeld is dat ik wil weten wat ik maandelijks van mijn geïnvesteerde Geldvoorelkaar projecten terugkrijg. Het huidige systeem van Geldvoorelkaar biedt dit niet. Daarnaast vindt ik de weergave van de project informatie niet prettig en stoor ik mij aan het moeten scrollen om een gedeelte van de informatie te kunnen zien. 

Om de gebruikersvriendelijkheid van het systeem te verhogen, dacht laat ik zelf een overzicht maken waarbij ik de informatie te zien krijg die ik wil zien. 

##Huidige uitdagingen##
Ik ben een web developer en kan eenvoudig dit GitHub project werkend krijgen op mijn server of op mijn laptop. Dit is echter voor de gemiddelde Nederlander een grotere uitdaging. Hoe zorg ik ervoor dat deze web app eenvoudig door iedereen gebruikt kan worden?......

##Features##

##To do/ bugs ##
Composer installatie met een simpele knop in de web app. Ik heb het install script daarvoor gemaakt en werkt lokaal perfect, maar het werkt niet op de server ivm user rechten van Apache. 