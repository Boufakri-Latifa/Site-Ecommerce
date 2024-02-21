<?php
    require_once("../panier.php");

    if(isset($_POST['ajouter']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        $libelle = $_POST['libelle'];
        $prix = $_POST['prix'];
        $discount = $_POST['discount'];
        $description = $_POST['description'];
        $categorie = $_POST['categorie'];

        $fileName = $_FILES['image']['name'];
        $fileError = $_FILES['image']['error'];
        $fileTempName = $_FILES['image']['tmp_name'];
                
        if($fileError == 0){
            $fileDestination = '../Images/'.$fileName;
            move_uploaded_file($fileTempName, $fileDestination);
            echo "L'image bien insérée";
            
        }else{
            echo "Quelque chose est fausse!! répéter une autre fois.";
        }
        
        $p = new Commerce\Produit($libelle, $fileName, $prix, $discount, $categorie, $description);
        $_SESSION['produits'][] = $p;
        header('location:produits.php');
    }