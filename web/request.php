<?php
    if($_POST['param']) {
        $param = json_decode($_POST['param']);
        $row = get_text($param->id);
        echo json_encode($row);

//        session_start();
//        $_SESSION['request'] = $row;

//        $_COOKIE['varname'] = "vr46";

        exit();
    }

    function get_text($id) {
        $row = $id;
        return $row;
    }
?>

