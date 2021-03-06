<?php

use Doctrine\Entity\Phone;
use Doctrine\Entity\Student;

use Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . "/../vendor/autoload.php";

//Gerenciar entidade
$eMF = new EntityManagerFactory();
$eM = $eMF->getEntityManage();

$student = new Student();
$student->setName($argv[1]);
for ($i = 2; $i < $argc; $i++) {
    $phone = new Phone();
    $student->addPhone($phone->setNumber($argv[$i]));
}

// Observar a entidade
$eM->persist($student);
//salvar
$eM->flush();