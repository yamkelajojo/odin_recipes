<template>
  <div class="flex flex-col h-screen bg-gray-300">
  <Navbar/>
  <!-- <p class="my-2 text-4xl text-gray-800">Recipes</p> -->
    <div class="py-16 mx-auto grow lg:container">
      <transition name="spinner_switch" mode="out-in" >
        <p v-if="showSpinner" class="text-3xl font-bol">Loading...</p>
        <p v-else class="text-3xl font-bold text-gray-800">
          RECPSa
        </p>
      </transition>
    </div>
    <Footer/>
  </div>
</template>
  
  <script setup lang="ts">
  import { ref, onMounted, Ref, provide, inject} from 'vue';
  import axios from 'axios';
  import Navbar from '../components/Navbar.vue';
  import Footer from'../components/Footer.vue';

  
  interface Recipe{
    id: number,
    title: string,
    description: string,
    images: Array<Image>,
    ingredients: Array<Ingredient>,
    prepararationStages: Array<PreparationStage>,
  }

  interface Image{
    id:number,
    src: string,
    recipes_id: number
  }

  interface Ingredient {
    id: number,
    ingredients_id: number,
    quantity: number,
    recipes_id: number
  }

  interface PreparationStage{
    id: number,
    description: string,
    recipes_id: number,
    stage: number,
  }

  const showSpinner: Ref<boolean> = ref(true);
  const title: Ref<string> = ref('');
  const description: Ref<string> = ref('');
  const images: Ref<Array<Image>> = ref([]);
  const ingredients: Ref<Array<Ingredient>> = ref([]);

    

  const init = async() => {
    showSpinner.value = true;
    try {
      let response = await axios.post('/recipes/fetch');
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
  </style>