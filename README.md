# madranszkiSeed

Hello! Ezt a projektet a saját kényelmem érdekében kezdtem el, mert idegesített, hogy folyamatosan fel kellett mennem különböző oldalakra, letölteni a torrent fájlt, felmásolni szervergépre, majd elindítani.

A program webes kezelőfelületet biztosít, amelyen keresztül van lehetőség saját torrent fájl feltöltésére vagy (amennyiben a környezeti változók megfelelően be vannak állítva) egy adott oldalról torrenteket letölteni megadott paraméterek alapján. A torrent elindítása és annak befejezése után a háttérben elkezd seedelni, így ezzel sem kell bajlódni. A weboldalon továbbá láthatóak az eddigi letöltések és azok állapotai.

A projekt jelenleg fejlesztés alatt áll, így a bal oldali menüből nem minden menüpont érhető el, illetve előfordulhatnak nem várt viselkedések.


# Beüzemelés

A program megfelelő működéséhez szükséges további programok:

 - transmission-cli
 - python3 (és pip)
 - screen
 - mysql server
 - php-mysqli extension
 - valamilyen webszerver
 - python modulok: os, sys, argparse, requests, mysql-connector-python

   

>  sudo apt-get update

>  sudo apt-get install transmission-cli python3 python3-pip screen php-mysqli 

>  sudo apt-get install apache2 mysql-server

>  sudo pip install mysql-connector-python

mysql-server telepítés [ITT](https://www.digitalocean.com/community/tutorials/how-to-install-mysql-on-ubuntu-20-04)

apache telepítés [ITT](https://ubuntu.com/tutorials/install-and-configure-apache#1-overview)



Az exportált adatbázis fájl megtalálható a gyökérmappában: db.sql



A program főmappájába létre kell hozni egy torrents mappát

> mkdir torrents

A program főmappájában található egy mv_to_root mappa 2 scripttel. Ezt a két fájlt be kell másolni a gép gyökérkönyvtárába

>  sudo mv mv_to_root/* /

## Környezeti változók

 - **NCORE_USER**: nCore.pro felhasználónév
 - **NCORE_PASS**: nCore.pro jelszó
 - **SEED_MYSQL_HOST**: mysql szerver címe
 - **SEED_MYSQL_USER**: mysql felhasználónév
 - **SEED_MYSQL_PASSWORD**: mysql jelszó
 - **SEED_MYSQL_DATABASE**: mysql adatbázis neve
 - **SEED_OUTPUT_DIR**: torrentek gyökérmappája
 - **SEED_VIDEO_DIR**: torrentek kimeneti mappája (videók)
 - **SEED_GAME_DIR**: torrentek kimeneti mappája (játékok)
 - **SEED_MUSIC_DIR**: torrentek kimeneti mappája (zenék)
 - **SEED_OTHER_DIR**: torrentek kimeneti mappája (minden más)
 
 Ha a kimeneti mappák nincsenek beállítva, akkor az alapértelmezett értékeket használja a program. (rendre "/sambashare/", "Videos", "Games", "Music", "other/Torrents")
 Ezeket a mappákat előzetesen létre kell hozni, különben nem fog megfelelően működni a program és nem is ad visszajelzést a hibáról.
