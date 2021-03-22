<?php

use Doctrine\DBAL\Logging\DebugStack;
use Doctrine\Entity\Phone;
use Doctrine\Entity\Student;
use Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . "/../vendor/autoload.php";

//Gerenciar entidade
$eMF = new EntityManagerFactory();
$eM = $eMF->getEntityManage();

$debugStack = new DebugStack();
$eM->getConfiguration()->setSQLLogger($debugStack);

$studentsR = $eM->getRepository(Student::class);

$studentClass = Student::class;
$dql = "SELECT students, phone, course FROM {$studentClass} students ";
$dql .= "JOIN students.phones phone JOIN students.courses course";

$query = $eM->createQuery($dql);
/** @var Student[] $list */
$list = $query->getResult();

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