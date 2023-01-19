<?php
include "load.php";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $class = "\\Api\\Model\\" . $_REQUEST["class"];
    $function = $_REQUEST['function'];
    if (class_exists($class) && method_exists($class, $function)) {
        if (isset($_REQUEST["params"]) && !empty($_REQUEST["params"])) {
            echo json_encode(call_user_func_array("$class::$function", $_REQUEST["params"]));
        } else {
            echo json_encode(call_user_func("$class::$function"));
        }

    } else {
        echo FunctionNotFound($class . " " . $function);
    }

} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class = "\\Api\\Model\\" . $_REQUEST["class"];
    $function = $_REQUEST['function'];
    if (class_exists($class) && method_exists($class, $function)) {
        if (isset($_REQUEST["params"]) && !empty($_REQUEST["params"])) {
            echo json_encode(call_user_func_array("$class::$function", $_REQUEST["params"]));
        } else {
            echo json_encode(call_user_func("$class::$function"));
        }

    } else {
        echo FunctionNotFound($class . " " . $function);
    }
} else {
    echo InvalidRequest();
}

function FunctionNotFound($request = "")
{
    $body = [
        "request" => $request,
        "error" => "function not found."
    ];
    return json_encode($body);
}
function InvalidRequest()
{
    $body = [
        "error" => "invalid request."
    ];
    return json_encode($body);
}