<?php

use Doctrine\Entity\Phone;
use Doctrine\Entity\Student;
use Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . "/../vendor/autoload.php";

//Gerenciar entidade
$eMF = new EntityManagerFactory();
$eM = $eMF->getEntityManage();

//Pegar repositório de alguma classe e buscar dados
$students = $eM->getRepository(Student::class);


$stmt = $eM->createQuery("SELECT student FROM Doctrine\Entity\Student student");
$list = $stmt->getResult();

foreach ($list as $student) {
    $phones = $student->getPhones()->map(function(Phone $phone){
        return $phone->getNumber();
    })->toArray();
    echo "Nome: {$student->getName()} e RA: {$student->getId()}\n";
    echo "Telefone: ". (implode(", ", $phones)) . "\n\n";
}

//$marcos = $students->find(4);
//echo $marcos->getName();
//
//
//$larissa = $students->findOneBy(
//    [
//        "name" => "Larissa Rodrigues"
//    ]
//);

//var_dump($larissa);
