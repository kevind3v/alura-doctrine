<?php

use Doctrine\Entity\Student;
use Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . "/../vendor/autoload.php";

//Gerenciar entidade
$eMF = new EntityManagerFactory();
$eM = $eMF->getEntityManage();

$id = $argv[1];

//Quando for verificar se existe o registo
$student = $eM->find(Student::class, $id);

//Caso contrario
$student = $eM->getReference(Student::class, $id);

$eM->remove($student);
$eM->flush();