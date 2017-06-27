#!/bin/bash

## This script will run the python sq;->csv and copy it to a smb mount

function process {
	if [ -e people.csv ] ;then
		cp people.csv /mnt/PeopleDB/users/
		echo "copied to /mnt/PeopleDB/users/"
		rm people.csv
	else 
		echo "people.csv not found."
	fi
}

# This seems to need to be a full link for the cronjob to work
python /var/www/html/offline-scripts/pysql.py
process
python /var/www/html/offline-scripts/nisaccountfromcsv.py
