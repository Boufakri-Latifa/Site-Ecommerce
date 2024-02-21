<?php
    require_once("../panier.php");
    $id = $_GET['id'];
    foreach($_SESSION['produits'] as $k=>$val){
        if($val->id == $id){
            unset($_SESSION['produits'][$k]);
            break;
        }
    }
    header('location:produits.php');