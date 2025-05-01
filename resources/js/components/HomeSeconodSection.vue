<template>
  <div class="relative min-h-screen">
    <div class="absolute top-0 left-0 z-10 w-full min-h-screen">
      <section class="relative flex flex-col items-center justify-center"
        id="section_two_above"
        ref="section_two_above"
        :style="{background: 'linear-gradient(180deg, #C9A723 0%, #332C2C 100%)'}"
        >
        <div class="z-10 flex  flex-wrap items-center gap-20 justify-center max-w-[900px]">
            <div class="flex flex-wrap items-center gap-20 justify-evenly h-fit"
                v-for="(food_type_row, ftr_index) in food_types"
            >
                <div class="h-fit w-fit ft_card_above absolute transition-all duration-[2s] ease-in-out"
                    :id="'food_type_card_above'+food_type.id" 
                    v-for="food_type in food_type_row"
                    ref="food_type_cards_above"
                    ref_for
                    :style="{ top: food_type.initialTop, left: food_type.initialLeft,  transform: 'translate(-50%, -50%)' }"
                >
                 <FoodTypeCard :img="food_type.source" :cardId="food_type.id.toString()" :foodType="food_type.title"  />
                 <div class="text-2xl font-bold">
                 </div>
                </div>
            </div>
          </div>
      </section>
    </div>
    <div class="absolute top-0 left-0 w-full min-h-screen opacity-0">
      <section class="relative flex flex-col items-center justify-center w-full min-h-screen py-20 overflow-x-hidden bg-stone-500" 
              id="section_two_underneath"
              ref="section_two_underneath"
              >
              <div class="z-10  flex flex-wrap items-center gap-20 justify-center max-w-[900px]">
                <div class="flex flex-wrap items-center gap-20 borde justify-evenly h-fit"
                    v-for="(food_type_row, ftr_index) in food_types"

                >
                    
                    <div class="h-fit w-fit ft_card_beneath"
                        :id="'food_type_cards_beneath'+food_type.id" 
                        v-for="food_type in food_type_row"
                        ref="food_type_cards_beneath"
                        ref_for
                    >
                    <FoodTypeCard :img="food_type.source" :cardId="food_type.id.toString()"  />
                    <div class="text-2xl font-bold">
                    </div>
                    </div>
                </div>
            </div>
      </section>
    </div>
  </div>

</template>
  
<script setup lang="ts">
  import { ref, type Ref, onMounted, onUnmounted ,nextTick, watch } from 'vue';
  import FoodTypeCard from '../../js/components/FoodTypeCard.vue'
  import { animate } from 'animejs';
  import { onScroll } from 'animejs';
  
  interface foodTypeCard {
    source: string,
    id: number,
    initialTop: string;
    initialLeft: string;
    title: string
  }

  const props = defineProps({
    scrollInitiatorCounter: {
      type: Number,
      default: 0
    }
  });
  

  const food_types: Ref<Array<Array<foodTypeCard>>> =ref([
  [
    { id: 1,
      source : '/storage/images/or_hero_bg.jpg',
      initialTop:'5%' ,
      initialLeft: '36%',
      title: 'Carbohydrates'
    },
    { id: 2,
      source : '/storage/images/red_wine_beef_curry.jpg',
      initialTop:'5%' ,
      initialLeft: '50%',
      title: 'Meat'
    },
    { id: 3,
      source : '/storage/images/gwinya_ne_polony.jpeg',
      initialTop:'5%' ,
      initialLeft: '64%',
      title: 'Oils and Liquids'
    },
  ],
  [
    { id: 4,
      source : '/storage/images//beef_curry_bunny_chow.jpg',
      initialTop:'90%' ,
      initialLeft: '35%',
      title: 'Spices and Herbs'
    },
    { id: 5,
      source : '/storage/images/mogodu_with_creamy_samp.jpeg',
      initialTop:'90%' ,
      initialLeft: '60%',
      title: 'Vegetables'
    }
  ]
  ]);



const syncAboveCardsToBeneath = async() => {
  await nextTick();

  requestAnimationFrame(() => {
    const food_type_cards_beneath = Array.from(document.getElementsByClassName('ft_card_beneath')) as HTMLElement[];
    const food_type_cards_above = Array.from(document.getElementsByClassName('ft_card_above')) as HTMLElement[];
  
    food_type_cards_beneath.forEach((ft_card, index2) => {
      const left = ft_card.offsetLeft;
      const top = ft_card.offsetTop;
  
      const aboveCard = food_type_cards_above[index2];
      if (aboveCard) {
        aboveCard.style.left = `${left}px`;
        aboveCard.style.top = `${top}px`;
        aboveCard.style.transform = '';

        // animate( aboveCard, {
        //   translateX: left,
        //   translateY: top,
        //   duration: 4000,
        //   ease: 'inQuad'
        // })
      }
    });
  })
}

const handleResize = () => {
  if(props.scrollInitiatorCounter > 1){
    // syncAboveCardsToBeneath();
  }
};

watch(() => props.scrollInitiatorCounter, (newscrollInitiatorCounterValue, oldscrollInitiatorCounterValue) => {
  console.log('Prop changed:', newscrollInitiatorCounterValue);
  if(newscrollInitiatorCounterValue > 1){
    console.log('syncAboveCardsToBeneath() SHOULD INITIATE NOW:', newscrollInitiatorCounterValue);
    syncAboveCardsToBeneath();
  }
})
  
onMounted(async() => {
  // if(props.turn_on_on_scroll){
  //   // syncAboveCardsToBeneath();
  // }
  window.addEventListener('resize', handleResize);
});

onUnmounted(() => {
  window.removeEventListener('resize', handleResize);
});
</script>

<style lang="css" scoped>
#section_two_above{
  background: linear-gradient(180deg, #C9A723 0%, #332C2C 100%);
  font-family: "Josefin Slab", serif;
}
</style>