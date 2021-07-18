# my_dummy_bank.github.io
This is the dummy bank website built for the internship's extra task at The Spark Foundation. It has some basic bank functions.

Due to database integratio, I have hosted this website on 000webhost, you can check it out at:-  https://dummyproject-vraj.000webhostapp.com/index.html

This is a banking system designed to show all customer details, transfer money and display the transaction status between the customers. 
Technologies used:
1. HTML
2. CSS
3. Bootstrap
4. JS
5. PHP
6. MYSQL 

MySql :

* create database bankingsystem;

* use database bankingsystem;

* create table customerdetails(
    -> name varchar(40),
    -> account_number int,
    -> amount int
    -> );
 
* create table transferdetails(
    -> sender varchar(40),
    -> recipient varchar(40),
    -> amount int,
    -> time_stamp TIMESTAMP
    -> );
