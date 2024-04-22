# Application-de-Gestion-des-apprenants
# Pensez à modifier le fichier config.example.php et puis modifier le nom du fichier comme "config.php" 

 
Description
Ce projet est une application de gestion des apprenants qui permet de gérer les absences et les retards des apprenants. L'application nécessite une connexion pour accéder aux différents espaces et offre plusieurs accès avec différents privilèges pour les utilisateurs, tels que les campus managers, les responsables pédagogiques, les formateurs, les délégués et les apprenants.

Fonctionnalités
Gestion des rôles : Les utilisateurs ont des accès différents en fonction de leur rôle. Les routes sont vérifiées pour chaque rôle afin de limiter les actions disponibles.
Gestion des promos : Les responsables pédagogiques peuvent voir, ajouter, modifier ou supprimer des apprenants de leurs promos.
Gestion des présences : Les formateurs peuvent voir et modifier les présences et les retards des apprenants de leurs promos.
Gestion des retards : Les délégués peuvent ajouter ou modifier les retards des apprenants.
Validation de présence : Les apprenants peuvent valider leur présence dans le temps imparti.
Notifications par e-mail : Des e-mails sont envoyés lors de l'ajout d'un apprenant et en cas d'accumulation de trois retards par un apprenant.
Code aléatoire : Un code aléatoire à 5 chiffres est généré pour chaque plage horaire et renouvelé automatiquement. Les formateurs le donnent aux apprenants pour valider leur présence.
Gestion des sessions : Les sessions des utilisateurs sont enregistrées avec la date et l'heure de connexion. Les sessions vieilles de plus d'une heure sont automatiquement supprimées.
Maquettes et Bootstrap : Les maquettes seront fournies et l'utilisation de Bootstrap est recommandée pour le développement.
Priorités
Les fonctionnalités doivent être implémentées selon l'ordre de priorité suivant :

Gestion des rôles.
Donner aux formateurs le code aléatoire et leur permettre de voir tous les cours passés avec les présences.
Permettre aux apprenants de voir et de signer tous les cours auxquels ils doivent assister.
Implémenter la gestion des retards.
Envoi automatique d'e-mails en cas d'accumulation de trois retards.
Architecture et Technologies
Architecture MVC
Requêtes AJAX ou Fetch pour une application SPA
Interaction entre le back et le front en JSON
Base de données relationnelle
