<?php
include "load.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (class_exists($_REQUEST["class"]) && method_exists($_REQUEST["class"], $_REQUEST["function"])) {
        if (isset($_REQUEST["params"]) && !empty($_REQUEST["params"])) {
            echo json_encode($_REQUEST["class"]::{$_REQUEST["function"]}(extract($_REQUEST["params"])));
        }else{
            echo json_encode($_REQUEST["class"]::{$_REQUEST["function"]}());
        }

    } else {
        echo FunctionNotFound($_REQUEST["class"] . " " . $_REQUEST["function"]);
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (class_exists($_REQUEST["class"]) && method_exists($_REQUEST["class"], $_REQUEST["function"])) {
        if (isset($_REQUEST["params"]) && !empty($_REQUEST["params"])) {
            echo json_encode($_REQUEST["class"]::{$_REQUEST["function"]}(extract($_REQUEST["params"])));
        }else{
            echo json_encode($_REQUEST["class"]::{$_REQUEST["function"]}());
        }

    } else {
        echo FunctionNotFound($_REQUEST["class"] . " " . $_REQUEST["function"]);
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