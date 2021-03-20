<?php

require_once __DIR__ . "/vendor/autoload.php";

use Doctrine\Helper\EntityManagerFactory;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

$entityMFactory = new EntityManagerFactory();
$entityManager = $entityMFactory->getEntityManage();

return ConsoleRunner::createHelperSet($entityManager);
