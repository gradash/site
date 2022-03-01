<?php

$formData = $_POST;

if ($_POST) {
    if ($_POST["productType"] === "DVD") {
        $x = (new DVD($formData));
    }
    if ($_POST["productType"] === "Book") {
        $x = (new Book($formData));
    }
    if ($_POST["productType"] === "Furniture") {
        $x = (new Furniture($formData));
    }
    $x->persist();

    header('Location: /');

}