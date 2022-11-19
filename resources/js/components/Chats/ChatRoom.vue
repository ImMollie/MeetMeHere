<template>
	<div id="frame" class="mx-auto my-5 pb-5">
		<div id="sidepanel">
			<div id="profile">
				<div class="wrap">

					<img id="profile-img" :src="'/storage/images/usersPhotos/' + user.photo" v-if="user.photo"
						class="online img-fluid" alt="" />
					<img id="profile-img" :src="'/storage/images/usersPhotos/placeholder.png'" v-else
						class="online img-fluid" alt="" />
					<p>{{ user.firstname }} {{ user.lastname }}</p>
				</div>
			</div>
			<div id="contacts">
				<ul>
					<li v-for="receiver in users" :key="receiver.id"
						@click="fetchMessages(receiver.id); activeUser = receiver;" class="contact user-select-none"
						:class="[this.activeid == receiver.id ? 'active' : '']">
						<div v-if="user.id != receiver.id" class="wrap">
							<img v-if="receiver.photo" :src="'/storage/images/usersPhotos/' + receiver.photo" alt="" />
							<img :src="'/storage/images/usersPhotos/placeholder.png'" v-else alt="" />
							<span :class="(onlinearray.find(item=> item.id === receiver.id)) ? 'online' : 'busy' "></span>
							<div class="meta">
								<p class="name">{{ receiver.firstname }} {{ receiver.lastname }}</p>
								<div>
									<p class="preview"
										v-for="test in receiver.allmessages.slice((receiver.allmessages.length - 1), receiver.allmessages.length)"
										:key="test.id">
									<div v-if="user.id == test.user_id">Ty: {{ test.message }}</div>
									<div v-else>{{ test.message }}</div>
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
				<div v-if="activeUser">
					<img :src="'/storage/images/usersPhotos/' + activeUser.photo" v-if="activeUser.photo"
						class="img-fluid" alt="" />
					<img :src="'/storage/images/usersPhotos/placeholder.png'" v-else class="img-fluid" alt="" />
					<p>{{ activeUser.firstname }} {{ activeUser.lastname }}</p>
				</div>
				<div v-if="activeUser" @click="przekieruj(activeUser.slug)" class="social-media">
					<i class="fa-brands fa-facebook fa-xl" style="color:#1093f3"></i>
					<i class="fa-brands fa-twitter fa-xl" style="color:#1093f3"></i>
					<i class="fa-brands fa-instagram fa-xl" style="color:red"></i>
				</div>
			</div>
			<div class="messages">
				<div v-if="activeUser" class="system d-flex flex-row justify-content-center mb-4 user-select-none">
					<div class="system2 p-3 ms-3 w-25" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
						<p class="big mb-0 text-wrap ">Czy chcesz zatwierdzic użytkownika <span class="fw-bold">{{activeUser.firstname}} {{activeUser.lastname}}</span> z ogłoszenia?</p>
						<div class="d-flex justify-content-between mt-2">
						<button type="button" class="btn btn-primary" style="background: #435f7a; border-color: #435f7a;">Tak</button>
						<button type="button" class="btn btn-primary" style="background: #435f7a; border-color: #435f7a;">Nie</button>
						</div>
					</div>
				</div>
				<ul>
					<li v-for="message in messages" :key="message.id"
						:class="[message.user.nickname != user.nickname ? 'sent' : 'replies']">
						<img :src="'/storage/images/usersPhotos/' + message.user.photo" v-if="message.user.photo"
							class="img-fluid" alt="" />
						<img :src="'/storage/images/usersPhotos/placeholder.png'" v-else class="img-fluid" alt="" />
						<p>{{ message.message }}</p>
					</li>
				</ul>
			</div>
			<div class="message-input">
				<div class="wrap">
					<input type="text" v-model="newMessage" v-on:keyup.enter="sendMessage()" class="rounded"
						placeholder="Przywitaj sie..." style="border;" />
					<button class="submit" @click="sendMessage()"><i class="fa fa-paper-plane fa-xl"
							aria-hidden="true"></i></button>
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
			wybor: null,
			newMessage: '',
			messages: [],
			users: [],
			activeid: null,
			activeUser: null,
			onlinearray: [],
		}
	},

	created() {
		this.fetchUsers();

		window.Echo.join('privatechatstatus')
			.here((users) => {
				this.onlinearray = users;
				console.log("curernt".users);
			})
			.joining((user) => {
				this.onlinearray.push(user);
				console.log("joining: ".user);
			})
			.leaving((user) => {
				this.onlinearray.splice(this.onlinearray.indexOf(user), 1);
				console.log("leaving: ".user);
			})

		window.Echo.channel('privatechat.' + this.user.id)
			.listen('MessageSent', (e) => {
				console.log('halo');
				this.messages.push(e.message);
			});
	},

	mounted() {
	},

	methods: {
		przekieruj(slug) {
			window.location.href = "/profile/" + slug;
		},
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
			if ((this.newMessage != '') && (this.activeid != null)) {
				axios.post('/private-message/' + this.activeid, { message: this.newMessage }).then(response => {
					this.newMessage = '';
					//this.messages.push(response.data.message);
					this.fetchMessages(this.activeid);
				});
			}
		}
	}
}
</script>