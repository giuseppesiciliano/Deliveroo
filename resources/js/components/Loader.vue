<template>
  <div>

    <div v-if="restaurantsFound">
      <div class="loader text-align-center">
        <div class="looping-rhombuses-spinner">
            <div class="rhombus"></div>
            <div class="rhombus"></div>
            <div class="rhombus"></div>
          </div>
          <h2 class="mt-4">Caricamento Ristoranti...</h2>
      </div>
    </div>

    <div v-else> 
      <div class="loader text-align-center">
        <h2 class="mt-4">Non ci sono ristoranti</h2>
      </div>
    </div>

  </div>
</template>

<script>

export default {
    name: "Loader",
    props: ["restaurantsFound", 'searchRestaurant']
}
</script>

<style lang="scss" scoped>
.looping-rhombuses-spinner, .looping-rhombuses-spinner * {
      box-sizing: border-box;
    }

    .looping-rhombuses-spinner {
      width: calc(25px * 4);
      height: 25px;
      position: relative;
    }

    .looping-rhombuses-spinner .rhombus {
      height: 25px;
      width: 25px;
      background-color: #00ccbc;
      left: calc(25px * 4);
      position: absolute;
      margin: 0 auto;
      border-radius: 2px;
      transform: translateY(0) rotate(45deg) scale(0);
      animation: looping-rhombuses-spinner-animation 2500ms linear infinite;
    }

    .looping-rhombuses-spinner .rhombus:nth-child(1) {
      animation-delay: calc(2500ms * 1 / -1.5);
    }

    .looping-rhombuses-spinner .rhombus:nth-child(2) {
      animation-delay: calc(2500ms * 2 / -1.5);
    }

    .looping-rhombuses-spinner .rhombus:nth-child(3) {
      animation-delay: calc(2500ms * 3 / -1.5);
    }

    @keyframes looping-rhombuses-spinner-animation {
      0% {
        transform: translateX(0) rotate(45deg) scale(0);
      }
      50% {
        transform: translateX(-233%) rotate(45deg) scale(1);
      }
      100% {
        transform: translateX(-466%) rotate(45deg) scale(0);
      }
    }
</style>