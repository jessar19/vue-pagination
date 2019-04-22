<template>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User</div>

                <div class="card-body">
                    
                    <user v-for="user in users" :user="user" :key="user.id"> </user>
                    
                    <pagination :meta="meta"> </pagination>
               

                </div>
            </div>
        </div>
    </div> 

        
    
</template>

<script>

    import User from './partials/User.vue'
    import Pagination from '../pagination/Pagination.vue'


export default {
    
    components: { 

    User,
    Pagination
    
    },
  
    data () {
        return {
            users: [],
            meta: {}
        }
    },

    mounted() {
      
      axios.get('/api/users').then ((response)=> {
          this.users = response.data.data;
          this.meta  = response.data.meta;
      })

    },
}
</script>