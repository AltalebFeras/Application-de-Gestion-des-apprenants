<?php

namespace src\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

use src\Repositories\UtilisateurRepository;
use src\Services\Reponse;


class UtilisateurController
{
    use Reponse;

    public function treatmentCreateNewUser()
    {
        $request = file_get_contents('php://input');

        if ($request) {
            $decodedRequest = json_decode($request);

            if ($decodedRequest) {
                $data = [
                    'Nom' => htmlspecialchars($decodedRequest->Nom),
                    'Prenom' => htmlspecialchars($decodedRequest->Prenom),
                    'Email' => htmlspecialchars($decodedRequest->Email)
                ];

                $UtilisateurRepository = new UtilisateurRepository();
                $UtilisateurRepository->createUser($data);

                // Send welcome email using PHPMailer
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com'; // SMTP server
                    $mail->SMTPAuth   = true; // Set to false if authentication is not required
                    $mail->Username   = 'feras.altaleb.simplon@gmail.com'; // SMTP username (if required)
                    $mail->Password   = 'oksx dmbe kgpq qyvh'; // SMTP password (if required)

                    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                    $mail->Port       = 587; // TCP port to connect to

                    // Additional SMTP options for debugging and SSL verification
                    $mail->SMTPOptions = [
                        'ssl' => [
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        ]
                    ];

                    //Recipients
                    $mail->setFrom('feras.altaleb.simplon@gmail.com', 'feras');
                    $mail->addAddress($data['Email'], $data['Prenom']);

                    // Content
                    $mail->isHTML(false); // Set email format to HTML
                    $mail->Subject = 'Bienvenue sur notre site !';
                    $mail->Body    = "Bonjour " . $data['Prenom'] . ",\n\n";
                    $mail->Body   .= "Nous vous souhaitons la bienvenue sur notre site.\n";
                    $mail->Body   .= "Lors de votre première connexion, vous serez invité à enregistrer votre mot de passe.\n";
                    $mail->Body   .= "Merci de votre inscription !";

                    // Enable debugging for more detailed error messages
                    $mail->SMTPDebug = 0;

                    // Send the email
                    $mail->send();
                    echo 'Email has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }

                // Redirect to dashboard or display success message
                include_once __DIR__ . '/../Views/dashboard.php';
            }
        }
    }
}
