# MicrosoftTranslator
Microsoft Translator Api

 * Microsoft Translator Api
 * @author Mohamed Ali Musa - (XC0d3rZ);
 * @since  2015-10-06;
 * @version  3.0;
 * @modified 00-00-00;
 * @copyright 2013 - 2015 XC0d3rZ;
 * @githup https://github.com/x-c0d3rz;
 * @facebook https://fb.com/mr.face.king;
 * @doc https://msdn.microsoft.com/en-us/library/hh847649.aspx;


* Get Microsoft Translator api key : https://msdn.microsoft.com/en-us/library/hh847649.aspx
* Translator Language Codes : https://msdn.microsoft.com/en-us/library/hh847649.aspx

# Class Use

<code>

<?php

require_once dirname(__FILE__) . "/MicrosoftTranslator.php"; // Load MicrosoftTranslator Class ...

$MicrosoftTranslator = new MicrosoftTranslator; // Call MicrosoftTranslator Class

$array = array(
'username' => '{live login}', //  live login email as x.c0d3rz@live.com

'key'      => '{Azure account key}',  // Key 

'text'     => '{text}',  // hello World

'to'       => '{translate Language}', // ar

'from'     => '{Text Language}'); // en

$MicrosoftTranslator->set($array); // Set All Variables As Array

echo $MicrosoftTranslator->translate(); // Translate Output : مرحبا ايها العالم   . 

?>
</code>
