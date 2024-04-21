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


}