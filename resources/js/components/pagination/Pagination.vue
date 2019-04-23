<template>
  <nav>
    <ul class="pagination flex-wrap">
      <li class="page-item" :class="{ 'disabled' :  meta.current_page === 1 }">
        <a class="page-link" href="#" @click.prevent="switched(meta.current_page - 1)">
          <span aria-hidden="true">&laquo;</span>

          <span class="sr-only">Previous</span>
        </a>
      </li>

      <li
        class="page-item"
        v-for="page in pages"
        :class="{ 'active' : meta.current_page === page}"
      >
        <a class="page-link" href="#" @click.prevent="switched(page)">{{ page }}</a>
      </li>

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
        pages () {
            return _.range(1, 101)
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