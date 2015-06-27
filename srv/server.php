<?php

   // PGtest AJAX server
   // https://github.com/mplattu/pgtest

   $func = getparam('function');
   if (!is_null($func)) {
      $func = strtolower($func);
   }

   // Store AJAX result to this array - will be returned as JSON to UI
   $result = Array();

   // Store report to database
   if ($func == 'status') {
      $result['message'] = "Hello World!";
   }

   // Fallback for no message
   if (@$result['message'] == '') {
      $result['message'] = "No message";
   }

   echo(getparam('callback')."(".json_encode($result).");");
   exit(0);

function getparam ($name) {
   $value = null;

   if (!is_null(@$_POST[$name])) $value = $_POST[$name];
   if (!is_null(@$_GET[$name])) $value = $_GET[$name];

   return $value;
}

?>
