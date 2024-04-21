<?php

namespace src\Controllers;

use src\Repositories\CoursRepositoty;

class  CoursController
{


    public function generateCodeMatin(){

        $coursRepositoty = new CoursRepositoty;
        $coursRepositoty->insertNewCodeMatin();
        $coursRepositoty->displayCodeMatin();
        include_once __DIR__ . '/../Views/components/generateCodeMatin.php';

    }

    public function generateCodeApresMidi(){

        $coursRepositoty = new CoursRepositoty;
        $coursRepositoty->insertNewCodeApresMidi();
        $coursRepositoty->displayCodeApresMidi();
        include_once __DIR__ . '/../Views/components/generateCodeApresMidi.php';

    }


    public function codeValidationMatin(){
        
        $coursRepositoty = new CoursRepositoty;
        $coursRepositoty->insertNewCodeMatin();



    }
}