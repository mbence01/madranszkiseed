# madranszkiSeed

Hello! Ezt a projektet a saját kényelmem érdekében kezdtem el, mert idegesített, hogy folyamatosan fel kellett mennem különböző oldalakra, letölteni a torrent fájlt, felmásolni szervergépre, majd elindítani.

A program webes kezelőfelületet biztosít, amelyen keresztül van lehetőség saját torrent fájl feltöltésére vagy (amennyiben a környezeti változók megfelelően be vannak állítva) egy adott oldalról torrenteket letölteni megadott paraméterek alapján. A torrent elindítása és annak befejezése után a háttérben elkezd seedelni, így ezzel sem kell bajlódni. A weboldalon továbbá láthatóak az eddigi letöltések és azok állapotai.

A projekt jelenleg fejlesztés alatt áll, így a bal oldali menüből nem minden menüpont érhető el, illetve előfordulhatnak nem várt viselkedések.


# Beüzemelés

A program megfelelő működéséhez szükséges további programok:

 - transmission-cli
 - python3
 - screen
 - mysql server
 - php-mysqli extension
 - valamilyen webszerver

   

>  sudo apt-get update

>  sudo apt-get install transmission-cli python3 screen php-mysqli 

>  sudo apt-get install apache2 mysql-server

mysql-server telepítés [ITT](https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-20-04)

apache telepítés [ITT](https://ubuntu.com/tutorials/install-and-configure-apache#1-overview)



Az exportált adatbázis fájl megtalálható a gyökérmappában: db.sql

## Környezeti változók

 - **NCORE_USER**: nCore.pro felhasználónév
 - **NCORE_PASS**: nCore.pro jelszó
 - **SEED_MYSQL_HOST**: mysql szerver címe
 - **SEED_MYSQL_USER**: mysql felhasználónév
 - **SEED_MYSQL_PASSWORD**: mysql jelszó
 - **SEED_MYSQL_DATABASE**: mysql adatbázis neve
