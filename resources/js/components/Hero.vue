<template>
    <div  id="hero" class="flex flex-col h-screen">
        <Navbar/>
        <div class="flex w-screen h-full bg-gray-400">
            <div class="flex items-center justify-center w-full h-full text-2xl text-red-800 border-2 border-blue-400 rounded bg-stone-400 "> SHO EXE</div>
            <div class="flex items-center justify-center w-full h-full text-red-800 border-2 border-blue-400 rounded bg-stone-400 ">
                <MenuButton redirect="/recipes"/>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import Navbar from '../components/Navbar.vue'
import MenuButton from './MenuButton.vue';
</script>

<style scoped>
#hero{
    /* background: url('/storage/images/or_hero_bg.jpg') lightgray 50% / cover no-repeat; */
    
    background-blend-mode: multiply;
}
</style>