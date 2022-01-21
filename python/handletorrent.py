import argparse
import mysql.connector
import os

#Initializing database connection
db = mysql.connector.connect(
    host        =   os.environ.get('SEED_MYSQL_HOST'),
    user        =   os.environ.get('SEED_MYSQL_USER'),
    password    =   os.environ.get('SEED_MYSQL_PASS')
)
cursor = db.cursor()

#Initializing the argument parser
parser = argparse.ArgumentParser()

parser.add_argument('-u', '--USER',         help = 'UserID')
parser.add_argument('-t', '--TYPE',   help = 'Type of torrent')
parser.add_argument('-f', '--FILE',        help = 'Filename')
parser.add_argument('-d', '--DIR',        help = 'Torrent directory name')

args = parser.parse_args()

#Query prepare
query = 'INSERT INTO downloads(userid, name, filename, path, date, finishdate, status) VALUES(%s, %s, %s, %s, CURRENT_TIMESTAMP, '0000-00-00 00:00:00', 0)'
vals = ( args.USER, args.DIR, args.FILE, args.TYPE )

cursor.execute(query, vals)
db.commit()

os.system('screen -d -m transmission-cli -w /sambashare/' + args.TYPE + ' -f "python3 "')