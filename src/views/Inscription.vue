<template>
  <section class="h-screen">
  <div class="container px-6 py-12 h-full">
    <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
      <div class="w-2/3 mx-12">
        <form>
          <!-- Email input -->
          <div class="mb-6">
            <input v-model="client.email"
              type="text"
              class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-lime-400 focus:outline-none"
              placeholder="first Name"
            />
          </div>
          <div class="mb-6">
            <input v-model="client.Nom"
              type="email"
              class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-lime-400 focus:outline-none"
              placeholder="first Name"
            />
          </div>

          <!-- Password input -->
          <div class="mb-6">
            <input v-model="client.Prenom"
              type="text"
              class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-lime-400 focus:outline-none"
              placeholder="last Name"
            />
          </div>
          <div class="mb-6">
            <input v-model="client.Num_tel"
              type="number"
              class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-lime-400 focus:outline-none"
              placeholder="Phone Number"
            />
          </div>
          <p>{{ client.Num_tel }}</p>
          <!-- Submit button -->
          <button
            @click.prevent="login"
            class="inline-block px-7 py-3 bg-lime-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-lime-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
            data-mdb-ripple="true"
            data-mdb-ripple-color="light"
          >
          save
          </button>
        </form>
      </div>
    </div>
  </div>
</section>
<p>{{ message }}</p>
</template>

<script>
import axios from 'axios';
export default {
    name:'Inscription',
    data(){
      return{
        client : [{
        email:"",
        Nom:"",
        Prenom:"",
        Num_tel:0
      }
    ],
    message:""
      }
      
    },
    methods:{
    login(){
      axios.post('http://localhost/MonSalonline/api/Public/client/create',{
        "email":this.client.email,
        "Nom":this.client.Nom,
        "Prenom":this.client.Prenom,
        "Num_tel":this.client.Num_tel
      })
  .then(() => {
    this.$router.push('/login')
     })
    }
}
}
</script>

<style>

</style>