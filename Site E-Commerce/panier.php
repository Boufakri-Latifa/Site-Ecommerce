<?php
    namespace Commerce;
    session_start();
    if(!isset($_SESSION['id'])){
        $_SESSION['id']= 0;
    }
        
    class Produit{
        private $id;
        private $libelle;
        private $image;
        private $prix;
        private $remise;
        private $categorie;
        private $description;
        private $date;

        public function __construct($libelle, $image, $prix, $remise, $categorie, $description)
        {
            $this -> id = $_SESSION['id'];
            $this -> libelle = $libelle;
            $this -> image = $image;
            $this -> prix = $prix;
            $this -> remise = $remise;
            $this -> categorie = $categorie;
            $this -> description = $description;
            $this -> date = date('Y-m-d H:i:s');
            $_SESSION['id']++;
        }

        public function __get($name)
        {
            if(property_exists($this,$name)){
                return $this -> $name;
            }
        }

        public function __set($name, $value)
        {
            if(property_exists($this, $name)){
                $this -> $name = $value;
            }
        }
    }
    class Ligne_Panier{
        private $qte;
        private $produit;

        public function __construct($qte, $produit)
        {
            $this -> qte = $qte;
            $this -> produit = $produit;
        }

        public function __get($name)
        {
            if (property_exists($this, $name)) {
                return $this -> $name;
            }
        }
        public function __set($name, $value){
            if(property_exists($this, $name)){
                $this -> $name = $value;
            }
        }
    }
    class Panier{
        private $lignes_panier;
        public function __construct() {
            $this -> lignes_panier = array();
        }

        public function ajouter($instance) {
            $this->lignes_panier[] = $instance;
        }
    }
