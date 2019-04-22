<template>

   <nav aria-label="Page navigation">

        <ul class="pagination">

            <li class="page-item" :class="{ 'disabled' :  meta.current_page === 1 }">

                <a class="page-link" href="#"  @click.prevent="switched(meta.current_page - 1)">

                    <span aria-hidden="true">&laquo;</span>

                    <span class="sr-only">Previous</span>

                </a>
            </li>

            <li class="page-item" v-for="page in meta.last_page" :class="{ 'active' : meta.current_page === page}">
                
                <a class="page-link" href="#" @click.prevent="switched(page)">{{ page }}</a>
            
            </li>

            <li class="page-item" :class="{ 'disabled' :  meta.current_page === meta.last_page }">

                <a class="page-link" href="#" @click.prevent="switched(meta.current_page + 1)">

                    <span aria-hidden="true">&raquo;</span>

                    <span class="sr-only">Next</span>
                </a>

            </li>
        </ul>
    </nav>
    
</template>


<script>

export default {

    props : ['meta'],

    methods : {

        switched (page) {

            if ( page <= 0 || page > this.meta.last_page ) {

                return 

            }

            this.$emit('pagination:switched', page)

        },

    }
}

</script>