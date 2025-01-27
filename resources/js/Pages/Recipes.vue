<template>
    <div class="flex flex-col h-screen bg-gray-300">
    <Header/>
    <p class="my-2 text-2xl text-gray-800">Recipes</p>
      <div class="py-16 mx-auto grow lg:container">
      </div>
      <p class="my-8 text-xs font-bold text-gray-800">
        {{ recipes }}
      </p>
      <Footer/>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import Header from '../components/Header.vue';
  import Footer from'../components/Footer.vue';
  
  const props = defineProps({
    recipes: JSON
  }) 

  onMounted(()=>{
    console.log("sangena");
  })
  </script>
  
  <style scoped>
  .images{
    object-fit: contain;
    height: 16rem;
  }
  </style>