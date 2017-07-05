# PeopleDB
AD/NIS/Web user management. Web UI running on LAMP server will create/modify/disable Active Directory and NIS accounts. 
>AD & NIS Account creation/modification/disable works.

Plans for future:
1) Clean UI/Fix UX

**Mysql database should look like below**

MariaDB [People]> SELECT * FROM Users;

    +------+-------+--------+---------+-------------------+----------+
    | uid  | first | last   | user    | email             | disabled |
    +------+-------+--------+---------+-------------------+----------+
    | 7000 | Matt  | Safari | msafari | msafari@ssebs.net |        0 |
    +------+-------+--------+---------+-------------------+----------+


