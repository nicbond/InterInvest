Test technique INTER INVEST

Stack technique: PHP 7.4.7 / Symfony 4.4.22

SUJET: Création d’un système d’historisation de sociétés

On veut pouvoir gérer des sociétés (Nom, numéro SIREN, ville d’immatriculation, Date d’immatriculation, Capital) ayant une forme juridique (liste jointe) stockée dans une table séparée et une ou plusieurs adresses (Numéro, type de voie, nom de voie, Ville, Code Postal).
Prévoir un formulaire de saisie et de modification d’une société et de ses adresses.
Prévoir une page d’affichage des informations d’une société.
Prévoir également sur cette page un champ permettant de saisir une date avec les heures, minutes et secondes. Lors du choix de la date, la société s’affichera telle que saisie à la date choisie, avec les adresses attachées à la date choisies également.

L’idée générale est donc d’avoir un système d’archivage des modifications des sociétés avec possibilité d’afficher les différentes versions.

A faire en PHP, et Symfony dans les versions qui vous conviennent. Nous ne tiendrons pas compte de la présentation graphique des pages, même si la présentation et l’ergonomie sont un plus.

Il est demandé :
 - Une version du code source avant présentation
 - Une présentation interactive du code sources (mécanismes utilisés, points particuliers à mettre en lumière, bonnes pratique mise en œuvre …) lors d’un entretien.

URLs:
 - Liste des formes juridiques: http://localhost:8000/jurisdiction/
 - Liste des sociétés: http://localhost:8000/company/
 - Liste des adresses: http://localhost:8000/address/

Explications:

Il faudra dans un premier temps renseigné les formes juridiques.

N'ayant pas encore eu l'opportunité de voir les formulaires imbriquées, je n'ai pas pu créer un formulaire regroupant les champs de la société et les champs des adresses.
Par conséquent, j'ai coupé cette étape en 2:
 - tout d'abord, vous devrez créer la société: ce qui vous permettra d'assigner une forme juridique à la société.
 - puis de créer une nouvelle adresse et c'est ici que vous pourrez assigner une société à cette adresse.
 
Comme il est indiqué dans le sujet:
 - une société ne peut avoir qu'une seule forme juridique.
 - une forme juridique peut être en lien avec plusieurs sociétés.
 - une société peut avoir plusieurs adresses.
 - une adresse peut avoir plusieurs sociétés.
 
L'archivage des données a été mit en place dès qu'il y a une modification des données que ce soit concernant les informations de la société ou les informations vis à vis de l'adresse.

Lorsque vous cliquerez sur le bouton Infos, celui-ci vous donnera toutes les infos de la société avec son ou ses adresses associées.
Lorsque vous cliquerez sur le botuon Historique, celui-ci vous affichera comme son nom l'indique l'historique des modifications.
Cette justement sur cette page que vous trouverez le bouton permettant de saisir une date.
Petite précision sur celui-ci, il n'affiche pas les secondes: ce qui fait que je récupére la date et la passe ensuite au format ('Y-m-d H:i:s').

J'ai mis en place:
 - l'injection de dépendance dans les méthodes de controller.
 - traduit les pages en français.
 - bootstrap pour les vues et formulaires.
 - méthode dans les repository.
 - ranger les formes juridiques et les sociétés par ordre croissant dans les formulaires afin de les trouver plus rapidement.
 - ranger les codes sources par dossier.


