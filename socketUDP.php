
<?php
require_once 'library/config.php';
require_once 'library/functions.php';
require_once 'library/common.php';


$socket = stream_socket_server("udp://0.0.0.0:1113", $errno, $errstr, STREAM_SERVER_BIND);
if (!$socket) {
    die("$errstr ($errno)");
}

do {
    $pkt = stream_socket_recvfrom($socket, 1, 0, $peer);
    echo "$peer\n";
    stream_socket_sendto($socket, date("D M j H:i:s Y\r\n"), 0, $peer);
} while ($pkt !== false);

?>

