<template>
  <div class="">
    <p>{{ date }}</p>
    <div class="flex justify-center m-4 ">
      <input @change="min" class="justify-center p-2 w-40 border border-2 border-lime-300" type="date" name="" id="" v-model="date">
    </div>
    <center>
      <div v-if="day" class="grid grid-cols-6 gap-4 mt-5 w-2/3 font-medium ">
        <div v-for=" (i, j) in hours" :key="j" class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
          <div :id="date + i" :class="checkistrue(date, i)" v-if="day == 1 && j <= 2" @click="notif(i, clientId, date)"
            class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg  p-4">
            {{ i }}
          </div>
          <div :id="date + i" :class="checkistrue(date, i)" v-else-if="day == 6 && j != 4 && j != 3"
            @click="notif(i, clientId, date)"
            class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg  p-4">
            {{ i }}
          </div>
          <div :id="date + i" :class="checkistrue(date, i)" v-else-if="day != 1 && day != 6 && j <= 7"
            @click="notif(i, clientId, date)"
            class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg  p-4">
            {{ i }}
          </div>
        </div>

      </div>
    </center>
  </div>
  <!--:key <=> v-bind:key-->


</template>

<script>
import swal from 'sweetalert';
import axios from 'axios';
export default {

  name: 'Booking',
  data() {
    return {
      data: {},
      date: "",
      hours: ["9 : 00", "10 : 00", "11 : 00", "14 : 00",
       "15 : 00", "16 : 00", "17 : 00", "18 : 00",
        "19 : 00", "20 : 00", "21 : 00"],
      day: "",
      clientId: localStorage.getItem('clientId'),
      test:false
    }
  },
  methods: {
    min() {
      const d = new Date(this.date);
      this.day = d.getDay() + 1;
    },
    async notif(hour, id, date) {
      await this.checkistrue(date, hour)
      if(this.test){
        swal('This time is reserved !');
      } else {
      swal({
        title: "Are you sure?",
        text: "You want to Booking in " + this.date + " / " + hour + " !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
        .then((willTrue) => {
          if (willTrue) {
            swal("Your Booking has been Confirmed!", {
              icon: "success",
            });
            this.verify(hour, id, date);
          } else {
            swal("booking canceled!");
          }
        });
      }
      
    }
    ,
    async verify(hour, id, date) {
      await axios.post('http://localhost/MonSalonline/api/Public/RDV/create', {
        "clientId": id,
        "client_date": this.date,
        "hour": hour
      })
        .then((res) => {
          console.log(res)
          this.checkistrue(date, hour)
        })
    },
    async checkistrue(date, hour) {
       await axios.get('http://localhost/MonSalonline/api/Public/RDV/read/' + date + '/' + hour)
        .then(res => res.data.clientId)
        .then(res => {
          console.log(res +" "+this.clientId)
          if (this.clientId === res && res) {
            document.getElementById(date + hour).classList.add("bg-lime-300","text-white");
            this.test = true;
          } else if (this.clientId !== res && res ) {
            document.getElementById(date + hour).classList.add("bg-red-200","text-white");
            this.test = true;
          } else if(res == undefined){
            document.getElementById(date + hour).classList.add("bg-white"); 
            this.test = false;
          }
        })
    }
  }
}
</script>

<style>

</style>