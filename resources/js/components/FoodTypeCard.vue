<template>
    <div 
        class="relative flex flex-col overflow-hidden rounded-xl food_card_type" :id="'food_card_type' + cardId"
        @mouseenter="enteringCard"
        @mouseleave="leavingCard"
    >
        <div class="h-48 rounded-t-xl" id="card_image" :style="'background-image: url(' + img + ')'"></div>
        <div id="card_description" class="p-2">
            <p id="food_type" class="font-bold text-md">{{ foodType }}</p>
            <p id="food_type_description" class="text-xs font-bold">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptates reprehenderit eum ipsam quo iste, cupiditate consequatur.</p>
        </div>
    </div>
</template>

<script lang="ts" setup>
import gsap from 'gsap';
import { animate, createTimeline, waapi } from 'animejs';
import { ref, Ref } from 'vue';

const props = defineProps({
    img: {
        type: String,
        default: ''
    },
    cardId: {
        type: String,
        default: ''
    },
    foodType: {
        type: String,
        default: 'Content'
    },
    foodTypeDescription: {
        type: String,
        default: 'Vegetables'
    },
});

const hoverAnimation = ref<any>(null);

const enteringCard = (e: MouseEvent) => {  
    const target = e.currentTarget as HTMLElement;

    hoverAnimation.value = animate(target, {
        boxShadow: ['0px 7px 29px rgba(253, 187, 63, 0.25)', '0px 14px 58px rgba(253, 187, 63, 0.5)'],
        scale: [1, 1.050],
        duration: 60,
        easing: 'in'
    });
 
    if(hoverAnimation){
        //@ts-ignore
        // hoverAnimation.play();
    }
};

const leavingCard = (e: MouseEvent) => {
    if (hoverAnimation.value) {
        hoverAnimation.value.reverse();
    }
};
</script>

<style scoped>
.food_card_type {
    max-width: 224px;
    max-height: 288px;
    width: 224px;
    height: 288px;
    min-width: 224px;
    min-height: 288px;
    background-color: var(--main-bg);
    box-shadow: 0px 7px 29px rgba(253, 187, 63, 0.25);
    border: solid 1px #FDBB3F;
    font-family: "Josefin Slab", serif;
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