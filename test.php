<?php
$conn = oci_connect('c##projectweb', 'system', '127.0.0.1/XE');
if (!$conn) {
    $e = oci_error();
    echo "Gagal: " . $e['message'];
} else {
    echo "Berhasil konek ke Oracle!";
}
