<?php

use Doctrine\Entity\Course;
use Doctrine\Entity\Phone;
use Doctrine\Entity\Student;
use Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . "/../vendor/autoload.php";

//Gerenciar entidade
$eMF = new EntityManagerFactory();
$eM = $eMF->getEntityManage();

$course = new Course();
$course->setName($argv[1]);

// Observar a entidade
$eM->persist($course);
//salvar
$eM->flush();