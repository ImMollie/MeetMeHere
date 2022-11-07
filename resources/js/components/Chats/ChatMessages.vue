<template>   
        <div v-for="message in messages">
        <div v-if="message.user.nickname == this.dupa.nickname" class="d-flex flex-row justify-content-end mb-4">
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
    </template>

<script>
  export default {
    props: ["messages","dupa"],
}
</script>

