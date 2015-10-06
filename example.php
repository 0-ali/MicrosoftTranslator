<?php
require_once dirname(__FILE__) . "/MicrosoftTranslator.php"; // Load MicrosoftTranslator Class ...
$MicrosoftTranslator = new MicrosoftTranslator; // Call MicrosoftTranslator Class

$array = array(
'username' => '{live login}', //  live login email
'key'      => '{Azure account key}', 
'text'     => '{text}', 
'to'       => '{translate Language}', 
'from'     => '{Text Language}');

$MicrosoftTranslator->set($array); // Set All Variables As Array

echo $MicrosoftTranslator->translate(); // translate output

?>
