<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
</head>
<body>
    <?php
        require_once('../panier.php');
        $id = $_GET['id'];
        foreach($_SESSION['produits'] as $k=>$v){
            if($v->id == $id){
                $libelle = $v->libelle;
                $prix = $v->prix;
                $discount = $v->remise;
                $description = $v->description;
                $image = $v->image;
                $categorie = $v->categorie;
                break;
            }
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
            <h2>Modifier produit</h2><br>
            <form  action="" method="POST" enctype="multipart/form-data">

                <label for="libelle">Libelle</label>
                <input type="text" name="libelle" value="<?=$libelle?>"  class="form-control" id="libelle" required>

                <label for="floatingInput">Prix</label>
                <input type="number" name="prix" value="<?=$prix?>" min="100"  class="form-control" id="floatingInput" required>

                <label for="customRange3" class="form-label">Discount</label>
                <input type="range" name="discount" value="<?=$discount?>" class="form-range" min="0" max="80" step="1" id="customRange3" required>

                <label for="floatingTextarea">Description</label>
                <textarea name="description" class="form-control" id="floatingTextarea" required><?=$description?></textarea>

                <label for="image">Image</label>
                <input  type="file" value="<?=$image?>" name="image" class="form-control" id="image" accept=".png,.jpg,.jpeg">
                <img width="100px" src="../Images/<?=$image?>" alt="">
                
                <label for="categorie">Catégorie</label>
                <select name="categorie" class="form-select" aria-label="Default select example" id="categorie" required>
                    <option value="">Choisissez une catégorie</option>
                    <option value="Fruits" <?= ($categorie == 'Fruits') ? 'selected' : '' ?>>Fruits</option>
                    <option value="Produits laitiers" <?= ($categorie == 'Produits laitiers') ? 'selected' : '' ?>>Produits laitiers</option>
                    <option value="TV" <?= ($categorie == 'TV') ? 'selected' : '' ?>>TV</option>
                    <option value="Café" <?= ($categorie == 'Café') ? 'selected' : '' ?>>Café</option>
                    <option value="Cosmétic/Maquillage" <?= ($categorie == 'Cosmétic/Maquillage') ? 'selected' : '' ?>>Cosmétic/Maquillage</option>
                    <option value="Légumes" <?= ($categorie == 'Légumes') ? 'selected' : '' ?>>Légumes</option>
                </select><br>
                <button class="w-100 btn btn-lg btn-primary" name="modifier" type="submit">Modifier</button>
            </form>
            </div>
            <div class="col-2"></div>
        </div>
        
    </div>
    <?php
        if(isset($_POST['modifier'])){
            $_SESSION['produits'][$k]->libelle = $_POST['libelle'];
            $_SESSION['produits'][$k]->prix = $_POST['prix'];
            $_SESSION['produits'][$k]->remise = $_POST['discount'];
            $_SESSION['produits'][$k]->description = $_POST['description'];
            $_SESSION['produits'][$k]->categorie = $_POST['categorie'];

            $fileName = $_FILES['image']['name'];
            $fileError = $_FILES['image']['error'];
            $fileTempName = $_FILES['image']['tmp_name'];
                    
            if($fileError == 0){
                $fileDestination = '../Images/'.$fileName;
                move_uploaded_file($fileTempName, $fileDestination);
                $_SESSION['produits'][$k]->image = $fileName;
                
            }else{
                echo "Quelque chose est fausse!! répéter une autre fois.";
            }
            header('location:produits.php');
        }
    ?>
    <script src="../JS/bootstrap.min.js"></script>
</body>
</html>