<template>
    <div  id="hero" class="flex flex-col h-screen">
        <Navbar title="Sho Kwedini"/>
    </div>
</template>

<script setup lang="ts">
import Navbar from '../components/Navbar.vue'
</script>

<style scoped>
#hero{
    background: url('/storage/images/or_hero_bg.jpg') lightgray 50% / cover no-repeat;
    
    background-blend-mode: multiply;
}
</style>