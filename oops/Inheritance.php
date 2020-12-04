<?php


trait MyTrait
{
    public function myTraitMessage()
    {
        echo "This is first TRAIT";
    }
}

trait MySecondTrait
{
    public function myTraitMessagePart2()
    {
        echo "This is Second TRAIT";
    }
}

class A
{
    public $myName = "ABC";
}

class College extends A
{
    public $name = "Standford University";

    public function address()
    {
        return "450 Serra Mall, Stanford, CA 94305, United States";
    }

    public function wifi()
    {
        return '3213212321';
    }
}

class Student extends College
{
    use MyTrait;
    use MySecondTrait;

    public $studentName = "YOgesh more";
    public function studentAddress()
    {
        return "4018, Pavagadh Sheri, Udhana, Surat, Pakistan";
    }

    public function studentDetails()
    {
        return $this->myTraitMessagePart2() . $this->myTraitMessage() . $this->studentName . "<br/>" . $this->name . ", " . $this->address();
    }
}

$yogesh = new Student;

// echo $yogesh->wifi();

echo $yogesh->studentDetails();
