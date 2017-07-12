#!/bin/bash

##
#  This script will create a csv & yml file with
#	 the current user data from the DB, copy it to
#	 the samba share for the Powershell script to
#	 create/modify the AD accounts, and run an
#	 ansible playbook to create the NIS accounts,
#	 if needed.
##

function process {
	if [ -e people.csv ] ;then
		mv people.csv /mnt/PeopleDB/users/
		echo "copied to /mnt/PeopleDB/users/"
	else 
		echo "people.csv not found."
	fi

	if [ -e users.yml ] ;then
		cp users.yml /var/www/html/offline-scripts/ansible/playbooks/users.yml
		mv users.yml /mnt/PeopleDB/users/
		echo "copied to /mnt/PeopleDB/users/"
	else 
		echo "users.yml not found."
	fi
}
### Begin script ###
python /var/www/html/offline-scripts/pysql.py
process
ansible-playbook /var/www/html/offline-scripts/ansible/playbooks/main.yml -i /var/www/html/offline-scripts/ansible/hosts
