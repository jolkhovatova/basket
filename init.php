<?php
session_start();

// Models
require_once './models/Product.php';
require_once './models/User.php';
require_once './models/Rating.php';

// Repositories
require_once './repositories/ProductsRepository.php';
require_once './repositories/RatingsRepository.php';

require_once "./link-db.php";

$productsRepository = new ProductsRepository();
$ratingsRepository = new RatingsRepository();
