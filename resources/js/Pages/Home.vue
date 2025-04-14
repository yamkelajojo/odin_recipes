<template>
    <Hero/>
    <section id="second_section" class="flex flex-wrap items-center justify-around h-screen">
      <FoodTypeCard img="/storage/images/red_wine_beef_curry.jpg" />
      <FoodTypeCard img="/storage/images/red_wine_beef_curry.jpg" />
      <FoodTypeCard img="/storage/images/red_wine_beef_curry.jpg" />
      <FoodTypeCard img="/storage/images/red_wine_beef_curry.jpg" />
      <FoodTypeCard img="/storage/images/red_wine_beef_curry.jpg" />
    </section>
    <Footer/>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import gsap from 'gsap';
import Hero from '../components/Hero.vue';
import Footer from'../components/Footer.vue';
import FoodTypeCard from '../components/FoodTypeCard.vue';



</script>

<style scoped>
.images{
  object-fit: contain;
  height: 16rem;
}

#second_section{
  background: linear-gradient(180deg, #C9A723 0%, #332C2C 100%);
}
</style>