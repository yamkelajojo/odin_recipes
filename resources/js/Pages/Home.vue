<template>
  <div class="flex flex-col h-screen">
  <Header/>
    <div class="py-16 mx-auto grow lg:container">
        <!-- <div>
          <img class='images' src="/storage/images/beef_curry_bunny_chow_2.png">
        </div> -->
    </div>
    <Footer/>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import Header from '../components/Header.vue';
import Footer from'../components/Footer.vue';



</script>

<style scoped>
.images{
  object-fit: contain;
  height: 16rem;
}
</style>