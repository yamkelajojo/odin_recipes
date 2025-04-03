<template>
    <nav class="flex justify-between">
        <p id="title" class="font-semibold leading-normal tracking-tight text-center truncate">
            Odin Recipes
        </p>
    </nav>     
</template>

<script setup lang="ts">

</script>

<style lang="scss" scoped>
#title {
    font-size: 50px;
    font-style: normal;
    line-height: normal;
    letter-spacing: -2.5px;
    white-space: nowrap; /* To prevent text wrapping */
    text-overflow: ellipsis; /* If you want to show ellipsis for overflowing text */
}
</style>