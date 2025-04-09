<template>
    <Hero/>
    <!-- <section id class="flex h-screen">

    </section> -->
    <Footer/>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import Hero from '../components/Hero.vue';
import Footer from'../components/Footer.vue';



</script>

<style scoped>
.images{
  object-fit: contain;
  height: 16rem;
}
</style>