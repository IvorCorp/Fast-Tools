<?php
//-------------------------------------------
$raiz = $_SERVER['DOCUMENT_ROOT'];
//-------------------------------------------
//$mysql = mysqli_connect("localhost", "user", "passwd");
//-------------------------------------------
function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode(gzcompress(gzdeflate($result, 9), 9));;
}

function decrypt($string, $key) {
   $result = '';
   $string = gzinflate(gzuncompress(base64_decode($string)));
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}
//-------------------------------------------


//-------------------------------------------
?>

