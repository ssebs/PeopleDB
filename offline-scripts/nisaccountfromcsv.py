#!/bin/python
import os
import csv

#os.system("ssh ssebs-nis 'pwd'")

users = []
newusers = []

with open('/mnt/PeopleDB/users/people.csv', 'rb') as csvfile:
	reader = csv.reader(csvfile, delimiter=",", quotechar="|")
	for row in reader:
		usr =  row[2]
		if(usr != "User"):
			users.append(usr)

for u in users:
	if(os.system("ssh ssebs-nis 'grep -c '" + u + "' /etc/passwd '") != 0):
		print u +  " should not exist"
		newusers.append(u)

print "New Users:"
for nu in newusers:
	print nu


#### TODO: Create NIS accounts from newusers
