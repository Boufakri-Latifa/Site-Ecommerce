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
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
            <h2>Ajouter produit</h2><br>
            <form  action="save.php" method="POST"  enctype="multipart/form-data">

                <label for="libelle">Libelle</label>
                <input type="text" name="libelle"  class="form-control" id="libelle" required>

                <label for="floatingInput">Prix</label>
                <input type="number" name="prix" min="100"  class="form-control" id="floatingInput" required>

                <label for="customRange3" class="form-label">Discount</label>
                <input type="range" name="discount" class="form-range" min="0" max="80" step="1" id="customRange3" required>

                <label for="floatingTextarea">Description</label>
                <textarea name="description" class="form-control" id="floatingTextarea" required></textarea>

                <label for="image">Image</label>
                <input  type="file" name="image" class="form-control" id="image" accept=".png,.jpg,.jpeg"  required>

                <label for="categorie">Catégorie</label>
                <select name="categorie" class="form-select" aria-label="Default select example" id="categorie" required>
                    <option selected>Choisissez une catégorie</option>
                    <option value="Fruits">Fruits</option>
                    <option value="Produits laitiers">Produits laitiers</option>
                    <option value="TV">TV</option>
                    <option value="Café">Café</option>
                    <option value="Cosmétic/Maquillage">Cosmétic/Maquillage</option>
                    <option value="Légumes">Légumes</option>
                </select><br>
                <button class="w-100 btn btn-lg btn-primary" name="ajouter" type="submit">Ajouter</button>
            </form>
            </div>
            <div class="col-2"></div>
        </div>
        
    </div>
    <script src="../JS/bootstrap.min.js"></script>
</body>
</html>