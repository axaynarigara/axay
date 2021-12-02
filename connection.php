<?php
$conn = mysqli_connect('localhost','root','','Flight_Ticket_Booking');

if(!$conn){
    die("Faile to connect!".$conn->connect_error);    
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

