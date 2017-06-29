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

firsts = []
lasts = []
users = []
emails = []

# Uesrs table coloumns are shown below:
#----------------------------------#
# id | first | last | user | email #
#----------------------------------#
# 0		1 		2		3	   4
for row in cur.fetchall():
	firsts.append(row[1])
	lasts.append(row[2])
	users.append(row[3])
	emails.append(row[4])
	
db.close()

#TODO: Add 'Disabled' Column
with open('people.csv','wb') as csvfile:
	writer = csv.writer(csvfile, delimiter=",", 
		quotechar='|', quoting=csv.QUOTE_MINIMAL)
	writer.writerow(['First', 'Last', 'User', 'Email'])
	for i in range(len(firsts)):
		writer.writerow([firsts[i], lasts[i], users[i], emails[i]])

users_file = open("users.yml","w")
users_file.write("---\n")
users_file.write("- users:\n")
for i in range(len(firsts)):
	users_file.write("   - name: " + users[i] + "\n") 
	users_file.write("     groups: users\n")
users_file.close()

print "Done"
