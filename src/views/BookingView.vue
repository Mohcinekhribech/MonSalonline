<template>
<div class="">
  <p>{{ date }}</p>
  <div class="flex justify-center m-4">
    <input class="justify-center p-2" type="date" name="" id="" v-model="date">
    <button @click="min" class="bg-lime-600 text-white p-[4px] rounded-lg my-auto">
       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
       <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
       </svg>
    </button>
  </div>
  <center>
    <div v-if="day" class="grid grid-cols-6 gap-4 mt-5 w-2/3 font-medium ">
      <div @click="reserve('9:00','id')" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white p-4">
        9:00
      </div>
      <div  @click="reserve('9:00','id')" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white p-4">
        10 : 00
      </div>
      <div  @click="reserve('9:00','id')" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white p-4">
        11 : 00
      </div>
      <div  @click="reserve('9:00','id')" v-if="day!=1 && day != 6" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white p-4">
        14:00
      </div>
      <div  @click="reserve('9:00','id')" v-if="day!=1 &&  day != 6" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white p-4">
        15:00
      </div>
      <div  @click="reserve('9:00','id')" v-if="day!=1 " class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white p-4">
        16:00
      </div>
      <div  @click="reserve('9:00','id')" v-if="day!=1" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white p-4">
        17 : 00
      </div>
      <div  @click="reserve('9:00','id')" v-if="day!=1" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white p-4">
        18 : 00
      </div>
      <div  @click="reserve('9:00','id')" v-if="day!=1" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white p-4">
        19 : 00
      </div>
      <div  @click="reserve('9:00','id')" v-if="day==6" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white p-4">
        20 : 00
      </div>
      <div  @click="reserve('9:00','id')" v-if="day==6" class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white p-4">
        21 : 00
      </div>


  </div>
  </center>
  
  <p v-for="i in data" :key="i.clientId">{{ i.client_date }} - {{ i.Nom }}</p>
</div>
<!--:key <=> v-bind:key-->


</template>

<script>
import swal from 'sweetalert';
export default {

name:'Booking',
data(){
  return{
    data:{},
    date:"",
    minn:"",
    day:""
  }
},
methods:{
  min(){
    swal("Hello world!");
    const d = new Date(this.date);
    this.day = d.getDay()+1;
    console.log(this.day);
  }
}
}
</script>

<style>

</style>