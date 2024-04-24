# Application-de-Gestion-des-apprenants
# Pensez à modifier le fichier config.example.php et puis modifier le nom du fichier comme "config.php"
define('DB_HOST', '');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PWD', '');
define('PREFIXE', '');

define('HOME_URL', '');

DB_HOST = votre hostserver ,
DB_NAME = le nom de votre database,
DB_USER = le nom d'utilisateur associé à votre database,
DB_PWD = le mot de passe de cet utilisateur ,
HOME_URL = c'est le chemin  vers le fichier index dans le dossier public

# installation:

installez L'emulateur  WWAMP https://www.wampserver.com/ 
in phpmyAdmin executez le code dans le fichier migration 
l'admin doit être créer manullement dans la database pour la premiere fois
puis vous pouvez ajouter un autre compte admin et après avoir fait le verification de votre mode passe vous pouvez supprimer le compte que vous aves manuellemnt ajouté.




 
# Description
Ce projet est une application de gestion des apprenants qui permet de gérer les absences et les retards des apprenants. L'application nécessite une connexion pour accéder aux différents espaces et offre plusieurs accès avec différents privilèges pour les utilisateurs, tels que les campus managers, les responsables pédagogiques, les formateurs, les délégués et les apprenants.

# Fonctionnalités
Gestion des rôles : Les utilisateurs ont des accès différents en fonction de leur rôle. Les routes sont vérifiées pour chaque rôle afin de limiter les actions disponibles.

# Gestion des promos :
Les responsables pédagogiques ( comme rôle admin dans ce projet )  peuvent voir, ajouter, modifier ou supprimer des apprenants de leurs promos.
# Gestion des présences : 
Les formateurs peuvent voir et modifier les présences et les retards des apprenants de leurs promos.
# Validation de présence : 
Les apprenants peuvent valider leur présence dans le temps imparti par taper un code aléatoire donné par leur formateur.
# Notifications par e-mail :
Des e-mails sont envoyés lors de l'adimn ou le formateur ajoute un apprenant .

 
# le depot Git 
https://github.com/AltalebFeras/Application-de-Gestion-des-apprenants.git

Creér par 
FERAS ALTALEB
