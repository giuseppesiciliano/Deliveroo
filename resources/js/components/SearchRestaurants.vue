<template>
    
    <div class="">


        <!-- Jumbotron  -->
        <div class="jumbotron-del">
            <div class="container">
                <div class="row justify-content-between">
                    
                    <div class="col-6 d-flex flex-column justify-content-center">

                        <span class="title-jumbo ml-sm-2">
                            I piatti che ami, a domicilio.
                        </span>

                        <div class="searchbar navbar navbar-light bg-light card-shadow d-flex justify-content-center">
                            
                            <input 
                                type="search"
                                v-model="searchRestaurant"
                                placeholder="Ricerca ristorante"
                                class="form-control mr-sm-2 "  aria-label="Search"
                            >
                            <label for=""></label>
                            <button @click="search" class="btn btn-1 my-2 my-sm-0 mt-sm-2 mt-xl-0">Cerca</button>
                            
                        </div>

                    </div>
                    
                    <div class="col-6 text-center pt-3">
                        <img src="/images/jumbotron.svg" alt="jumbo-img">
                    </div>
                </div>
            </div>
        </div>


        <div class=" mx-sm-5">
            <div class=" page ">
                <h2 class="mt-5 text-center font-weight-bold">Scegli la categoria</h2>
                <div class=" d-flex justify-content-center flex-wrap mt-sm-4 mb-sm-4">

                    <!-- stampo le tipologie per permettere all'utente di fare le ricerche -->
                    
                    <label class="check m-sm-3" v-for="category, index in categories" :key='index'>
                      <input  type="checkbox"
                            :value="category.name"
                            v-model="categoriesFilter"
                            @change="searchRestaurants()"
                      >
                      <span>{{ category.name }}</span>
                    </label>
                </div>

                <!-- stampo ristoranti random se nessuna caegoria è selezionata-->
                <div 
                    class="d-flex justify-content-center mt-md-5 flex-wrap" 
                    v-if="categoriesFilter.length == 0 "
                >
                
                    <div
                    v-for="(randRestaurant, i) in randRestaurants"
                    :key="i"
                    class="user"
                    >
                        <a :href="'/restaurants/' + randRestaurant.slug">
                            <div class="image">
                                <img class="img-fluid" :src="'/images/noimg.jpg'" :alt="randRestaurants.restaurant_name" v-if="randRestaurant.img_path == null">

                                <img class="img-fluid" :src="'/images/restaurant-1.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-1.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-2.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-2.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-3.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-3.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-4.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-4.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-5.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-5.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-6.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-6.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-7.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-7.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-8.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-8.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-9.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-9.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-10.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-10.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-11.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-11.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-12.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-12.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-13.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-13.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-14.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-14.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-15.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-15.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-16.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-16.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-17.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-17.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-18.jpg'" :alt="randRestaurant.restaurant_name" v-else-if="randRestaurant.img_path == 'restaurant-18.jpg'">

                                <img class="img-fluid" :src="'/storage/' + randRestaurant.img_path" :alt="randRestaurant.restaurant_name" v-else>
                            </div>
                            <div class="p-3 rest-info">
                                <h4>{{ randRestaurant.restaurant_name }}</h4>
                                <div class="mb-1">
                                    <span class="font-weight-bold">Indirizzo: </span>{{randRestaurant.address}} 
                                </div>
                                <div class="mb-2">
                                    <span class="font-weight-bold">Telefono: </span> {{randRestaurant.phone_number}}
                                </div>
                                <span v-for="category,index in randRestaurant.categories" :key='index'>
                                    <span class="font-weight-bold">● </span>
                                    <span class="font-weight-bold mr-2">{{category.name}}</span>
                                </span>
                            </div>
                        </a>

                    </div>
                </div>

                <!-- stampo i ristoranti appartenenti alla categoria selezionata dall'utente -->
                 <div 
                    class="d-flex justify-content-center mt-md-5 flex-wrap"
                    v-else
                >

                    <Loader v-show="filteredRestaurants.length == 0" :restaurantsFound="restaurantsFound" />

                    <div
                        v-for="(restaurant, i) in filteredRestaurants"
                        :key="i"
                        class="user"
                    >

                        <a :href="'/restaurants/' + restaurant.slug">
                            <div class="image">

                                <img class="img-fluid" :src="'/images/noimg.jpg'" :alt="restaurant.restaurant_name" v-if="restaurant.img_path == null">

                                <img class="img-fluid" :src="'/images/restaurant-1.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-1.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-2.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-2.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-3.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-3.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-4.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-4.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-5.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-5.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-6.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-6.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-7.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-7.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-8.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-8.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-9.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-9.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-10.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-10.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-11.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-11.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-12.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-12.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-13.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-13.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-14.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-14.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-15.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-15.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-16.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-16.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-17.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-17.jpg'">
                                <img class="img-fluid" :src="'/images/restaurant-18.jpg'" :alt="restaurant.restaurant_name" v-else-if="restaurant.img_path == 'restaurant-18.jpg'">

                                <img class="img-fluid" :src="'/storage/' + randRestaurant.img_path" :alt="randRestaurant.restaurant_name" v-else>

                            </div>
                            <div class="p-3 rest-info">
                                <h4>{{ restaurant.restaurant_name }}</h4>
                                <div class="mb-1">
                                    <span class="font-weight-bold">Indirizzo: </span>{{restaurant.address}} 
                                </div>
                                <div class="mb-2">
                                    <span class="font-weight-bold">Telefono: </span> {{restaurant.phone_number}}
                                </div>
                                <span v-for="category,index in restaurant.categories" :key='index'>
                                    <span class="font-weight-bold">● </span>
                                    <span class="font-weight-bold mr-2">{{category.name}}</span>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Loader from './Loader.vue'

export default {
    components: {
        Loader
    },
    props: {
        categories: Array,
        randRestaurants: Array,
    }, 
    data: function() {
        return {
            // Categorie selezionate dall'utente
            categoriesFilter: [],
            // Ristoranti filtrati in base alle categorie selezionate
            filteredRestaurants: [],
            // Ristoranti filtrati non trovati
            restaurantsFound: true,
            // query per cercare il ristorante
            searchRestaurant: ""
        }
    },
    methods: {

        // Ricerca con la searchbar
        async search() {
            await axios
            .get(`http://127.0.0.1:8000/api/find/restaurants/` + this.searchRestaurant)
            .then((r) => {
                console.log(`http://127.0.0.1:8000/api/find/restaurants/` + this.searchRestaurant)
                if (r.data.success) {
                    this.filteredRestaurants = r.data.result
                } else {
                    this.restaurantsFound = false;
                }
            })
            .catch((e) => console.error(e));
        },

        // Filtra i ristoranti in base alle categorie selezionate            
        searchRestaurants: function() {
            this.restaurantsFound = true 
            axios.post('/api/search', {categories: this.categoriesFilter}).then((response)=>{
                if (response.data.success) {
                    this.restaurantsFound = true    
                    this.filteredRestaurants = response.data.result
                } else {
                    this.filteredRestaurants = response.data.result
                    this.restaurantsFound = false 
                }
            })
        }
    },
    mounted() {
        this.searchRestaurants();
    },
}
</script>