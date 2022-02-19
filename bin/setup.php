<?php
include 'create_database.php';

create_db("login");
create_db('admin');

create_table("login", "test@mail.com");
create_table("admin");

insert_data("admin", "admin", "admin123");

?>