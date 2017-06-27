# PeopleDB
Web interface for mysql User database
>AD & NIS Account creation works.

Plans for future:
1) Add Disabling accounts
2) Change Delete page to Disable page
3) Clean UI/Fix UX
4) When searching for a specific user, output editable form instead of just displaying conten

**Mysql database should look like below**

MariaDB [People]> SELECT * FROM Users;

    +----+-----------+--------+---------+-------------------+
    | id | first     | last   | user    | email             |
    +----+-----------+--------+---------+-------------------+
    |  1 | Sebastian | Safari | ssafari | ssafari@ssebs.net |
    |  2 | Test      | User   | tuser   | tuser@ssebs.net   |
    +----+-----------+--------+---------+-------------------+
