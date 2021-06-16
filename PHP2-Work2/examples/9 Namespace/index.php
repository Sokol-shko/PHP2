<?php 

  include 'Cat.class.php';
  include 'Dog.class.php';

  use Cat as mycat;
  
  echo mycat\say(), "<br />";
  echo Dog\say(), "<br />";
