# PeopleDB
Web interface for mysql User database
>I plan to have this eventually modify both Active Directory and NIS databases.

**Mysql database should look like below**

MariaDB [People]> SELECT * FROM Users;

    +----+-----------+--------+---------+-------------------+
    | id | first     | last   | user    | email             |
    +----+-----------+--------+---------+-------------------+
    |  1 | Sebastian | Safari | ssafari | ssafari@ssebs.net |
    |  2 | Test      | User   | tuser   | tuser@ssebs.net   |
    +----+-----------+--------+---------+-------------------+
