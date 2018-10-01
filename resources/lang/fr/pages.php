<?php

return [
    'switch-lang' => 'en',

    'navbar'      => [
        'projet' => 'Projet Nouveau Centre',
        'devenir-membre' => 'Devenir membre',
        'espace-membre' => 'Espace Membre',
        'motdepasse-oublie' => "Mot de passe oublié",
        "profil"    => "PROFIL",
        "deconnexion" => "Déconnexion",
        'ma-carte' => "Ma Carte"
    ],
    
    'home'       => [
        'sous-titre'    => 'En tant qu’occupants du secteur, vous êtes au cœur de notre initiative de revitalisation du centre-ville de Montréal, c’est pourquoi nous vous offrons la carte Projet Nouveau Centre Privilèges qui vous permettra de bénéficier en tout temps de plusieurs rabais et offres chez nos partenaires.',
        'privileges'    => 'Vos Privil&egrave;ges',
        'offer-cta'     => 'EN SAVOIR PLUS',

    ],

    'offers' => [
         'how-to' => 'Comment obtenir l’offre ?',
         'date-fin' => 'Offre valable jusqu’au',
         'addresse' => 'Adresse:',
        'itineraire'    => 'voir l\'itinéraire'
     ],
    'register'       => [
        'titre'    => 'Devenir Membre',
        'button'    => 'DEVENIR MEMBRE',

        'firstname'   => 'Prénom',
        'lastname'    => 'Nom',
        'email'       => 'Courriel',
        'phone'       => 'Cellulaire',
        'company'   => 'Compagnie',
        'companylist'      => [
                    "1" => "Ivanhoé Cambridge",
                    "2" => "Lorem Ipsum",
                    "3" => "Lorem Ipsum",
        ],
        'lang'      => 'Langue de préférence',
        'langFR'    => 'Français',
        'langEN'    => 'English',
        'terms1'    => "J'accepte les",
        'terms2'    => "Conditions Générales d'utilisation",
        'optin'    => "J'accepte de recevoir des communications de la part d'Ivanhoé Cambridge",
        'success'   => "Votre inscription a bien été prise en compte. Merci de vérifier vos courriels afin de confirmer votre inscription"
    ],
    'profile'       => [
        'titre'    => 'Profil',
        'button'    => 'ENREGISTRER',
        'success'   => "Votre profil a bien été mis à jour"
    ],

    'login1'       => [
        'titre'    => 'Espace Membre',
        'button'    => 'SUIVANT',
    ],
    'login2'       => [
        'titre'    => 'Espace Membre',
        'button'    => 'CONNEXION',
        'password'  =>  "Mot de passe",
        "emailerror"=>  'Vous n\'êtes pas encore membre du projet Nouveau Centre : <br><a class="toggle-modal" href="/register" data-modaltype="register" data-action="DEVENIR MEMBRE">Devenir membre</a>',
        "confirmerror" => "Votre inscription n'est pas confimée. <br>Nous venons de vous renvoyer un courriel de demande de confirmation.",
        "passerror"=>  "Ce mot de passe est incorrect.",
        "success" => "Vous êtes connecté(e) à votre espace membre."
    ],

    'confirm'       => [
        'titre'    => 'Espace Membre',
        'soustitre' => "Votre inscription est confirmée. Veuillez choisir un mot de passe",
        'button'    => 'CONFIRMER',
        'password'  => "Mot de passe",
        'confirm-password'  => "Confirmation",
        'success' => "Votre inscription est maintenant terminée."
    ],

    'passwordreset'       => [
        'titre'    => 'Mot de passe oublié',
        'button'    => 'SUIVANT',
        "invaliduser"   => "Cette adresse courriel n'existe pas",
        'success'   =>  "Un courriel de réinitialisation de mot de passe vous a été envoyé."
    ],
    'passwordchange'       => [
        'titre'    => 'Réinitialiser votre mot de passe',
        'button'    => 'SUIVANT',
        'success'   => "Votre mot de passe a été mis à jour."
    ],

    'formerrors'       => [
        'firstname'    => "Merci d'indiquer votre prénom",
        'lastname'    => "Merci d'indiquer votre nom",
        'email'        => "Merci d'indiquer une adresse courriel valide",
        'phone'         => "Le numéro de mobile doit respecter ce format : +1(999)-999-9999",
        'terms'         => "Vous devez accepter les CGU",
        'password'      => "Merci d'indiquer votre mot de passe",
        'password-length' => "Votre mot de passe doit être composé de 4 à 12 caractères",
        'generalerror'  => "Une erreur est survenue."
    ],

    'mycard'       => [
        'titre'    => 'Ma Carte'
    ],

    'footer'      => [
        'l1' => '&copy; 2018 Ivanhoé Cambridge',
        'l2' => 'Ivanhoé Cambridge Inc.',
        'l3' => '1001, rue du Square-Victoria',
        'l4' => 'Montréal, Québec, Canada  H2Z 2B5',
        'cgu' => "Conditions Générales d'Utilisation"
    ],

    'cgu-file' => 'files/legal-fr.pdf',
];