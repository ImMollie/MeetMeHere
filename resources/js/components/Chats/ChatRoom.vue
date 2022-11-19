<template> 
<div id="frame" class="mx-auto my-5">
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
				<li v-for="receiver in users"  :key="receiver.id" @click="fetchMessages(receiver.id); activeUser = receiver;" class="contact" :class="[ this.activeid == receiver.id ? 'active' : '' ]">
					<div v-if="user.id != receiver.id" class="wrap">						
						<img v-if="receiver.photo" :src="'/storage/images/usersPhotos/'+receiver.photo"  alt="" />
						<img :src="'/storage/images/usersPhotos/placeholder.png'" v-else  alt="" />
						<div class="meta">
							<p class="name">{{receiver.firstname}} {{receiver.lastname}}</p>
							<div>
								<p class="preview"></p>
							</div>
						</div>
					</div>
				</li>						
			</ul>
		</div>		
	</div>
	<div class="content">
		<div class="contact-profile">
			<div v-if="activeUser">
				<img :src="'/storage/images/usersPhotos/'+activeUser.photo" v-if="activeUser.photo" class="img-fluid" alt="" />
				<img :src="'/storage/images/usersPhotos/placeholder.png'" v-else class="img-fluid" alt="" />
				<p>{{activeUser.firstname}} {{activeUser.lastname}}</p>		
			</div>
			<div class="social-media">
				<i class="fa-brands fa-facebook fa-xl" style="color:#1093f3"></i>
				<i class="fa-brands fa-twitter fa-xl" style="color:#1093f3"></i>
				<i class="fa-brands fa-instagram fa-xl" style="color:red"></i>
			</div>
		</div>
		<div class="messages">
			<ul>
				<li v-for="message in messages" :key="message.id" :class="[ message.user.nickname != user.nickname ? 'sent' : 'replies' ]">
					<img :src="'/storage/images/usersPhotos/'+message.user.photo" v-if="message.user.photo" class="img-fluid" alt="" />
					<img :src="'/storage/images/usersPhotos/placeholder.png'" v-else class="img-fluid" alt="" />
					<p>{{message.message}}</p>
				</li>
			</ul>
		</div>
		<div class="message-input">
			<div class="wrap">
			<input type="text" v-model="newMessage" v-on:keyup.enter="sendMessage()" class="rounded" placeholder="Przywitaj sie..."  style="border;"/>
			<button class="submit" @click="sendMessage()"><i class="fa fa-paper-plane fa-xl" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</div>
</template>

<script>
    export default {
        props: ['user'],

        data() {
            return {
                newMessage: '',
                messages: [],
				users: [],
                activeid: null,
				activeUser: null,
            }
        },

		created(){			
			this.fetchUsers();
		},

        mounted(){        
        },

        methods: {
            fetchMessages(receiverid) {
                axios.get('/private-message/' + receiverid).then(response => {
                    this.messages = response.data;
                });
				this.activeid = receiverid;
            },
			fetchUsers() {
                axios.get('/users').then(response => {
                    this.users = response.data;
                });
            },
            sendMessage() {
				if(this.newMessage != '')
            axios.post('/private-message/' + this.activeid, {message: this.newMessage}).then(response => {
                this.newMessage = '';
                //this.messages.push(response.data.message);
                this.fetchMessages(this.activeid);
            });
        }
        }    
    }
</script>