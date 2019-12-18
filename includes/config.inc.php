<?php

  $SERVER_NAME = "localhost";
  $SERVER_UID = "root";
  $SERVER_PWD = "";
  $SERVER_DB = "assignmentnews";

  $conn = mysqli_connect($SERVER_NAME, $SERVER_UID, $SERVER_PWD, $SERVER_DB);

  if(!$conn){
    die('ERROR: Could not establish connection.' . mysqli_connect_error());
  }
