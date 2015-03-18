/*
Created by Alex Morral on 15/03/15.
Copyright (c) 2015 alexmorral. All rights reserved.
*/

 -- INFO
phpMsg es una aplicación para enviar mensajes entre usuarios/empleados.

Tecnologías usadas: HTML, CSS, PHP, JQuery, AJAX, MySQL.

Se puede probar la aplicación desde ryblade.com/phpmsg e iniciar sesión mediante alguno de los siguientes usuarios:
 	test/test
	test1/test1
	test2/test2
	test3/test3


 --  DATABASE

La aplicación se conecta a una BD mysql llamada phpmsg.
Los datos de conexión a mysql estan en el fichero db_connection.php

Las tablas de la BD son las siguientes:

users(id [int], username [varchar(255)], password [varchar(255)])

messages(id [int][auto-increment], receiver_id [int], sender_id [int], message [longtext], subject [varchar(255)])

Se incluye también el fichero .sql con las sentencias SQL para crear las tablas.