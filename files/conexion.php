<?php
  function conexion(){
    return mysqli_connect(
      'localhost', 'root', '', 'clicklag_mw'
    );
  }
?>