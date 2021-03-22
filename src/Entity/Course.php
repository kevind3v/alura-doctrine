<?php


namespace Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Course
 * @Entity
 */
class Course
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column (type="string")
     */
    private $name;

    /**
     * @ManyToMany(targetEntity="Student", inversedBy="courses")
     */
    private $students;

    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getStudents()
    {
        return $this->students;
    }

    public function addStudent(Student $student)
    {
        if($this->students->contains($student)){
            return $this;
        }
        $this->students->add($student);
        $student->addCourse($this);
        return $this;
    }
}