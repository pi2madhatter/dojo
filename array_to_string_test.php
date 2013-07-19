<?php

$val_sample = array("This ", "is ", "an ", "array");
$char_symbol = strtolower(substr(implode($val_sample), 0, 1));

echo $char_symbol;


?>