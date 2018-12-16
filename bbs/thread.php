<?php
require("index.inc.php");
$tid = $_GET["tid"];
$thread = thread_read($tid);
if (!$thread) {
    die("主题不存在");
}
include "view/thread.html";
?>