<template>
    <div class="row align-items-center card-body">

        <div class="image col-3">
            <!-- <img class="img-fluid" :src="'/storage/' + dish.img_path" :alt="dish.name" v-if="dish.img_path">
            <img class="img-fluid" :src="'/images/noimg2.jpg'" :alt="dish.name" v-else> -->


            <img class="img-fluid" :src="'/images/noimg.jpg'" :alt="dish.restaurant_name" v-if="dish.img_path == null">

            <img class="img-fluid" :src="'/images/dish-1.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-1.jpg'">
            <img class="img-fluid" :src="'/images/dish-2.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-2.jpg'">
            <img class="img-fluid" :src="'/images/dish-3.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-3.jpg'">
            <img class="img-fluid" :src="'/images/dish-4.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-4.jpg'">
            <img class="img-fluid" :src="'/images/dish-5.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-5.jpg'">
            <img class="img-fluid" :src="'/images/dish-6.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-6.jpg'">
            <img class="img-fluid" :src="'/images/dish-7.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-7.jpg'">
            <img class="img-fluid" :src="'/images/dish-8.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-8.jpg'">
            <img class="img-fluid" :src="'/images/dish-9.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-9.jpg'">
            <img class="img-fluid" :src="'/images/dish-10.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-10.jpg'">
            <img class="img-fluid" :src="'/images/dish-11.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-11.jpg'">
            <img class="img-fluid" :src="'/images/dish-12.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-12.jpg'">
            <img class="img-fluid" :src="'/images/dish-13.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-13.jpg'">
            <img class="img-fluid" :src="'/images/dish-14.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-14.jpg'">
            <img class="img-fluid" :src="'/images/dish-15.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-15.jpg'">
            <img class="img-fluid" :src="'/images/dish-16.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-16.jpg'">
            <img class="img-fluid" :src="'/images/dish-17.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-17.jpg'">
            <img class="img-fluid" :src="'/images/dish-18.jpg'" :alt="dish.restaurant_name" v-else-if="dish.img_path == 'dish-18.jpg'">

            <img class="img-fluid" :src="'/storage/' + dish.img_path" :alt="dish.name" v-else>




        </div>
        <div class="p-3 col-6">
            <h4>{{ dish.name }}</h4>
            <span><span class="font-weight-bold">Ingredienti: </span>{{dish.ingredients}}</span><br>
            <span class="price">{{dish.price}} &#8364;</span>
        </div>
        <!-- Bottoni -->
        <div class="col-3 buttons d-flex flex-column justify-content-center align-items-center">
            <div class="quantity d-flex align-items-baseline">
                <i class="fas fa-minus-circle" @click="minusOne()"></i>
                {{ quantity }}
                <i class="fas fa-plus-circle" @click="plusOne()"></i>
            </div>
            <button
                type="button"
                name="button"
                class="btn btn-add"
                data-dismiss="modal"
                @click="addCart(dish.id)"
            >
                Aggiungi al carrello
            </button>
            <span
                type="button"
                class="btn btn-default"
                 data-dismiss="modal"
                @click="resetQuantity(dish.id)"
            >
                Annulla
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DishCard',
    props: ['dish'],
    data() {
        return {
            currentCart: {},
            quantity: 1
    };
  },
    methods: {
        // funzione per resettare la quantitá indicata nella card del cibo sempre a 1
        resetQuantity: function() {
            this.quantity = 1;
        },
        // funzione per aumentare la quantitá
        plusOne: function() {
            this.quantity += 1;
        },
        // funzione per diminuire la quantitá
        minusOne: function() {
            if (this.quantity > 1) this.quantity -= 1;
            },
        // funzione per aggiungere un piatto al carrello
        addCart: function(id) {
            
            if (this.quantity > 0) {
                this.currentCart = {
                    name: this.dish.name,
                    price: (this.dish.price * this.quantity).toFixed(2),
                    quantity: this.quantity,
                    user_id: this.dish.user_id,
                    id: this.dish.id,
                    img: this.dish.img_path
                }
            }
            this.$emit('currentCart', this.currentCart);
            this.quantity = 1;
        },
    }
}
</script>