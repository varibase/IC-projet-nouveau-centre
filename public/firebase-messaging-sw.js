// Initialize the service worker
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw.js', {
        scope: '.'
    }).then(function (registration) {
        // Registration was successful
        // Initialize the Firebase app in the service worker by passing in the
        // messagingSenderId.
                firebase.initializeApp({
                    'messagingSenderId': '915524411821'
                });

        // Retrieve an instance of Firebase Messaging so that it can handle background
        // messages.

        const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function () {
                console.log("Notification permission granted.");
                return messaging.getToken()
            })
            .then(function(token){
                $.get('/push/optin/'+token);
            })
            .catch(function (err) {
                console.log("Unable to get permission to notify.", err);
            });

        console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
    }, function (err) {
        // registration failed :(
        console.log('Laravel PWA: ServiceWorker registration failed: ', err);
    });
}

