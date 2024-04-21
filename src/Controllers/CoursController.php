<?php

namespace src\Controllers;

use src\Repositories\CoursRepositoty;

class  CoursController
{


    public function generateCodeMatin()
    {

        $coursRepositoty = new CoursRepositoty;
        $coursRepositoty->insertNewCodeMatin();
        $coursRepositoty->displayCodeMatin();
        include_once __DIR__ . '/../Views/components/generateCodeMatin.php';
    }

    public function generateCodeApresMidi()
    {

        $coursRepositoty = new CoursRepositoty;
        $coursRepositoty->insertNewCodeApresMidi();
        $coursRepositoty->displayCodeApresMidi();
        include_once __DIR__ . '/../Views/components/generateCodeApresMidi.php';
    }


    public function codeValidationMatin()
    {

        $request = file_get_contents('php://input');

        if ($request) {
            $decodedRequest = json_decode($request);

            if ($decodedRequest) {
                $data = [
                    'Code_Aleatoire' => htmlspecialchars($decodedRequest->Code_Aleatoire),
                ];

                $coursRepositoty = new CoursRepositoty;
                $coursRepositoty->singer($data);
                
            }
        }
    }

    
    public function codeValidationApresMidi()
    {

        $request = file_get_contents('php://input');

        if ($request) {
            $decodedRequest = json_decode($request);

            if ($decodedRequest) {
                $data = [
                    'Code_Aleatoire' => htmlspecialchars($decodedRequest->Code_Aleatoire),
                ];

                $coursRepositoty = new CoursRepositoty;
                $coursRepositoty->singerApresMidi($data);
                
            }
        }
    }
}
