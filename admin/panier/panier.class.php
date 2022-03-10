<?php
    class panier{
        private $DB;

        public function __construct($DB){
            if(!isset($_SESSION)){
                session_start();
            }
            if(!isset($_SESSION['panier'])){
                $_SESSION['panier'] = array();
            }
            $this->DB = $DB;

            if(isset($_GET['del'])){
                $this->del($_GET['del']);
            }

            if(isset($_POST['panier']['quantity'])){
                $this->recalc();
            }
        }

        public function recalc(){
            foreach($_SESSION['panier'] as $product_id => $quantity){
                if(isset($_POST['panier']['quantity'][$product_id])){
                    $_SESSION['panier'][$product_id] = $_POST['panier']['quantity'][$product_id];
                }
            }
        }

        public function count(){
            return array_sum($_SESSION['panier']);
        }

        public function subtot(){
            $subtot = 0;
            $ids = array_keys($_SESSION['panier']);
            if(empty($ids)){
                $products = array();
            }else{
                $products = $this->DB->query('SELECT * FROM zen_produit WHERE codep IN ('.implode(',',$ids).')');
            }
            if(isset($_POST['qty'])){
                    
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                foreach($products as $product){
                    $qtys = $qty + $_SESSION['panier'][$product->codep] - $_SESSION['panier'][$product->codep];
                    $subtot = $price * $qtys;
                } 
            }
            //return $subtot;
        }

        public function total(){
            $total = 0;
            $ids = array_keys($_SESSION['panier']);
            if(empty($ids)){
                $products = array();
            }else{
                $products = $this->DB->query('SELECT * FROM zen_produit WHERE codep IN ('.implode(',',$ids).')');
            }
            foreach ($products as $product){
                $total += $product->pu * $_SESSION['panier'][$product->codep];
            }
            return $total;
        }

        public function add($product_id){
            if(isset($_SESSION['panier'][$product_id])){
                $_SESSION['panier'][$product_id]++;
            }else{
                $_SESSION['panier'][$product_id] = 1;
            }
        }

        public function del($product_id){
            unset($_SESSION['panier'][$product_id]);
        }
    }
?>