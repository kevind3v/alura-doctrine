<?php

require_once __DIR__ . "/vendor/autoload.php";

use Doctrine\Helper\EntityManagerFactory;

$entityMFactory = new EntityManagerFactory();
$entityManager = $entityMFactory->getEntityManage();

echo "<pre>";
var_dump($entityManager->getConnection());
echo "</pre>";
