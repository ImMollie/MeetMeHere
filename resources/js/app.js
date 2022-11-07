import $ from 'jquery';
window.$ = window.jQuery = $;
require('./bootstrap');
global.bootstrap = require('bootstrap');

import { createApp } from 'vue'
import Chats from './components/Chats/Index'
import chatForm from './components/Chats/ChatForm'
import chatMessages from './components/Chats/ChatMessages'

const app = createApp({
    data() {
        return {
            messages: [],
            activeid: null,
        }
    },

    created() {
        this.fetchMessages(activeid);
    },

    methods: {
        setActiveid(tmp) {
            this.activeid = tmp;
        },
        fetchMessages(userid) {
            axios.get('/private-messages/' + userid).then(response => {
                this.messages = response.data;
            });
        },
        addMessage(message, idrec) {
            this.setActiveid(idrec);
            axios.post('/private-messages/' + idrec, message).then(response => {
                this.messages.push(response.data.message);
                //asd
            });
        }
    }
})

// Echo.private('chat')
//     .listen('MessageSent', (e) => {
//         this.messages.push({
//             message: e.message.message,
//             user: e.user
//         });
//     });

app.component('chat-messages', chatMessages);
app.component('chat-form', chatForm);
app.component('chat-index', Chats);
app.mount('#app')