<?php

$conn = mysqli_connect('localhost', 'root', '', 'comment_section');
if (!$conn) {
    die("Connection Failed!!". mysqli_connect_error());
}