//
// Created by lucas on 15/04/23.
//
#include <stdio.h>
#include <string.h>

#include <mysql/mysql.h>
#include "log.h"

//gcc -o requester-bdd requester-BDD.c -lmysqlclient <<<<<<<<<<<<<<< pour compiler


int main(int argc, char* argv[]){
    MYSQL *conn;
    MYSQL_RES *result;
    MYSQL_ROW row;

    char query[1000]; // a rendre dynamique


    conn = mysql_init(NULL);
    mysql_real_connect(conn, DB_HOST, DB_USER, DB_PASS, DB_NAME, 3306, NULL, 0);

    sprintf(query, "SELECT username FROM USER"); // a mettre avec la concatenation argc

   mysql_query(conn, query);


    result = mysql_store_result(conn);


    //boucle de rendu

    row = mysql_fetch_row(result);

    printf("%s \n",*row); // a faire boucler en fonction

    mysql_free_result(result);
    mysql_close(conn);

    printf("programme fini\n");


}