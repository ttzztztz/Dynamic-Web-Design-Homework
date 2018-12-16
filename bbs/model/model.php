<?php
function user_create($username, $password)
{
    global $db;
    $_user = $db->select("bbs_user", "*", array(
        "username" => $username
    ));

    if (count($_user) > 0) return -1;
    $password_md5 = md5($password);
    $r = $db->insert("bbs_user", array(
        "username" => $username,
        "password" => $password_md5
    ));
    if ($r) {
        user_login($username, $password);
    }
    return 1;
}

function user_login($username, $password)
{
    global $db, $user;
    $_user_db = $db->select("bbs_user", "*", array(
        "username" => $username
    ));
    if (count($_user_db) <= 0) return -1;
    $_user = $_user_db[0];
    if (md5($password) == $_user["password"]) {
        $user = $_user;
        $_SESSION["user"] = $user;
        return 1;
    } else {
        return -2;
    }
}

function user_read($uid)
{
    global $db;
    $_user_db = $db->select("bbs_user", "*", array(
        "uid" => $uid
    ));
    if (count($_user_db) <= 0) return -1;
    return $_user_db[0]["username"];
}

function thread_read($tid)
{
    global $db;
    $r = $db->select("bbs_thread", "*", array(
        "tid" => $tid
    ));
    $r = $r[0];
    if ($r) {
        $_user = user_read($r["uid"]);
        $r["username"] = $_user;
    }
    return $r;
}

function thread_create($subject, $message)
{
    global $db;
    $user = $_SESSION["user"];
    if (!isset($user)) return -1;
    $r = $db->insert("bbs_thread", array(
        "uid" => $user["uid"],
        "subject" => $subject,
        "message" => $message,
        "time" => time()
    ));
    return 1;
}

function get_method()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function thread_list_get()
{
    global $db;
    $r = $db->query("SELECT * FROM bbs_thread ORDER BY `tid` DESC")->fetchAll();
    //$r = $db->select("bbs_thread", "*", array());
    foreach ($r as &$v) {
        $_username = user_read($v["uid"]);
        $v["username"] = $_username;
    }
    return $r;
}

?>