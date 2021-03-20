<?php

use Doctrine\Entity\Student;
use Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . "/../vendor/autoload.php";

//Gerenciar entidade
$eMF = new EntityManagerFactory();
$eM = $eMF->getEntityManage();

$id = $argv[1];
$name = $argv[2];

//Quando for buscar um registro somente
$student = $eM->find(Student::class, $id);
$student->setName($name);

$eM->flush();
