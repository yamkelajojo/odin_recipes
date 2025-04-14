<template>
    <div class="relative flex flex-col overflow-hidden rounded-xl" id="food_card_type">
        <div class="h-48 rounded-t-xl" id="card_image" :style="'background-image: url(' + img + ')'"></div>
        <div id="card_description" class="p-2">
            <p id="food_type" class="font-bold text-md">{{ foodType }}</p>
            <p id="food_type_description" class="text-xs font-bold">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates reprehenderit eum ipsam quo iste, cupiditate consequatur.</p>
        </div>
    </div>
</template>

<script lang="ts" setup>
    const props = defineProps({
        img: {
            type: String,
            default: ''
        },
        foodType: {
            type: String,
            default: 'Vegetables'
        },
        foodTypeDescription: {
            type: String,
            default: 'Vegetables'
        }
    })
</script>

<style scoped>
#food_card_type {
    max-width: 224px;
    max-height: 288px;
    width: 224px;
    height: 288px;
    min-width: 224px;
    min-height: 288px;
    background-color: var(--main-bg);
    box-shadow: 0px 7px 29px rgba(253, 187, 63, 0.25);
    border: solid 1px #FDBB3F
}

#card_image {
    height: 160px;
    border: none;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

/* #card_description{

} */

#food_type {
    font-size: 28px;
}

#food_type_description {
    color: var(--main-gray);
    height: 80px;
    /* font-size: 12px; */
}
</style>
