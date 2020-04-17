<?php

return [
    'switch-lang' => 'fr',

    'navbar'      => [
        'projet' => 'Projet Nouveau Centre',
        'devenir-membre' => 'Become a Member',
        'espace-membre' => 'Member Zone',
        'motdepasse-oublie' => "Forgotten password",
        "profil"    => "PROFILE",
        "deconnexion" => "Logout",
        'ma-carte' => "My Card",
        "aide" => "Help"
    ],
    
    'home'       => [
        'sous-titre'    => 'As members of our local community, you are at the heart of our revitalization initiative for downtown Montreal. That is why we are offering you the Projet Nouveau Centre Privilèges card, which will allow you to take advantage of a variety of discounts and offers from our partners at all times.',
        'privileges'    => 'Your privileges',
        'offer-cta'     => 'LEARN MORE',
        'covid' => 'Ivanhoé Cambridge’s top priority is the health and safety of its customers, tenants, employees and the communities where the Company operates. Ivanhoé Cambridge is using all available means to help control the spread of COVID&#8209;19 and is closely monitoring the situation.',
        'no-offers' => 'There are no new Projet Nouveau Centre Privilège card offers at this time, but please check back with us in a few weeks.'
    ],

    'offers' => [
         'how-to' => 'How to get your offer ?',
         'date-fin' => 'Offer available until',
         'addresse' => 'Address:',
        'itineraire'    => 'View map'
     ],
    'register'       => [
        'titre'    => 'Become a Member',
        'button'    => 'BECOME A MEMBER',

        'firstname'   => 'First Name',
        'lastname'    => 'Last Name',
        'email'       => 'Email',
        'phone'       => 'Phone Number',
        'company'   => 'Company',
        'company-placeholder'    => 'Select a Company in the list or Create',
        'company-add'    => 'create',
        'companylist'       => [
                    "1" => "Ivanhoé Cambridge",
                    "2" => "Lorem Ipsum",
                    "3" => "Lorem Ipsum",
        ],
        'lang'      => 'Preferred Language',
        'langFR'    => 'Français',
        'langEN'    => 'English',
        'terms1'    => "I accept the",
        'terms2'    => "General Terms of Use",
        'optin'    => "I wish to receive communications from Ivanhoé Cambridge",
        'success'   => "Your registration information has been received. Please check your email to confirm your registration."
    ],
    'profile'       => [
        'titre'    => 'Profile',
        'button'    => 'SAVE',
        'success'   => "Your profile has been successfully updated"
    ],

    'login1'       => [
        'titre'    => 'Member Zone',
        'button'    => 'Next',
    ],
    'login2'       => [
        'titre'    => 'Member Zone',
        'button'    => 'LOGIN',
        'password'  =>  "Password",
        "emailerror"=>  'You are not yet a member of Projet Nouveau Centre : <br><a class="toggle-modal" href="/register" data-modaltype="register" data-action="DEVENIR MEMBRE">Register</a>',
        "confirmerror" => "Your registration is not yet complete. <br>Please check your email for a confirmaton link.",
        "passerror"=>  "Your password is incorrect.",
        "success" => "Your are logged in to your member zone."
    ],

    'confirm'       => [
        'titre'    => 'Member Zone',
        'soustitre' => "Your registration is confirmed. Please choose a password",
        'button'    => 'CONFIRM',
        'password'  => "Password",
        'confirm-password'  => "Confirmation",
        'success' => "Your registration is complete."
    ],

    'passwordreset'       => [
        'titre'    => 'Forgotten password',
        'button'    => 'NEXT',
        "invaliduser"   => "This email address does not exist in our system",
        'success'   =>  "A password recovery email has been sent to your address."
    ],
    'passwordchange'       => [
        'titre'    => 'Change your password',
        'button'    => 'NEXT',
        'success'   => "Your password has been changed."
    ],

    'formerrors'       => [
        'firstname'    => "Please enter your First Name",
        'lastname'    => "Please enter your Last Name",
        'email'        => "Please enter a valid email",
        'phone'         => "Your mobile phone number must be in this format : +1(999)-999-9999",
        'terms'         => "You must accept the General Terms of Use",
        'password'      => "Please enter your password",
        'password-length' => "Your password must contain 4 to 12 characters",
        'generalerror'  => "An error has occured."
    ],

    'mycard'       => [
        'titre'    => 'My Card'
    ],

    'help'       => [
        'titre'    => 'Help',
        'p'         => "Add a shortcut to your home screen so you can quickly open your Projet Nouveau Centre Privilèges card.",
        'l1-android'    => "1. Click on the three dots in the top right-hand corner of your screen.",
        'l2-android'    => "2. Click the option<br> \"Add to Home screen\".",
        'l3-android'    => "3. The Projet Nouveau Centre Privilèges icon will now be on your home screen.",

        'l1-apple'    => "1. Click in the bottom center",
        'l2-apple'    => "2. Click the option<br> \"Add to Home screen\".",
        'l3-apple'    => "3. The Projet Nouveau Centre Privilèges icon will now be on your home screen.",

        'mycard-titre'  =>  "My card",
        'mycard-p'  =>  "You can access your digital card on the mobile version of the Projet Nouveau Centre Privilèges website.<br> If you desire to have a physical card, you may get one at the Place Ville Marie information desk."
    ],

    'footer'      => [
        'l1' => '&copy; 2018 Ivanhoé Cambridge',
        'l2' => 'Ivanhoé Cambridge Inc.',
        'l3' => '1001, rue du Square-Victoria',
        'l4' => 'Montréal, Québec, Canada  H2Z 2B5',
        'cgu' => 'General Terms of Use'
    ],
    'cgu-file' => 'files/legal-en.pdf',
];