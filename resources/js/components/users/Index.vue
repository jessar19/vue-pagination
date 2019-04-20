<template>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User</div>

                <div class="card-body">
                    
                    <user v-for="user in users" :user="user" :key="user.id"> </user>
   
                </div>
            </div>
        </div>
    </div> 

        
    
</template>

<script>

     import User from './partials/User.vue'


export default {
    
    components: { 

    User
    
    },
  
    data () {
        return {
            users: []
        }
    },

    mounted() {
      
      axios.get('/api/users').then ((response)=> {
          this.users = response.data.data;
      })

    },
}
</script>