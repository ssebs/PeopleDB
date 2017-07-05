#!/bin/python
import MySQLdb
import csv

## 	This program will run through the PeopleDB 
#	and export the contents into a csv and yml file.
##

db = MySQLdb.connect(host="localhost",user="ssebs",passwd="ssebspasswd",db="People");
cur = db.cursor()

sql = "SELECT * FROM Users;"
cur.execute(sql)

uids = []
firsts = []
lasts = []
users = []
emails = []
disableds = []

# Uesrs table coloumns are shown below:
#-----------------------------------------------#
# uid | first | last | user | email | disabled? #
#-----------------------------------------------#
# 0		1 		2		3	   4         5
for row in cur.fetchall():
	uids.append(row[0])
	firsts.append(row[1])
	lasts.append(row[2])
	users.append(row[3])
	emails.append(row[4])
	disableds.append(row[5])	
db.close()

#TODO: Add 'Disabled' Column
with open('people.csv','wb') as csvfile:
	writer = csv.writer(csvfile, delimiter=",", 
		quotechar='|', quoting=csv.QUOTE_MINIMAL)
	writer.writerow(['uIDs','First', 'Last', 'User', 'Email', 'Disabled'])
	for i in range(len(firsts)):
		writer.writerow([uids[i],firsts[i], lasts[i], users[i], emails[i], disableds[i]])

users_file = open("users.yml","w")
users_file.write("---\n")
users_file.write("- users:\n")
for i in range(len(firsts)):
	users_file.write("   - name: " + users[i] + "\n") 
	users_file.write("     uid: " + str(uids[i]) + "\n")
	users_file.write("     groups: users\n")
	users_file.write("     disabled: " + str(disableds[i]) + "\n")
users_file.close()
print "     disabled: " + str(disableds[i]) + "\n"

print "Done"
