<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site E-Commerce</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
</head>
<body>
    <?php
        require_once("panier.php");
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = [];
        }
    ?>
    <header class="py-2 bg-body-tertiary border-bottom">
        <div class="container d-flex flex-wrap">
            <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none">
                <h3>Ecommerce</h3>
                <h5 style="margin-left: 30px;">Liste des catégories</h5>
            </a>
            <ul class="nav">
                <li class="nav-item"><a href="#" class="nav-link link-body-emphasis px-2">Backoffice</a></li>
                <li class="nav-item">
                    <a href="Pannier/panierPro.php" class="nav-link link-body-emphasis px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l.84 4.479 9.144-.459L13.89 4zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg> Panier(0)
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                        </svg>
                        <span class="fs-4">Liste des catégories</span>
                    </a>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link active" aria-current="page">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                            Voir tous les produis
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-body-emphasis">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                            Fruits
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-body-emphasis">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                            Produits laitiers
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-body-emphasis">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                            TV
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-body-emphasis">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                            Café
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-body-emphasis">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                            Cosmetic/Maquillage
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link link-body-emphasis">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                            Légumes
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-9" style="padding: 20px; display:flex; flex-wrap:wrap; gap:30px" >
                

                <?php
                    foreach($_SESSION['produits'] as $v){
                        ?>
                        <div class="card" style="width: 18rem;">
                            <img src="Images/<?=$v->image?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?=$v->libelle?></h5>
                                <p class="card-text"><?=$v->description?>.</p>
                                <p style="color: grey;">Ajouté le : <?=$v->date?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <?php
                                        if($v->remise > 0){
                                            echo "<p class='btn btn-danger rounded-pill px-3' style = 'text-decoration: line-through'>".$v->prix."$</p>";
                                            $r = $v->prix * ($v->remise / 100);
                                            echo "<br><p class='btn btn-success rounded-pill px-3'>Solde: ".$v->prix - $r."$</p>";
                                        }else{
                                            echo "<p class='btn btn-success rounded-pill px-3'>".$v->prix."$</p>";
                                        }
                                    ?>
                                </li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link btn btn-primary rounded-pill px-3">Ajouter au panier</a>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="JS/bootstrap.min.js"></script>
</body>
</html>