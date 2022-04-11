<template>
    <div class="row pb-5">
        <!-- stampo se il carrello é vuoto -->
    
        <!-- colonna con carrello -->
        <div class="col-md-12 col-lg-4" v-if="cart.length">
            ​<div class="title my-4">
                <h2><i class="fas fa-cart-arrow-down mr-2"></i>Riepilogo carrello</h2>
            </div>
            
            <div class="card card-shadow">
                <div class="card-body">

                    <div class="item-test d-flex justify-content-between mb-2" v-for="(item, i) in cart" :key="i">
                        
                        <!-- stampo quantitá -->
                        <div
                            class="quantity "
                        >
                            <span>                                
                                (x{{ item.quantity }})
                            </span>    
                        </div>

                        <!-- stampo il nome -->
                        <span class="name">
                            {{ dishes.find(x => x.id === item.id).name }}
                        </span>

                        

                        <!-- stampo il totale -->
                        <span class="total">
                            {{
                                (dishes.find(x => x.id === item.id).price *
                                    item.quantity).toFixed(2) 
                            }}
                            &#8364;
                        </span>

                    </div>
                    <!-- totale del carrello -->

                    <div class="d-flex justify-content-between px-2 py-4 border-top">
                        <span><strong>TOTALE</strong></span>
                        <span><strong>{{ total()}} &#8364;</strong></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- colonna con form -->
        <div class="col-md-12 col-lg-8 mt-4" v-if="cart.length">
            <div class="title my-4">
                <h2><i class="fa-solid fa-id-card mr-2"></i>Inserisci i tuoi dati per completare l'ordine</h2>
            </div>
            <div class="card card-shadow">
                <div class="card-body">

                    <!-- FORM -->
                    <form @submit.prevent="testApi" method="POST" class="checkout">

                        <input type="hidden" name="_token" :value="csrf" />

                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"
                                        ><strong>Nome</strong></label
                                    >
                                    <input
                                        required
                                        minlength="2"
                                        maxlength="60"
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        placeholder="Inserisci Nome"
                                        v-model="name"
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"
                                        ><strong>Cognome</strong></label
                                    >
                                    <input
                                        required
                                        minlength="2"
                                        maxlength="60"
                                        type="text"
                                        class="form-control"
                                        name="lastname"
                                        placeholder="Inserisci Cognome"
                                        v-model="lastname"
                                    />
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"
                                        ><strong>Indirizzo email</strong></label
                                    >
                                    <input
                                        required
                                        minlength="5"
                                        maxlength="100"
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        placeholder="Inserisci Email"
                                        v-model="email"
                                    />
                                </div>
                                                                <!-- <button class="btn btn-primary" @click="testApi">Conferma Ordine</button> -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1"
                                        ><strong>Indirizzo di consegna</strong></label
                                    >
                                    <input
                                        required
                                        maxlength="100"
                                        type="text"
                                        class="form-control"
                                        name="address"
                                        placeholder="Inserisci Indirizzo"
                                        v-model="address"
                                    />
                                </div>

                                <!-- <button class="btn btn-warning" @click="testMail"> -->
                                <!-- </button> -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1"
                                        ><strong>Numero di telefono</strong></label
                                    >
                                    <input
                                        required
                                        maxlength="30"
                                        type="text"
                                        class="form-control"
                                        name="phone_number"
                                        placeholder="Inserisci numero di telefono"
                                        v-model="phone_number"
                                    />
                                </div>
                            </div>

                            <!-- <div class="form-group">
                    <label><strong>Codice CVC</strong></label>
                    <input type="text" class="form-control" placeholder="Inserisci codice" v-model="cvc">
                </div> -->

                            <!-- <button class="btn" @click="testApi"><strong>Conferma Ordine</strong></button> -->
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label
                                        ><strong>Numero carta di credito</strong></label
                                    >
                                    <input
                                        required
                                        minlength="19"
                                        maxlength="19"
                                        type="text"
                                        class="form-control"
                                        placeholder="XXXX-XXXX-XXXX-XXXX"
                                        name="card"
                                        v-model="card"
                                        id="card"
                                        @keyup="dashesCard"
                                    />
                                </div>

                                <!-- <button class="btn mail" @click="testMail">
                    <i class="fas fa-envelope"></i>
                    Ricevi Mail di conferma
                </button> -->
                                <div class="form-group">
                                    <label><strong>Codice CVC</strong></label>
                                    <input
                                        required
                                        maxlength="3"
                                        minlength="3"
                                        type="text"
                                        class="form-control"
                                        placeholder="Inserisci codice"
                                        v-model="cvc"
                                    />
                                </div>

                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <!-- <div class="col-8 col-md-6"> -->
                                <button type="submit" class="mt-4 submit btn btn-check">
                                    Conferma Ordine
                                </button>
                            <!-- </div> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- popup di errore carta di credito -->
        <div
            class="modal fade"
            id="alert"
            data-backdrop="static"
            data-keyboard="false"
            tabindex="-1"
            aria-labelledby="staticBackdropLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="staticBackdropLabel">
                            Errore durante il pagamento
                        </h4>
                    </div>
                    <div class="modal-body modal-text">
                        I dati della carta di credito non sono corretti.
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-danger"
                            data-dismiss="modal"
                        >
                            Chiudi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        dishes: Array,
        user_id: String
    },
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            cart: [],
            card: "",
            email: "",
            name: "",
            lastname: "",
            phone_number: "",
            address: "",
            errors: [],
            cvc: ""
        };
    },
    mounted() {
        if (localStorage.cart && localStorage.user_id == this.user_id) {
            this.cart = JSON.parse(localStorage.getItem("cart"));
        }
        if(this.cart.length == 0){
            window.location.href = "http://localhost:8000/restaurants/" + localStorage.getItem('slug');
        }
        
    },
    methods: {
        updateLocalStorage: function() {
            if (this.cart.length > 0) {
                localStorage.setItem("cart", JSON.stringify(this.cart));
            } else {
                localStorage.removeItem("cart");
            }
            localStorage.setItem("user_id", this.user_id);
            // localStorage.setItem("user_name", this.user_name);
        },
        removeCart: function(i) {
            this.cart.splice(i, 1);
            this.updateLocalStorage();
        },
        plusOne: function(i) {
            this.cart[i].quantity += 1;
            this.updateLocalStorage();
        },
        minusOne: function(i) {
            if (this.cart[i].quantity > 1) {
                this.cart[i].quantity -= 1;
                this.updateLocalStorage();
            } else {
                this.removeCart(i);
            }
        },
        total: function() {
            let total = 0;
            for (var i = 0; i < this.cart.length; i++) {
                let foodPrice = this.dishes.find(x => x.id === this.cart[i].id)
                    .price;
                total += foodPrice * this.cart[i].quantity;
            }
            return total.toFixed(2);
        },
        dashesCard: function() {
            var x = document.getElementById("card");
            var index = x.value.lastIndexOf("-");
            var test = x.value.substr(index + 1);
            if (test.length === 4 && x.value.length < 16) {
                x.value = x.value + "-";
            }
        },
        testApi: function() {

            var method = "rejected";
            if (this.card === "1234-1234-1234-1234" && this.cvc === "123") {
                method = "fake-valid-visa-nonce";
            } else if (
                this.card === "1111-2222-3333-4444" &&
                this.cvc === "555"
            ) {
                method = "fake-valid-visa-nonce";
            } else if (
                this.card === "9876-9876-9876-9876" &&
                this.cvc === "987"
            ) {
                method = "fake-valid-mastercard-nonce";
            } else if (
                this.card === "9999-8888-7777-6666" &&
                this.cvc === "000"
            ) {
                method = "fake-valid-mastercard-nonce";
            }
            const headers = {
                Authorization:
                    "Basic cG54M3BmcndwcnZjbmh4ZDpjZDJkOGZmYzU3ZjQyNmQ2N2ZjM2FmMjgyYTE4M2RkNQ==",
                "Braintree-Version": "2021-03-08"
            };
            const data = {
                query:
                    "mutation chargePaymentMethod($input: ChargePaymentMethodInput!) {chargePaymentMethod(input: $input) {transaction {id status}}}",
                variables: {
                    input: {
                        paymentMethodId: method,
                        transaction: { amount: this.total() }
                    }
                }
            };

            // chiamata axios a braintree
            axios
                .post(
                    "https://payments.sandbox.braintree-api.com/graphql",
                    data,
                    { headers }
                )
                .then(r => {
                    console.log("pagamento effettuato");

                    console.log("data", r.data);
                    if (r.data.hasOwnProperty("errors")) {
                        $("#alert").modal("show");
                        console.log("carta non valida!");
                        $("#alert").modal("show");
                    } else {
                        // 1) salviamo l'ordine nel db
                        
                        
                        const order = {
                            name: this.name,
                            lastname: this.lastname,
                            phone_number: this.phone_number,
                            address: this.address,
                            cart: this.cart,
                            email: this.email,
                            total: this.total(),
                            user: this.user_id
                        }

                        // console.log("prova");
                        console.log(localStorage);

                        // axios.post('/api/search', {categories: this.categoriesFilter}).then((response)=>{
                        //     if (response.data.success) {
                        //         this.filteredRestaurants = response.data.result        
                        //     } else {
                        //         // this.$router.push({name: 'page-not-found'})
                        //     }
                        // })

                        axios.post('/api/orders',  order)
                            .then(r => {
                                // 2) mandiamo la mail di ricevuto ordine
                            })
                            .catch(e => console.log("error", e));
                        // 3) svuotiamo il carrello
                        localStorage.removeItem("cart");
                        // console.log(localStorage);
                        // 4) cambiamo pagina in una che dice "pagamento effettuato"
                        window.location.href = "http://localhost:8000/payed";
                    }
                })
                .catch(e => console.log("error", e));
        }
    }
};
</script>