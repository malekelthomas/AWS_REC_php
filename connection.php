<?php
  $servername ="localhost";
  $username = "root";
  $password = "root";
  $db = "test";

  //Create connection
  $conn = new mysqli($servername, $username, $password, $db);

  //Check conn

  if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
  }

  echo "Connected! <br><br>";
  $sql = "SELECT `properties_key` FROM `cat`";
  
  echo $conn->client_info;
  echo "<br><br>";
  
  if ($conn->query($sql) === TRUE){
    echo "Found them! <br><br>";
  }
  else{
    echo $conn->error;
    echo "<br><br>";
  }
  $result = $conn->query($sql);
 
  if ($result->num_rows > 0) {
    //output rows aka the categories
    while($row = $result->fetch_assoc()){
      echo $row['properties_key'] . "<br>";
    }
  }
  else{
    echo "Ya done fucked up";
  }
  echo "<br><br>";
  $conn->close();
  
?>