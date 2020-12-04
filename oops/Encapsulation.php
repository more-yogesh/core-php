<?php

class College
{

    // constructor

    // public function college()
    // {
    //     echo "I am constructor";
    // }

    public function __construct()
    {
        echo "I am constructor";
    }

    public $name = 'Oxford College';

    public function address()
    {
        return "G8, Swaminarayan Complex, Behind White House, USA";
    }

    public function collegeDetails()
    {
        return $this->name . " ," . $this->address();
    }
}

$myCollege = new College;

// echo $myCollege->address();
// echo $myCollege->name();

echo $myCollege->collegeDetails();
