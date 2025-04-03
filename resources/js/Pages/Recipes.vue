<template>
    <div class="flex flex-col h-screen bg-gray-300">
    <Header/>
    <p class="my-2 text-2xl text-gray-800">Recipes</p>
      <div class="py-16 mx-auto grow lg:container">
        <transition name="spinner_switch">
          
        </transition>
        <p v-if="showSpinner">Loading...</p>
        <p v-else class="my-8 text-xs font-bold text-gray-800">
          <!-- {{Recipes Loaded}} -->
        </p>
      </div>
      <Footer/>
    </div>
  </template>
  
  <script setup lang="ts">
  import { ref, onMounted, Ref} from 'vue';
  import axios from 'axios';
  import Header from '../components/Header.vue';
  import Footer from'../components/Footer.vue';

  const showSpinner: Ref<boolean> = ref(false);

  const init = async() => {
    showSpinner.value = true;
    try {
      let response = axios.post('/recipes/fetch');
      console.log("response", response)
    } catch (error) {
      console.log(error);
    }
    showSpinner.value = false;
  }

  onMounted(async()=>{
    await init();
  })
  </script>
  
  <style scoped>
  .images{
    object-fit: contain;
    height: 16rem;
  }
  
  .navMenu-slide-in-enter-active,
  .navMenu-slide-in-leave-active {
    transition: all 0.5s ease;
  }

  .navMenu-slide-in-enter-from,
  .navMenu-slide-in-leave-to {
    opacity: 0;
    transform: translateX(-500px);
  }






  
  </style>