<?php

define ('MYSQL_SERVER', 'localhost');
define ('MYSQL_USER', '');
define ('MYSQL_PASSWORD', '');
define ('MYSQL_DB', '');

/**
 * Создает соединение с бд и возвращает дескриптор
 * @return mysqli
 */
function db_connect()
{
    $link = mysqli_connect (MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
        or die ( 'Error: '. mysqli_error ($link) );

    if ( !mysqli_set_charset($link, 'utf8') )
    {
        printf ( 'Error: '. mysqli_error ($link) );
    }

    return $link;
} 