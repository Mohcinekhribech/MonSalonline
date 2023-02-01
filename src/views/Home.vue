<template>
    <nav class="flex justify-between fixed top-0 bg-amber-50 w-full p-[30px]">
      <svg @click="Showmenu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="menu w-6 h-6 md:hidden cursor-pointer">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
</svg>

        <p class="font-bold text-lg max-md:text-sm">Mon<span class="text-lime-600">Salonline</span></p>
        <ul id="ul" class="flex max-md:bg-amber-50 max-md:top-0 md:space-x-10 font-medium max-md:flex-col max-md:w-full max-md:left-0 max-md:p-4 max-md:absolute max-md:w-full">
          <svg @click="Hidemenu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 flec md:hidden cursor-pointer">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
</svg>

                 <a class="hover:text-lime- max-md:w-full text-center  max-md:my-2">Home</a>
                 <a class="hover:text-lime-600 max-md:w-full text-center max-md:my-2">Service</a>
                 <a class="hover:text-lime-600 max-md:w-full text-center max-md:my-2">About</a>
                 <a class="hover:text-lime-600 max-md:w-full text-center max-md:my-2">Contact</a>
        </ul>
        <p class="px-4 py-2 bg-lime-600 text-sm font-bold rounded-lg text-white max-md:text-xs">Get Started</p>
    </nav>
  <HomeView />
  <ServiceView />
  <AboutView />
  <GallerieView />
</template>
<script>
  import HomeView from '@/components/HomeView.vue'
  import ServiceView from '@/components/ServiceView.vue'
  import AboutView from '@/components/AboutView.vue'
  import GallerieView from '@/components/GallerieView.vue'

  export default {
  name: 'Home',
  components: {
    HomeView,
    ServiceView,
    AboutView,
    GallerieView
  },
  methods:{
    Showmenu(){
    document.getElementById("ul").style.top='0';
},
    Hidemenu(){
    document.getElementById("ul").style.top='-1000%';
    }
  }
}
</script>

<style>
  @media (max-width: 768px) {
  #ul{
    top:-1000%;
    transition: all 0.6s;
  }
}

</style>
