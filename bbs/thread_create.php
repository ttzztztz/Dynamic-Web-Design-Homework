<?php
require("index.inc.php");
$method = get_method() ? "GET" : "POST";
if ($method == "GET") {
    include "view/thread_create.html";
} elseif ($method == "POST") {
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $r = thread_create($subject, $message);
    if ($r == -1) {
        echo '未登录！<br>';
        include "view/thread_create.html";
    } else {
        header("refresh:0;url='index.php';");
    }
}
?>