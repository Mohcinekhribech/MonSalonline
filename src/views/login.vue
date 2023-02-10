<template>
   <section class="h-screen">
  <div class="container px-6 py-12 h-full">
    <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
      <div class="w-2/3 mx-12">
        <form>
          <!-- Email input -->
          <div class="mb-6">
            <input v-model="Referance"
              type="password"
              class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-lime-400 focus:outline-none"
              placeholder="Your Referance"
            />
          </div>
          <p>{{ Referance }}</p>
          <!-- Submit button -->
          <button
            @click.prevent="verify"
            class="inline-block px-7 py-3 bg-lime-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-lime-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out w-full"
            data-mdb-ripple="true"
            data-mdb-ripple-color="light"
          >
          save
          </button>
        </form>
        <center>
  <router-link to="/inscription">if You don't have an accaont</router-link>
</center>
      </div>
    </div>
  </div>
</section>

</template>

<script>
import axios from 'axios';
export default {
name:'Login',
data(){
    return{
        Referance : ""
    }
},methods:{
    async verify(){
        await axios.post('http://localhost/MonSalonline/api/Public/client/verify',
        {
            "Referance":this.Referance
        }
        ).then(res => res.data)
        .then(res => {
          if(res.message === 'Client Found'){
            localStorage.setItem("clientId", res.clientId)
            this.$router.push('/booking')
          }else this.$router.push('/inscription')
            
    })
        
    }
}
}
</script>

<style>

</style>