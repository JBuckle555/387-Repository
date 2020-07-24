<?php

$b = "table";
$a = "Select from ".$b." where";
$query = "SET FOREIGN_KEY_CHECKS = 0;
          INSERT INTO Users (userName, hashed_password, userType) VALUES (?,?,?);
          SET FOREIGN_KEY_CHECKS = 1;";

echo $query;
 ?>
