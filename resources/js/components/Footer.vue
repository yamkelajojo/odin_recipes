<template>
  <footer class="flex justify-center shadow-t-md py-4">
    <p>&copy; {{ new Date().getFullYear() }} Your Company Name. All rights reserved.</p>
  </footer>
</template>

<script setup lang="ts">
import { onMounted } from 'vue';

onMounted(()=> {
  console.log("Naaaaaav   " , new Date().getFullYear() );
})
</script>