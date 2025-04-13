<template>
    <Hero/>
    <section id="second_section" class="flex items-center justify-center h-screen">
      <FoodTypeCard />
    </section>
    <Footer/>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import Hero from '../components/Hero.vue';
import Footer from'../components/Footer.vue';
import FoodTypeCard from '../components/FoodTypeCard.vue';



</script>

<style scoped>
.images{
  object-fit: contain;
  height: 16rem;
}

/* #second_section{
  background: linear-gradient(180deg, #C9A723 0%, #332C2C 100%);
} */
</style>