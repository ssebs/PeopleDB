#!/bin/python
import os
import csv

###
## This program will read the SMB share'd people.csv file, 
## check against NIS to see if the user exists, and create 
## the account if it doesn't.
###

users = []
newusers = []

with open('/mnt/PeopleDB/users/people.csv', 'rb') as csvfile:
	reader = csv.reader(csvfile, delimiter=",", quotechar="|")
	for row in reader:
		usr =  row[2]
		if(usr != "User"):
			users.append(usr)

for u in users:
	if(os.system("ssh ssebs-nis 'grep -c '" + u + "' /etc/passwd ' > /dev/null 2>&1") != 0):
		#print u +  " should not exist"
		newusers.append(u)

print "New Users:\n"
for nu in newusers:
	print "Creating account for: " + nu
	# user must be in %wheel group and have NOPASSWD:ALL turned on
	cmd = "sudo useradd -m -p SsebsP@ss" + nu
	os.system("ssh -tt ssebs-nis '" + cmd + "'")

