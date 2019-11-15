<?php
session_start();

// Models
require_once './models/Basket.php';
require_once './models/Groups.php';
require_once './models/Product.php';
require_once './models/Rating.php';
require_once './models/Reviews.php';
require_once './models/User.php';


// Repositories
require_once './repositories/ProductsRepository.php';
require_once './repositories/RatingsRepository.php';
require_once './repositories/GroupsRepository.php';
require_once './repositories/RatingsRepository.php';
require_once  './repositories/BasketRepository.php';
require_once './repositories/ReviewsRepository.php';

require_once "./link-db.php";

$productsRepository = new ProductsRepository();
$ratingsRepository = new RatingsRepository();
$groupsRepository = new GroupsRepository();
