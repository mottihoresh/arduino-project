<?php
include "php_serial.class.php";

// Let's start the class
$serial = new phpSerial;

// First we must specify the device. This works on both linux and windows (if
// your linux serial device is /dev/ttyS0 for COM1, etc)
// If you are using Windows, make sure you disable FIFO from the modem's 
// Device Manager properties pane (Advanced >> Advanced Port Settings...)

$serial->deviceSet("/dev/ttyUSB");

// Then we need to open it
$serial->deviceOpen('w+');

// We may need to return if nothing happens for 10 seconds
stream_set_timeout($serial->_dHandle, 10);

// We can change the baud rate
$serial->confBaudRate(9600);

// SMS inbox query - mode command and list command
// To write into
$serial->sendMessage("Hello !");

var_dump($serial->readPort());

// If you want to change the configuration, the device must be closed
$serial->deviceClose();

?>
