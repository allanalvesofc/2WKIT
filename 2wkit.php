<?php

require 'fmgr.php';
require 'ntfy.php';
require 'zdata.php';


$t =  XorEncrypt("PARAGRAFO", "CABANA", "ALLAN");

echo $t . '<p>';


echo xorDecrypt("PARAGRAFO", "CABANA", "ALLAN");

?>