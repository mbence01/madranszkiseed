import argparse
import mysql.connector
import os

#Initializing database connection
db = mysql.connector.connect(
    host        =   os.environ.get('SEED_MYSQL_HOST'),
    user        =   os.environ.get('SEED_MYSQL_USER'),
    password    =   os.environ.get('SEED_MYSQL_PASSWORD'),
    database    =   os.environ.get('SEED_MYSQL_DATABASE')
)
cursor = db.cursor()

#Initializing the argument parser
parser = argparse.ArgumentParser()

parser.add_argument('-i', '--ID', help = 'Torrent hash')

args = parser.parse_args()

#Query prepare
query = 'UPDATE downloads SET status = 1, finishdate = CURRENT_TIMESTAMP() WHERE hash = %s ORDER BY id DESC LIMIT 1'
val = [ args.ID ]

cursor.execute(query, val)
db.commit()
