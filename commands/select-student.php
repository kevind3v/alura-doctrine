<?php

use Doctrine\Entity\Student;
use Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . "/../vendor/autoload.php";

//Gerenciar entidade
$eMF = new EntityManagerFactory();
$eM = $eMF->getEntityManage();

//Pegar repositório de alguma classe e buscar dados
$students = $eM->getRepository(Student::class);

/** @var Student[] $list */
$list = $students->findAll();

foreach ($list as $student) {
    echo "Nome: {$student->getName()} e RA: {$student->getId()} \n\n";
}



$larissa = $students->findOneBy(
    [
        "name" => "Larissa Rodrigues"
    ]
);

var_dump($larissa);
