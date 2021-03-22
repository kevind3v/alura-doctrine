<?php

namespace Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Anotação para dizer que a classe é uma entidade
 * @Entity
 */
class Student
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
     * @OneToMany(targetEntity="Phone", mappedBy="student", cascade={"remove", "persist"})
     */
    private $phones;

    /**
     * @ManyToMany(targetEntity="Course", mappedBy="students")
     */
    private $courses;

    public function __construct()
    {
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @param $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function addPhone(Phone $phone)
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
        return $this;
    }

    /**
     * @return Collection;
     */
    public function getPhones()
    {
        return $this->phones;
    }

    public function addCourse(Course $course)
    {
        if($this->courses->contains($course)){
            return $this;
        }

        $this->courses->add($course);
        $course->addStudent($this);
        return $this;
    }

    /**
     * @return Collection
     */
    public function getCourses()
    {
        return $this->courses;
    }
}