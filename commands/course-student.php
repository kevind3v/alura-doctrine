<?php

use Doctrine\Entity\Course;
use Doctrine\Entity\Phone;
use Doctrine\Entity\Student;

use Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . "/../vendor/autoload.php";

//Gerenciar entidade
$eMF = new EntityManagerFactory();
$eM = $eMF->getEntityManage();

$idStudent = $argv[1];
$idCourse = $argv[2];

/** @var Course $course */
$course = $eM->find(Course::class, $idCourse);
/** @var Student $student */
$student = $eM->find(Student::class, $idStudent);

$student->addCourse($course);

$eM->flush();