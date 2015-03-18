# phpMsg

> INFO

Basic application where you can send and receive messages

Technologies used: HTML, CSS, PHP, JQuery, AJAX, MySQL


> DATABASE

The application is connected to a mysql DB called phpmsg.
The database connection is on the db_connection.php file.

The DB tables are the following:

- users(id [int], username[varchar(255)], password [varchar(255)])
- messages(id [int][auto-increment], receiver_id [int], sender_id [int], message [longtext], subject [varchar(255)])

The .sql file with the SQL sentences is also included.