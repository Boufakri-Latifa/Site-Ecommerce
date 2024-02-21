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
        require_once("../panier.php");
        if(!isset($_SESSION['produits'])){
            $_SESSION['produits'] = [];
        }
    ?>
    <div class="container">
        <h2>Liste des produits</h2>
        <a href="ajouter.php" class="btn btn-primary">Ajouter produit</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#ID</th><th>Libelle</th><th>Prix</th><th>Discount</th><th>Catégorie</th><th>Date</th><th>Image</th><th>Opération</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($_SESSION['produits'] as $k=>$v){
                        ?>
                        <tr>
                            <td><?=$v->id?></td>
                            <td><?=$v->libelle?></td>
                            <td><?=$v->prix?> $</td>
                            <td><?=$v->remise?>%</td>
                            <td><?=$v->categorie?></td>
                            <td><?=$v->date?></td>
                            <td><img width="80px" src="../Images/<?=$v->image?>" alt=""></td>
                            <td><a class="btn btn-primary rounded-pill px-3"  href="modifier.php?id=<?=$v->id?>">Modifier</a>  <a class="btn btn-danger rounded-pill px-3"  href="supprimer.php?id=<?=$v->id?>">Supprimer</a></td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <script src="../JS/bootstrap.min.js"></script>
</body>
</html>