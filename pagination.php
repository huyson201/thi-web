<?php
include_once "./LoadClass.php";

$reqData = json_decode(file_get_contents("php://input"), true);
$result = $post->getPostByPage($reqData["page"], $reqData['cate']);
echo json_encode($result);
