Introduction 
Contexte et problématique 
L’entreprise Smarttech souhaite mettre en place une plateforme web permettant la 
gestion efficace de ses employés, clients et documents. Le projet comprend également 
l’intégration de plusieurs services réseau pour assurer une connectivité et une 
accessibilité optimales. 
Objectifs du projet 
1. Développement de l’application web 
• Technos : PHP/MySQL avec une interface en HTML/CSS (Bootstrap) 
• Fonctionnalités principales : CRUD pour employés, clients, documents 
• Hébergement : Serveur Apache2/Nginx 
2. Déploiement des services réseau 
• DNS (BIND) : Pour permettre l’accès à l’application via un domaine interne 
• Messagerie (iRedMail) : Pour les notifications automatiques 
• FTP : Pour le partage de fichiers 
• Serveur web : Configuration d’Apache2/Nginx 
3. Accès distant 
• SSH : Pour la gestion à distance des machines Linux 
• VNC/NoVNC : Pour un accès graphique aux machines Linux 
• RDP : Pour un accès aux machines Windows 
4. Tests et validation 
• Vérification des connexions aux services (DNS, mail, FTP) 
• Test des accès distants 
• Validation du bon fonctionnement global de la plateforme

1. Pour cloner le proget : 
git clone https://github.com/MariemeKmr/ProgetSmartech.git
cd chemin/du/repository  
2. Installer les dépendances : composer install  
3. Configurer l'environnement :
    cp .env.example .env 
    php artisan key:generate  
5. Configurer la base de données et exécuter les migrations : php artisan migrate
6. exécuter les seeders : php artisan db:seed
7. Démarrer le serveur de développement : php artisan serve 
