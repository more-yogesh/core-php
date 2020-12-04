<?php

class College
{

    public function address()
    {
        // public $test = 'Demo';
        return "Udhana - Magdalla Road, Surat, Gujarat 395007";
    }

    private function wifiPassword()
    {
        return "d4f5d4f5df4d5f4";
    }

    public function studentPassword()
    {
        return $this->wifiPassword();
    }
    public $name = "VNSGU University";
}

class Student extends College
{
    public function password()
    {
        return $this->studentPassword();
    }

    protected function myDetails()
    {
        return "test details";
    }
}



$student = new Student;

// echo "STUDENT PASSWORD IS: " . $student->password();
echo $student->myDetails();


class NormalPeople extends College
{
    public function collegeData()
    {
        return "College Password: " . $this->name;
    }
}

$people = new NormalPeople;

echo $people->collegeData();
