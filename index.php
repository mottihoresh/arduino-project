<?php

echo "this is just a test";



?>




<?php
ini_set('display_errors', 'On');
exec("mode /dev/ttyUSB: BAUD=9600 PARITY=N data=8 stop=1 xon=off");
$fp = fopen("/dev/ttyUSB", "w");
 
 foreach ($argv as $i => $arg) {
    if ($i > 0) {//skip the first arg since it's the name of the file
        print "writing " . $arg . "\n";
        $arg = chr($arg);//fwrite takes a string, so convert
        fwrite($fp, $arg);
        sleep(1);
    }
 }
print "closing\n";
fclose($fp);
?>