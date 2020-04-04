import Echo from 'laravel-echo';
import io from "socket.io-client";
window.io = io
// window.Pusher = require('pusher-js');
 window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: 'http:/192.168.10.10:6001'
    //key: process.env.MIX_PUSHER_APP_KEY,
    //cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    //forceTLS: true
});

//alert('Probando que este conectado')
