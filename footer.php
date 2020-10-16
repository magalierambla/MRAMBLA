<!--FOOTER-->
<br>
<div class="container-fluid" style="background-color:black; color:white; text-align:center";>

    <?php // Pour afficher la date du jour en français :

        // 1- Définir les informations de localisation avec la fonction setlocale :
        setlocale(LC_TIME, 'fr_Fr');
        // 2- Définir le décalage horaire par défaut avec la fonction date_default_timezone_set :
        date_default_timezone_set('Europe/Paris');
        // 3- Utiliser la fonction strftime pour formater la date avec la configuration locale :
        echo  '<p>'.'© Tous Droits Réservés - Ce site a été créé en mai 2020 - '.strftime('%B %Y'). ' par Magalie RAMBLA.'.'</p>';
    
    ?>

</div>