<template> 
<div id="frame" class="mx-auto my-5 pb-5">
	<div id="sidepanel">
		<div id="profile">
			<div class="wrap">				
				<img id="profile-img" :src="'/storage/images/usersPhotos/'+user.photo" v-if="user.photo" class="online img-fluid" alt="" />
				<img id="profile-img" :src="'/storage/images/usersPhotos/placeholder.png'" v-else class="online img-fluid" alt="" />
				<p>{{user.firstname}} {{user.lastname}}</p>				
			</div>
		</div>		
		<div id="contacts">
			<ul>
				<li v-for="receiver in users"  :key="receiver.id" @click="fetchMessages(receiver.id,receiver);" class="contact user-select-none" :class="[ this.activeid == receiver.id ? 'active' : '' ]">
					<div v-if="user.id != receiver.id" class="wrap">						
						<img v-if="receiver.photo" :src="'/storage/images/usersPhotos/'+receiver.photo" alt="" />
						<img v-else :src="'/storage/images/usersPhotos/placeholder.png'" alt="" />
						<div class="meta">
							<p class="name">{{receiver.firstname}} {{receiver.lastname}}</p>							
							<div>
								<p class="preview" v-for="message in receiver.allMessages.slice(receiver.allMessages.length-1, receiver.allMessages.length)" :key="message.id">
									<div v-if="user.id == message.user_id"> Ty: 
										{{message.message}}
									</div>
									<div v-else>
										{{message.message}}
									</div>
								</p>
							</div>
						</div>
					</div>
				</li>						
			</ul>
		</div>		
	</div>
	<div class="content">
		<div class="contact-profile">
			<div v-if="activeUser" @click="profileLink(activeUser.slug)" style="cursor: pointer;">
				<img v-if="activeUser.photo" :src="'/storage/images/usersPhotos/'+activeUser.photo" alt="" />
				<img v-else :src="'/storage/images/usersPhotos/placeholder.png'" alt="" />
				<p>{{activeUser.firstname}} {{activeUser.lastname}}</p>							
			</div>
			<div class="social-media" v-if="activeUser">
				<i @click="socialLink(activeUser.facebook)" class="fa-brands fa-facebook fa-xl" style="color:#1093f3"></i>
                <i @click="socialLink(activeUser.twitter)" class="fa-brands fa-twitter fa-xl" style="color:#1093f3"></i>
                <i @click="socialLink(activeUser.instagram)" class="fa-brands fa-instagram fa-xl" style="color:red"></i>
			</div>
		</div>
		<div class="messages">			
			<div v-if="activeUser && poke.userpoked_id == user.id && truefalse" class="system d-flex flex-row justify-content-center mb-4 user-select-none">				
                <div class="system2 p-3 ms-3 w-25" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                    <p class="big mb-0 text-wrap ">Czy chcesz zatwierdzic użytkownika <span class="fw-bold">{{activeUser.firstname}} {{activeUser.lastname}}</span> z ogłoszenia o kategorii: <span class="fw-bold">{{poke.announcementcat}}</span>?</p>
                    <div class="d-flex justify-content-between mt-2">
                        <button type="button" class="btn btn-primary" style="background: #435f7a; border-color: #435f7a;" @click="announcementYes()">Tak</button>
                        <button type="button" class="btn btn-primary" style="background: #435f7a; border-color: #435f7a;" @click="announcementNo()">Nie</button>
                    </div>
                </div>
            </div>
			<ul id="messages">
				<li v-for="message in messages" :key="message.id" :class="[ message.user.nickname != user.nickname ? 'sent' : 'replies' ]">
					<img class="img-fluid" v-if="message.user.photo" :src="'/storage/images/usersPhotos/'+message.user.photo" alt="" />
					<img v-else :src="'/storage/images/usersPhotos/placeholder.png'" alt="" />
					<p>{{message.message}}</p>
				</li>
			</ul>
		</div>
		<div class="message-input">
			<div class="wrap">
			<input type="text" v-model="newMessage" v-on:keyup.enter="sendMessage()" placeholder="Write your message..." />
			<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
			<button class="submit" @click="sendMessage()"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</div>
</template>

<script>
import { throwStatement } from '@babel/types';

    export default {
        props: ['user'],

        data() {
            return {
                newMessage: '',
                messages: [],
				users: [],
                activeid: null,
				activeUser: null,	
				poke: '',
				truefalse: true,			
            }
        },

		created(){			
			this.fetchUsers();
			window.Echo.private('privateChat.'+this.user.id)
			.listen('MessageSent', (e) => {
				if(this.messages.length > 0)
				this.messages.push(e.message);
				setTimeout(this.scrollToEnd,100);
			});
		},

        mounted(){            
        },

        methods: {
			getPoke(receiverid){
				axios.get('/getpoke/' + receiverid).then(response => {
                    this.poke = response.data;
                });
				
			},
			announcementYes(){
				axios.get('/announcementYes/' + this.poke.id).then(response => {
                    // window.location.href = "/search_announcement/";
					this.truefalse = false;
                });
				
			},
			announcementNo(){
				axios.get('/announcementNo/' + this.poke.id).then(response => {
                    // window.location.href = "/search_announcement/";
					this.truefalse = false;
                });
				
			},
            fetchMessages(receiverid,receiver) {
                axios.get('/private-message/' + receiverid).then(response => {
                    this.messages = response.data;
                });
				this.getPoke(receiverid);
				this.activeid = receiverid;	
				this.activeUser = receiver;		

            },
			fetchUsers() {
                axios.get('/users').then(response => {
                    this.users = response.data;
                });
            },
            sendMessage() {
				if(this.newMessage != '' && this.activeid != null)
            	axios.post('/private-message/' + this.activeid, {message: this.newMessage}).then(response => {
                this.newMessage = '';
                //this.messages.push(response.data.message);
                this.fetchMessages(this.activeid,this.activeUser);
				setTimeout(this.scrollToEnd,100);
            });
        },
		profileLink(slug){
			window.location.href = "/profile/"+slug;
		},
		socialLink(link){
			window.location.assign(link);
		},
		scrollToEnd(){			
			$('.messages').animate({ scrollTop: $('.messages').offset().top + $('#messages').height()}, 1000);
		}

        }    
    }
</script>