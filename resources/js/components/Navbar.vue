<template>
    <nav
        class="flex flex-col"
        style="background-color: var(--main-bg)"
        ref="navbar"
    >
        <div class="flex items-center justify-between py-6 px-36">
            <div
                class="flex items-center justify-center w-24 h-24 bg-transparent"
                ref="food_truck"
            >
                <FoodTruck />
            </div>
            <p id="title" ref="title" class="font-semibold">Odin Recipes</p>
            <MenuButton />
        </div>
        <ColoredBars />
    </nav>
</template>

<script setup lang="ts">
import { type Ref, ref, watch, onMounted } from "vue";
import MenuButton from "../components/MenuButton.vue";
import gsap from "gsap";
import FoodTruck from "../components/FoodTruck.vue";
import { animate } from "animejs";
import ColoredBars from "../components/ColoredBars.vue";

const title: Ref<HTMLElement | null> = ref(null);
const food_truck: Ref<HTMLElement | null> = ref(null);
const navbar: Ref<HTMLElement | null> = ref(null);

onMounted(() => {
    // if(food_truck.value){
    //   animate(food_truck.value, {
    //     x:[{
    //       from: '-300%',
    //       ease: 'inOutCubic',
    //       duration: 2000
    //     }]
    //   })
    // }

    // if(food_truck.value){
    //   animate(food_truck.value, {
    //     x:[{
    //       from: '-300%',
    //       ease: 'inOutCubic',
    //       duration: 2000
    //     }]
    //   })
    // }
    if (navbar.value) {
        console.info(navbar.value);
    }
});
</script>

<style lang="css" scoped>
#title {
    /* background: url('../images/OdinRecipes/food_table.jpg') lightgray 50% / cover no-repeat; */
    color: var(--main-orange);
    font-size: 48px;
    font-style: normal;
    line-height: normal;
    letter-spacing: -3.4px;
    white-space: nowrap; /* To prevent text wrapping */
    text-overflow: ellipsis; /* If you want to show ellipsis for overflowing text */
}

#menu_button {
    color: var(--main-red);
    background-color: var(--main-orange);
    letter-spacing: -1.4px;
    white-space: nowrap;
}

/* #menu_button:hover{
    background-color: var(--main-red);
    color: var(--main-orange);
    letter-spacing: -1.4px;
  } */

#menu_button > .burger_icon {
    padding-right: 0.7px;
    padding-left: 0.7px;
}
</style>
