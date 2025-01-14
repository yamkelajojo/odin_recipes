<template>
    <nav class="flex min-h-24 shadow items-center">
        <div class="lg:container lg:mx-auto text-2xl font-extrabold">
            {{title}}
        </div>
    </nav>        
</template>

<script setup lang="ts">
import { ref } from 'vue';
const props = defineProps<{
  title?: string
}>()
</script>