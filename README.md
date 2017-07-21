# PeopleDB
AD/NIS/Web user management. Web UI running on LAMP server will create/modify/disable Active Directory and NIS accounts. 
>AD & NIS Account creation/modification/disable works.

Plans for future:
1) Clean UI/Fix UX


**Mysql database should look like below**

MariaDB [People]> create table Users(uid INT NOT NULL, first varchar(30), last VARCHAR(30), user VARCHAR(30), email VARCHAR(30), enabled BOOL);


MariaDB [People]> select * from Users;

    +------+-------+-------+--------+------------------+---------+
    | uid  | first | last  | user   | email            | enabled |
    +------+-------+-------+--------+------------------+---------+
    | 1001 | Test  | User  | tuser  | tuser@ssebs.net  |       1 |
    | 1002 | Test  | User2 | tuser2 | tuser2@ssebs.net |       1 |
    | 1003 | Test  | User3 | tuser3 | tuser3@ssebs.net |       0 |
    +------+-------+-------+--------+------------------+---------+

![screenshot of current implementation](http://i.imgur.com/sOihcqO.png)
