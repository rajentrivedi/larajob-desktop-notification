import './bootstrap';
import Echo from "laravel-echo"
import Pusher from "pusher-js"

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: "my123",
    wsHost: window.location.hostname,
    wsPort: 6001,
    forceTLS: false,
    wsHost: window.location.hostname,
    disableStats: true,
    encrypted: false,
    enabledTransports: ['ws','wss'],
    cluster:"mt1"
});


