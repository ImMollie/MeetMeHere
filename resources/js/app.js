import $ from 'jquery';
window.$ = window.jQuery = $;
require('./bootstrap');
global.bootstrap = require('bootstrap');

import { createApp } from 'vue'
import chatForm from './components/Chats/ChatForm'
import chatRoom from './components/Chats/ChatRoom'

const app = createApp({});

// Echo.private('chat')
//     .listen('MessageSent', (e) => {
//         this.messages.push({
//             message: e.message.message,
//             user: e.user
//         });
//     });

app.component('chat-form', chatForm);
app.component('chat-room', chatRoom);
app.mount('#app');