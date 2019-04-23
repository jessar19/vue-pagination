<template>
  <div class="media">
    <div class="media-left m-bottom">
      <a href="#">
        <img src="https://via.placeholder.com/60x60" :alt="user.name">
      </a>
    </div>

    <div class="media-body m-left">
      <h5 class="media-heading">{{ user. name }}</h5>
      
      {{ user.email}}

    </div>
  </div>
</template>



<script>
export default {
  props: ["user"]
};
</script>


<style lang="scss">
.m-bottom {
  margin-bottom: 13px;
}

.m-left {
  margin-left: 10px;
}
</style>