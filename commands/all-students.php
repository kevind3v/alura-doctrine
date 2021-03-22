<?php

use Doctrine\DBAL\Logging\DebugStack;
use Doctrine\Entity\Student;
use Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . "/../vendor/autoload.php";

//Gerenciar entidade
$eMF = new EntityManagerFactory();
$eM = $eMF->getEntityManage();

$debugStack = new DebugStack();
$eM->getConfiguration()->setSQLLogger($debugStack);

$studentClass = Student::class;
$dql = "SELECT COUNT(a) FROM {$studentClass} a";
$all = ($eM->createQuery($dql))->getSingleScalarResult();

echo "Total de alunos: " . $all;
