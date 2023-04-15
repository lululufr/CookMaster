//
// Created by lucas on 15/04/23.
//
#include <stdio.h>
#include <string.h>

#include <mysql/mysql.h>
#include "log.h"


int main(void)
{
    MYSQL *conn;
    MYSQL_RES *result;
    MYSQL_ROW row;

    char query[1000];


    conn = mysql_init(NULL);
    if (!mysql_real_connect(conn, DB_HOST, DB_USER, DB_PASS, DB_NAME, 0, NULL, 0)) {
        fprintf(stderr, "%s\n", mysql_error(conn));
        return 1;
    }

    sprintf(query, "SELECT * FROM USER");
    if (mysql_query(conn, query)) {
        fprintf(stderr, "%s\n", mysql_error(conn));
        mysql_close(conn);
        return 1;
    }

    result = mysql_store_result(conn);
    if (!result) {
        fprintf(stderr, "%s\n", mysql_error(conn));
        mysql_close(conn);
        return 1;
    }

    mysql_free_result(result);
    mysql_close(conn);

    return 0;
}