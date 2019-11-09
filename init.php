<?php
session_start();

// Models
require_once './models/Product.php';
require_once './models/User.php';

// Repositories
require_once './repositories/ProductsRepository.php';


require_once "./link-db.php";

$productsRepository = new ProductsRepository();
