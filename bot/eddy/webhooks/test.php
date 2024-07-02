<?php

$d = $_POST;

echo json_encode([
    'result' => true,
    'data' => $d
]);

die();