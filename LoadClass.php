<?php
spl_autoload_register(function ($class_name) {
    include_once "./models/" . $class_name . ".php";
});

$post = new Post;
$category = new Category;
