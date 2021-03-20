<?php

use Doctrine\Entity\Student;

use Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . "/../vendor/autoload.php";

//Gerenciar entidade
$eMF = new EntityManagerFactory();
$eM = $eMF->getEntityManage();

$student = new Student();
$student->setName($argv[1]);

// Observar a entidade
$eM->persist($student);
//salvar
$eM->flush();