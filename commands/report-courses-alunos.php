<?php

use Doctrine\Entity\Phone;
use Doctrine\Entity\Student;
use Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . "/../vendor/autoload.php";

//Gerenciar entidade
$eMF = new EntityManagerFactory();
$eM = $eMF->getEntityManage();

$studentsR = $eM->getRepository(Student::class);

/** @var Student[] $list */
$list = $studentsR->findAll();

foreach ($list as $student) {
    $courses = $student->getCourses();
    $phones = $student->getPhones()->map(
        function (Phone $phone) {
            return $phone->getNumber();
        }
    )->toArray();
    echo "Nome: {$student->getName()} e RA: {$student->getId()}\n";
    echo "Telefones: " . (implode(", ", $phones)) . "\n";
    foreach ($courses as $course) {
        echo "\tID Curso: {$course->getID()}\n";
        echo "\tNome Curso: {$course->getName()}\n";
        echo "\n";
    }
    echo "\n";
}