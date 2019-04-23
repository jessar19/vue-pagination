<template>
  <nav>
    <ul class="pagination flex-wrap">
      <li class="page-item" :class="{ 'disabled' :  meta.current_page === 1 }">
        <a class="page-link" href="#" @click.prevent="switched(meta.current_page - 1)">
          <span aria-hidden="true">&laquo;</span>

          <span class="sr-only">Previous</span>
        </a>
      </li class="page-item">
      <!-- show [link] for return to page number 1 -->
      <template v-if="section > 1">
          <li class="page-item">
              <a class="page-link" href="#" @click.prevent="switched(page)" >1</a>
          </li>
      </template>
      <li
        class="page-item"
        v-for="page in pages"
        :class="{ 'active' : meta.current_page === page}"
      >
        <a class="page-link" href="#" @click.prevent="switched(page)">{{ page }}</a>
      </li>
      <!-- show [link] for return to page number 1 -->
      <template v-if="section < sections">
          <li class="page-item">
              <a class="page-link" href="#" @click.prevent="switched(meta.last_page)">{{ meta.last_page }}</a>
          </li>
      </template>


      <li class="page-item" :class="{ 'disabled' :  meta.current_page === meta.last_page }">
        <a class="page-link" href="#" @click.prevent="switched(meta.current_page + 1)">
          <span aria-hidden="true">&raquo;</span>

          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
      <p>sections: {{ sections }}</p>
      <p>section: {{ section }}</p>
  </nav>
</template>


<script>
  export default {
    props: ["meta"],
    data () {
      return  {
        numbersPerSection: 7,
      }
    },
    computed : {
        section () {
            return Math.ceil(this.meta.current_page / this.numbersPerSection)
        },
        sections () {
            return Math.ceil(this.meta.last_page / this.numbersPerSection)
        },
        lastPage () {
            let lastPage = ((this.section - 1) * this.numbersPerSection ) + this.numbersPerSection
            if (this.section === this.sections) { 
                lastPage = this.meta.last_page
            }
            return lastPage

        },
        pages () {
            return _.range(
                (this.section - 1) * this.numbersPerSection + 1 , 
                this.lastPage + 1
            )
        }

    },

    methods: {
        switched(page) {
            if (page <= 0 || page > this.meta.last_page) {
                return;
            }
            this.$emit("pagination:switched", page);
        }
    }
};
</script>