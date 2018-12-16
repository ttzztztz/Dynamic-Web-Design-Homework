<?php
$winter = array(12, 1, 2);
$spring = array(3, 4, 5);
$summer = array(6, 7, 8);
$fall = array(9, 10, 11);
$season = array("spring" => $spring, "summer" => $summer, "fall" => $fall, "winter" => $winter);
$month = date("m");
$day = date("d");
$now_season = "";
foreach ($season as $k => $v) {
    if ($now_season) break;
    foreach ($v as $target) {
        if ($month == $target) {
            $now_season = $k;
            break;
        }
    }
}
$styles = array("spring" => "#green", "summer" => "dodgerblue", "fall" => "orangered", "winter" => "dimgray");

$now_color = $styles[$now_season];
$odd = $day % 2;
?>
<style>
    body {
        color: <?php echo $now_color;?>;
        font-size: <?php echo $odd ? "18px" : "12px";?>;
    }

    table, tr, td {
        border: 1px black solid;
        font-size: <?php echo $odd ? "18px" : "12px";?>;
    }

    td {
        width: 96px;
    }

    div {
        margin: 8px;
    }

    header {
        text-align: right;
        width: 882px;
    }
</style>
<header>
    <?php echo date("Y"), "年", date("m"), "月", date("d"), "日"; ?>
</header>
<div>
    <?php
    echo '<table cellspacing="0">';
    for ($i = 1; $i <= 9; $i++) {
        echo '<tr>';
        $m = 1;
        for (; $m <= $i; $m++) {
            $result = $i * $m;
            echo '<td>';
            echo "$i * $m = $result";
            echo '</td>';
        }
        for (; $m <= 9; $m++) {
            echo '<td></td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    ?>
</div>
<div>
    <?php
    echo '<table cellspacing="0">';
    for ($i = 9; $i >= 1; $i--) {
        echo '<tr>';
        $m = $i;
        for (; $m >= 1; $m--) {
            $result = $i * $m;
            echo '<td>';
            echo "$i * $m = $result";
            echo '</td>';
        }
        for ($m = 9 - $i; $m >= 1; $m--) {
            echo '<td></td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    ?>
</div>
<div>
    <?php
    echo '<table cellspacing="0">';
    for ($i = 1; $i <= 9; $i++) {
        echo '<tr>';
        for ($m = 9 - $i; $m >= 1; $m--) {
            echo '<td></td>';
        }
        $m = 1;
        for (; $m <= $i; $m++) {
            $result = $i * $m;
            echo '<td>';
            echo "$i * $m = $result";
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    ?>
</div>
<div>
    <?php
    echo '<table cellspacing="0">';
    for ($i = 9; $i >= 1; $i--) {
        echo '<tr>';
        for ($m = 9 - $i; $m >= 1; $m--) {
            echo '<td></td>';
        }
        $m = $i;
        for (; $m >= 1; $m--) {
            $result = $i * $m;
            echo '<td>';
            echo "$i * $m = $result";
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    ?>
</div>