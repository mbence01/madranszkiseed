#!/bin/sh

mkdir /sambashare/Videos/$1

cp $2 /sambashare/Videos/$1/
cp start.sh /sambashare/Videos/$1/

chmod a+x /sambashare/Videos/$1/start.sh

sh /sambashare/Videos/$1/start.sh $1
