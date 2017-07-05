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

    +------+-------+--------+---------+-------------------+----------+
    | uid  | first | last   | user    | email             | disabled |
    +------+-------+--------+---------+-------------------+----------+
    | 7000 | Matt  | Safari | msafari | msafari@ssebs.net |        0 |
    +------+-------+--------+---------+-------------------+----------+


