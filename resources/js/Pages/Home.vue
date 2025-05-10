<template>
    <div class="h-screen">
        <Hero/>
        <!-- <div class="flex items-center justify-center h-screen text-xl font-semibold bg-stone-500">
            Secton 1
        </div> -->
        <div class="h-fit-w-fit" id="secondSectionWrapper" ref="secondSectionWrapper">
            <HomeSeconodSection :scrollInitiatorCounter="scrollInitiatorCounter"/>
        </div>
        <Footer/>
    </div>
</template>

<script setup lang="ts">
import { ref, Ref, computed, onMounted, nextTick } from 'vue';
import Hero from '../components/Hero.vue';
import HomeSeconodSection from '../components/HomeSeconodSection.vue';
import Footer from '../components/Footer.vue';
import { animate, onScroll } from 'animejs';


const turn_on_on_scroll: Ref<boolean> = ref(false);
const secondSectionWrapper : Ref<HTMLElement | null> = ref(null);
    const scrollInitiatorCounter: Ref<number>=ref(0);

const animate_food_type_cards = () => {
    if(turn_on_on_scroll.value && secondSectionWrapper && secondSectionWrapper.value?.children[0]){
        animate(secondSectionWrapper.value.children[0],{
            autoplay: onScroll({
                target: secondSectionWrapper.value.children[0],
                enter: '50% -25%',
                onEnter: () =>{
                    scrollInitiatorCounter.value++;
                    if(scrollInitiatorCounter.value > 1){
                        turn_on_on_scroll.value = true;                        
                        // console.info("Sangena!");
                    }
                },
                // debug: true
            })
        })
    }
}



// const is_scroll_turned_on = computed(() => {
//   if(turn_on_on_scroll.value && secondSectionWrapper && secondSectionWrapper.value?.children[0]){
//     return true;
//   }
//   else {
//     return false;
//   }
// });

onMounted(async() => {
    await nextTick();

    if(secondSectionWrapper && secondSectionWrapper.value?.children[0]){
        turn_on_on_scroll.value = true;
        animate_food_type_cards();
    }
});
</script>

<style lang="" scoped>

</style>