<template> 
    <section style="">        
        <div class="container py-5">            
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card" id="chat1" style="border-radius: 15px;">
                        <div class="card-header row justify-content-center align-items-center p-3 bg-info text-white border-bottom-0"
                            style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                            <a class="fas fa-angle-left col-1" @click="redirect"></a>
                            <p class="mb-0 fw-bold col text-center">Announcement of:<br> {{this.activeid.nickname}}</p>                                                       
                        </div>
                        <div class="card-body">
                            <div>                                
                                <div class="d-flex flex-row justify-content-start mb-4">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                                        alt="avatar 1" style="width: 45px; height: 100%;">
                                    <div class="p-3 ms-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                                        <p class="small mb-0"> Let him know about your intenions, describe as many as you can.</p>
                                    </div>                                    
                                </div> 
                                <div v-if="message">
                                    <div class="d-flex flex-row justify-content-end mb-4">
                                        <div class="p-3 me-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                                            <p class="small mb-0">{{ message }}</p>
                                        </div>
                                        <img v-if="user.photo" :src="'/storage/images/usersPhotos/'+user.photo" alt="" style="width: 45px; height: 100%;"/>
						                <img v-else :src="'/storage/images/usersPhotos/placeholder.png'" alt="" style="width: 45px; height: 100%;"/>

                                    </div>
                                    <div class="d-flex flex-row justify-content-start mb-4">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                                            alt="avatar 1" style="width: 45px; height: 100%;">
                                    <div class="p-3 ms-3 border" style="border-radius: 15px; background-color: #fbfbfb;">
                                        <p class="small mb-0"> Creator of this announcement will decided if he wanna agree this.</p>
                                    </div>                                    
                                </div> 
                                </div>
                                
                            </div>  
                            <div v-if="!message" class="form-outline">
                                <div class="input-group">
                                    <input id="btn-input" type="text" name="message" class="form-control input-sm" placeholder="Type your message here..." v-model="newMessage" @keyup.enter="sendMessage">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">
                                            Send
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div v-else class="form-outline px-3 py-3 justify-content-center d-flex" style="border-radius: 15px; background-color: #228B22; color: white;">
                                <i class="fa-xl fa-solid fa-check"></i>
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
        props: ['user','idrec','announcement'],

        data() {
            return {
                newMessage: '',                
                activeid: this.idrec,
                message: '',                
            }
        },
        

        methods: {            
            redirect(){
                window.location.assign('http://localhost:8000/search_announcement');
            },
            sendMessage() {                
            axios.post('/private-messagepoke/' + this.activeid.id, {message: this.newMessage, announcement: this.announcement.id}).then(response => {
                this.message = this.newMessage;
                this.newMessage = '';
                //this.messages.push(response.data.message);
                //this.fetchMessages();                
            });
        }
        }    
    }
</script>