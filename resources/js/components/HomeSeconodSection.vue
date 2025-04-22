<template>
<section class="relative flex flex-col items-center justify-center w-screen h-screen bg-stone-400"
    id="section_two_above"
    ref="section_two_above"
    >
    <div class="z-10 flex flex-col items-center justify-center w-screen h-screen">
        <div class="flex flex-wrap items-center gap-8 border border-blue-800 justify-evenly h-fit"
            v-for="(food_type_row, ftr_index) in food_types"
        >
            
            <div class="h-fit w-fit"
                :id="'food_type_card_above'+food_type.id" 
                v-for="food_type in food_type_row"
            >
             <FoodTypeCard :img="food_type.source" :cardId="food_type.id.toString()"  />
             <div class="text-2xl font-bold">
             </div>
            </div>
        </div>
    </div>
</section>
<section class="flex flex-col items-center justify-center w-screen h-screen bg-stone-500" 
        id="section_two_underneath"
        ref="section_two_underneath"
        >
    <div class="flex flex-col items-center justify-center w-screen h-screen">
        <div class="flex flex-wrap items-center gap-8 border border-blue-800 justify-evenly h-fit"
            v-for="(food_type_row, ftr_index) in food_types"
        >
            
            <div class="h-fit w-fit" 
                :id="'food_type_card_underneath'+food_type.id" 
                v-for="food_type in food_type_row"
            >
             <FoodTypeCard :img="food_type.source" :cardId="food_type.id.toString()"  />  
            </div>
        </div>
    </div>
</section>
</template>

<script setup lang="ts">
import { ref, Ref, onMounted, nextTick } from 'vue';
import FoodTypeCard from './FoodTypeCard.vue';

interface foodTypeCard {
  source: string,
  id: number,
  initialTop: string;
  initialLeft: string;
  transform: string;
  title: string
}

const section_two_above: Ref<HTMLElement| null> = ref(null);

const food_types: Ref<Array<Array<foodTypeCard>>> =ref([
  [
    { id: 1,
      source : '/storage/images/or_hero_bg.jpg',
      initialTop:'-520px' ,
      initialLeft: '0%',
      transform: 'translateX(0%)',
      title: 'Carbohydrates'
    },
    { id: 2,
      source : '/storage/images/red_wine_beef_curry.jpg',
      initialTop:'-520px' ,
      initialLeft: '5%',
      transform: 'translateX(0%)',
      title: 'Meat'
    },
    { id: 3,
      source : '/storage/images/gwinya_ne_polony.jpeg',
      initialTop:'-520px' ,
      initialLeft: '100%',
      transform: 'translateX(0%)',
      title: 'Oils and Liquids'
    },
  ],
  [
    { id: 4,
      source : '/storage/images//beef_curry_bunny_chow.jpg',
      initialTop:'100px' ,
      initialLeft: '-15%',
      transform: 'translateX(0%)',
      title: 'Spices and Herbs'
    },
    { id: 5,
      source : '/storage/images/mogodu_with_creamy_samp.jpeg',
      initialTop:'100px' ,
      initialLeft: '115%',
      transform: 'translateX(0%)',
      title: 'Vegetables'
    }
  ]
]);

onMounted(async() => {
  if(section_two_above){
    let underneath_ft_array: Array<any> = [];

    await nextTick(() =>{
        for(let i = 0; i < food_types.value.length; i++){
            food_types.value[i].forEach((ft: Array<foodTypeCard>) => {
            if(section_two_above.value?.children[index]){
                console.log(index)
                underneath_ft_array.push(section_two_above.value?.children[0].children[index].children[ft[index].id-1]);
            }   
        })
        }
    });



    console.log("underneath_ft_array - ", underneath_ft_array)


  }
});

</script>

<style lang="css" scoped>

</style>