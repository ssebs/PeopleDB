#!/bin/bash

function process {
	if [ -e /var/www/html/offline-scripts/people.csv ] ;then
		mv /var/www/html/offline-scripts/people.csv /var/www/html/offline-scripts/ansible/files/
		echo "copied to /var/www/html/offline-scripts/ansible/files/people.csv"
	else 
		echo "people.csv not found."
	fi

	if [ -e /var/www/html/offline-scripts/users.yml ] ;then
		mv /var/www/html/offline-scripts/users.yml /var/www/html/offline-scripts/ansible/files/
		echo "copied to /var/www/html/offline-scripts/ansible/files/people.csv"
	else 
		echo "users.yml not found."
	fi
}
### Begin script ###
python /var/www/html/offline-scripts/pysql.py
process
ansible-playbook /var/www/html/offline-scripts/ansible/playbooks/main.yml -i /var/www/html/offline-scripts/ansible/hosts
ansible-playbook /var/www/html/offline-scripts/ansible/playbooks/win-acct.yml -i /var/www/html/offline-scripts/ansible/hosts
