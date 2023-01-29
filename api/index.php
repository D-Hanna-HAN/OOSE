<?php
include "load.php";

//checks if request method is post or get
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    //adds namespace to the class
    $class = "\\Api\\Model\\" . $_REQUEST["class"];
    $function = $_REQUEST['function'];
    //check if class and function exist
    if (class_exists($class) && method_exists($class, $function)) {
        //check if there are parameters
        if (isset($_REQUEST["params"]) && !empty($_REQUEST["params"])) {
            echo json_encode(call_user_func_array("$class::$function", $_REQUEST["params"]));
        } else {
            echo json_encode(call_user_func("$class::$function"));
        }

    } else {
        //function or class dont exist
        echo FunctionNotFound($class . " " . $function);
    }

} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //adds namespace to the class
    $class = "\\Api\\Model\\" . $_REQUEST["class"];
    $function = $_REQUEST['function'];
    //check if class and function exist
    if (class_exists($class) && method_exists($class, $function)) {
        //check if there are parameters
        if (isset($_REQUEST["params"]) && !empty($_REQUEST["params"])) {
            echo json_encode(call_user_func_array("$class::$function", $_REQUEST["params"]));
        } else {
            echo json_encode(call_user_func("$class::$function"));
        }

    } else {
        //function or class dont exist
        echo FunctionNotFound($class . " " . $function);
    }
} else {
    //no request specified
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