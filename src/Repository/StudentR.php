<?php

namespace Doctrine\Repository;

use Doctrine\Entity\Student;
use Doctrine\ORM\EntityRepository;

class StudentR extends EntityRepository
{
    public function getCoursesByStudent()
    {
        $query = $this->createQueryBuilder('s')
            ->join('s.phones', "p")
            ->join("s.courses", "c")
            ->addSelect('p')
            ->addSelect('c')
            ->getQuery();

        return $query->getResult();
    }
}