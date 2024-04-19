<?php

namespace src\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

use src\Repositories\UtilisateurRepository;
use src\Services\Reponse;


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
                    'ID_Role' => htmlspecialchars($decodedRequest->ID_Role)
                ];
    
                // Hash the email address using SHA-256
                $hashedEmail = password_hash($data['Email'], PASSWORD_DEFAULT);

    
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
                    $mail->Body   .= "Cliquez sur ce lien pour définir votre mot de passe : <a href='http://aga/validationCompte?m={$hashedEmail}'>Définir le mot de passe</a>\n";
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
    
}
