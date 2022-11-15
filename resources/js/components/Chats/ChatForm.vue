<template> 
    <section style="">        
        <div class="container py-5">            
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card" id="chat1" style="border-radius: 15px;">
                        <div class="card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0"
                            style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                            <i class="fas fa-angle-left"></i>
                            <p class="mb-0 fw-bold">Chat to: {{this.activeid.nickname}}</p>
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="card-body">
                            <div v-for="message in messages">
                                <div v-if="message.user.nickname == this.user.nickname" class="d-flex flex-row justify-content-end mb-4">
                                        <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                                        <p class="small mb-0">{{ message.message }}</p>
                                        </div>
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                                        alt="avatar 1" style="width: 45px; height: 100%;">
                                </div>   
                                <div v-else class="d-flex flex-row justify-content-start mb-4">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                        alt="avatar 1" style="width: 45px; height: 100%;">
                                        <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                                            <p class="small mb-0">{{ message.message }}</p>
                                        </div>
                                </div>
                            </div>  
                            <div class="form-outline">
                                <div class="input-group">
                                    <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                                            Send
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </section>
</template>

<script>
    export default {
        props: ['user','idrec'],

        data() {
            return {
                newMessage: '',
                messages: [],
                activeid: this.idrec,
            }
        },

        mounted(){
            this.fetchMessages();
        },

        methods: {
            fetchMessages() {
                axios.get('/private-message/' + this.activeid.id).then(response => {
                    this.messages = response.data;
                });
            },
            sendMessage() {
            axios.post('/private-message/' + this.activeid.id, {message: this.newMessage}).then(response => {
                this.newMessage = '';
                //this.messages.push(response.data.message);
                this.fetchMessages();
                //asd
            });
        }
        }    
    }
</script>