<template> 
<div id="frame">
	<div id="sidepanel">
		<div id="profile">
			<div class="wrap">
				<img id="profile-img" :src="'/storage/images/usersPhotos/'+user.photo" class="online" alt="" />
				<p>{{user.firstname}} {{user.lastname}}</p>
				<div id="expanded">
					<label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="mikeross" />
					<label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="ross81" />
					<label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
					<input name="twitter" type="text" value="mike.ross" />
				</div>
			</div>
		</div>		
		<div id="contacts">
			<ul>
				<li v-for="receiver in users"  :key="receiver.id" @click="fetchMessages(receiver.id)" class="contact" :class="[ this.activeid == receiver.id ? 'active' : '' ]">
					<div v-if="user.id != receiver.id" class="wrap">						
						<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
						<div class="meta">
							<p class="name">{{receiver.firstname}} {{receiver.lastname}}</p>
							<div>
								<p class="preview" v-for="message in messages.slice(messages.length-1,messages.length)" :key="message.id">{{message.message}}</p>
							</div>

						</div>
					</div>
				</li>						
			</ul>
		</div>		
	</div>
	<div class="content">
		<div class="contact-profile">
			<img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
			<p v-for="message in messages.slice(0,1)">{{message.user.firstname}} {{message.user.lastname}}</p>
			<div class="social-media">
				<i class="fa fa-facebook" aria-hidden="true"></i>
				<i class="fa fa-twitter" aria-hidden="true"></i>
				<i class="fa fa-instagram" aria-hidden="true"></i>
			</div>
		</div>
		<div class="messages">
			<ul>
				<li v-for="message in messages" :key="message.id" :class="[ message.user.nickname != user.nickname ? 'sent' : 'replies' ]">
					<img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
					<p>{{message.message}}</p>
				</li>
			</ul>
		</div>
		<div class="message-input">
			<div class="wrap">
			<input type="text" v-model="newMessage" @click="sendMessage()" placeholder="Write your message..." />
			<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
			<button class="submit" @click="sendMessage()"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
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
                //asd
            });
        }
        }    
    }
</script>