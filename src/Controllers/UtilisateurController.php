<?php

namespace src\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

use src\Repositories\UtilisateurRepository;


class UtilisateurController
{
    // use Reponse;

    public function treatmentCreateNewUser()
    {
        $request = file_get_contents('php://input');

        if ($request) {
            $decodedRequest = json_decode($request);

            if ($decodedRequest) {
                $data = [
                    'Nom' => htmlspecialchars($decodedRequest->Nom),
                    'Prenom' => htmlspecialchars($decodedRequest->Prenom),
                    'Email' => htmlspecialchars($decodedRequest->Email),
                    'ID_Role' => htmlspecialchars($decodedRequest->ID_Role),
                    'ID_Promo' => htmlspecialchars($decodedRequest->ID_Promo)
                ];

                // Hash the email address using SHA-256
                $Email =  $data['Email'];


                $UtilisateurRepository = new UtilisateurRepository();
                $UtilisateurRepository->createUser($data);



                $mail = new PHPMailer(true);
                try {
                    // Your SMTP configuration
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'feras.altaleb.simplon@gmail.com';
                    $mail->Password   = 'oksx dmbe kgpq qyvh';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port       = 587;
                    $mail->SMTPOptions = [
                        'ssl' => [
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        ]
                    ];

                    // Recipients
                    $mail->setFrom('feras.altaleb.simplon@gmail.com', 'feras');
                    $mail->addAddress($data['Email'], $data['Prenom']);

                    // Content
                    $mail->isHTML(false);
                    $mail->Subject = 'Bienvenue sur notre site !';
                    $mail->Body    = "Bonjour " . $data['Prenom'] . ",\n\n";
                    $mail->Body   .= "Nous vous souhaitons la bienvenue sur notre site.\n";
                    $mail->Body   .= "Lors de votre première connexion, vous serez invité à enregistrer votre mot de passe.\n";
                    // Append hashed email to the URL
                    $mail->Body .= "Cliquez sur ce lien pour définir votre mot de passe http://aga/validationCompteGET?Email={$Email} Définir le mot de passe.\n";

                    // $mail->Body   .= "Cliquez sur ce lien pour définir votre mot de passe http://aga/validationCompte?m={$Email}  Définir le mot de passe.\n";
                    $mail->Body   .= "Merci de votre inscription !";

                    $mail->SMTPDebug = 0;

                    // Send the email 
                    $mail->send();
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

                $utilisateurs = $UtilisateurRepository->getAllUtilisateurs();


                include_once __DIR__ . '/../Views/components/tableUser.php';
            }
        }
    }


    public function  deleteThisUser()
    {
        $request = file_get_contents('php://input');

        if ($request) {
            $decodedRequest = json_decode($request);

            if ($decodedRequest) {
                $idThisUser = htmlspecialchars($decodedRequest->idThisUser);

                $utilisateurRepository = new UtilisateurRepository();
                $utilisateurRepository->deleteUser($idThisUser);
                $utilisateurs = $utilisateurRepository->getAllUtilisateurs();

                include_once __DIR__ . '/../Views/components/tableUser.php';
            }
        } else {
            echo "Invalid request";
        }
    }


    public function createUserPassword()
    {
        $request = file_get_contents('php://input');

        if ($request) {
            $decodedRequest = json_decode($request);

            if ($decodedRequest) {
                $data = [
                    'Mot_De_Passe_Choisi' => htmlspecialchars($decodedRequest->Mot_De_Passe_Choisi),
                    'Email' => htmlspecialchars($decodedRequest->Email),
                ];

                $Mot_De_Passe_Choisi = $data['Mot_De_Passe_Choisi'];
                $Email = $data['Email'];

                $utilisateurRepository = new UtilisateurRepository();
                $utilisateur = $utilisateurRepository->getUserByHashedEmail($Email);

                if ($utilisateur) {
                    $hashedPassword = password_hash($Mot_De_Passe_Choisi, PASSWORD_DEFAULT);

                    $utilisateurRepository->updateUserPassword($Email, $hashedPassword);

                    include_once __DIR__ . '/../Views/validationCompte.php ';


                    echo "Password updated successfully. Your account is now active.";
                } else {
                    echo "Invalid or expired link.";
                }
            } else {
                echo "Invalid request data.";
            }
        } else {
            echo "No request data received.";
        }
    }




    public function treatmentConnection()
    {
        $request = file_get_contents('php://input');

        if (!empty($request)) {
            $decodedRequest = json_decode($request);

            if ($decodedRequest && isset($decodedRequest->Email) && isset($decodedRequest->Mot_De_Passe)) {
                $Email = filter_var($decodedRequest->Email, FILTER_VALIDATE_EMAIL);
                $Mot_De_Passe = trim($decodedRequest->Mot_De_Passe);

                if ($Email === false) {
                    echo json_encode(array("success" => false, "error" => "Invalid email format."));
                    exit();
                }

                $userRepository = new UtilisateurRepository();
                $user = $userRepository->getUserByEmail($Email);

                if ($user) {
                    if (password_verify($Mot_De_Passe, $user['Mot_De_Passe'])) {
                        $_SESSION['connected'] = true;
                        // $_SESSION['role'] = 'admin';

                        $role = $user['ID_Role'];
                        // var_dump($role);
                        // die;
                         switch ($role) {
                            case 1:
                                $_SESSION['role'] = 'apprenant';
                                break;
                            case 2:
                                $_SESSION['role'] = 'formateur';
                                break;
                            case 3:
                                $_SESSION['role'] = 'admin';
                                break;
                            default:
                                $_SESSION['role'] = 'Aprrenant';
                        }
                        include_once __DIR__ . '/../Views/dashboard.php';


                        exit();
                    } else {
                        echo json_encode(array("success" => false, "error" => "Incorrect email or password."));
                        exit();
                    }
                } else {
                    echo json_encode(array("success" => false, "error" => "User not found."));
                    exit();
                }
            } else {
                echo json_encode(array("success" => false, "error" => "Invalid request data."));
                exit();
            }
        } else {
            echo json_encode(array("success" => false, "error" => "Empty request data."));
            exit();
        }
    }
}
