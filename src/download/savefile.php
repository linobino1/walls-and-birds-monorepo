<?php
  $name = date('l jS \of F Y h:i:s A');
  $newname= 'fotos/'.$name.'.jpg';
  move_uploaded_file($_FILES['webcam']['tmp_name'], $newname);
 /*
  $image = file_get_contents('php://input');
  $name = date('YmdHis');
  $newname= 'fotos/'.$name.'.jpg';
  $file = file_put_contents($newname, $image);
  */
?>