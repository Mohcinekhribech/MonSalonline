<template>
  <div id="service"></div>
  <div class="mt-14">
     <h3 class="font-bold text-md text-center text-lime-800">Our Service</h3>
     <div>
        <h3 class="text-3xl font-bold text-center my-12">Our Barber <span class="text-lime-600">Service</span></h3>
     </div>
     <div class="res mx-4">
        <div class="w-[250px] shadow-lg rounded-md mx-auto">
            <img class="h-[150px] w-full rounded-md" src="../assets/pexels-luis-quintero-1453005.jpg" alt="">
            <h4 class="text-lime-700 text-center text-lg font-medium">Men's Haicut</h4>
            <p class="text-xs text-center p-2 text-gray-600 italic font-medium">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, unde ab non</p>
        </div>
        <div class="w-[250px] shadow-lg rounded-md mx-auto">
            <img class="h-[150px] w-full rounded-md" src="../assets/pexels-mídia-897262.jpg" alt="">
            <h4 class="text-lime-700 text-center text-lg font-medium">Beard Trim</h4>
            <p class="text-xs text-center p-2 text-gray-600 italic font-medium">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, unde ab non</p>
        </div>
        
        <div class="w-[250px] shadow-lg rounded-md mx-auto">
            <img class="h-[150px] w-full rounded-md" src="../assets/pexels-dmitry-zvolskiy-1570807.jpg" alt="">
            <h4 class="text-lime-700 text-center text-lg font-medium">Treatement</h4>
            <p class="text-xs text-center p-2 text-gray-600 italic font-medium">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, unde ab non</p>
        </div>
        <div class="w-[250px] shadow-lg rounded-md mx-auto">
            <img class="h-[150px] w-full rounded-md" src="../assets/pexels-cottonbro-studio-3998397.jpg" alt="">
            <h4 class="text-lime-700 text-center text-lg font-medium">Wash</h4>
            <p class="text-xs text-center p-2 text-gray-600 italic font-medium">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, unde ab non</p>
        </div>
     </div>
  </div>
</template>

<script>
export default {
  name: 'ServiceView',
}

</script>

<style>
  .res{
    display: grid;
    grid-gap: 5px;
    grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
  }
</style>