<template>
  <!-- <Hero/> -->
  <section id="second_section" class="relative h-screen">
    <!-- Floating Boxes (Absolute Positioned) -->
    <div class="absolute z-10 w-screen h-screen">
      <div class="relative flex items-center justify-center h-screen" id="section_2_above">
        <div class="justify-center rounded " ref="ft_cards_container">
          <!-- Top Row -->
          <div class="relative flex" style="max-width: 800px;">
            <div class="max-w-[800px] min-w-[800px] w-full relative mx-auto">
              <div
              v-for="(food_type, index) in food_types[0]"
              :key="'floating-top-' + index"
              class="absolute rounded w-fit h-fit "
              :style="{
                top: food_type.initialTop,
                left: food_type.initialLeft,
                transform: food_type.transform
              }"
              :ref="el => { if (el) floatingBoxes[0][index] = el as HTMLElement }"
                
                >
                <FoodTypeCard  :img="food_type.source" :foodType="food_type.title" :cardId="food_type.id.toString()"
                />
              </div>
            </div>
          </div>
          <!-- Bottom Row -->
          <div class="relative flex" style="max-width: 800px;">
            <div class="max-w-[800px] min-w-[800px] w-full relative mx-auto">
              <div
              v-for="(food_type, index) in food_types[1]"
              :key="'floating-top-' + index"
              class="absolute rounded w-fit h-fit "
              :style="{
                top: food_type.initialTop,
                left: food_type.initialLeft,
                transform: food_type.transform
              }"
              :ref="el => { if (el) floatingBoxes[1][index] = el as HTMLElement }"
                
                >
                <FoodTypeCard  :img="food_type.source" :foodType="food_type.title" :cardId="food_type.id.toString()"
                />
                <!-- <p class="text-8xl">
                  {{ floatingBoxes[1][index].clientLeft }}
                </p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Target Boxes (Static Grid) -->
    <div class="absolute w-screen h-screen">
      <div class="relative flex items-center justify-center h-screen section_2 bg-stone-500" id="section_2_underneath">
        <div class="flex flex-col items-center justify-center w-full mx-auto border-pink-600 border-3" ref="ft_cards_container_underneath">
          <!-- Top Row -->
          <div class="flex justify-around w-full gap-24 border-2 border-green-600" style="max-width:1400px;">
            <div class="flex flex-wrap justify-between w-full border-2 border-red-600">
              <div
                v-for="(box, index) in boxes[0]"
                :key="'target-top-' + index"
                class="w-64 h-64 bg-blue-600 rounded"
                :ref="el => { if (el) targetBoxesTop[index] = el as HTMLElement }"
              >
            </div>
            </div>
          </div>
          <!-- Bottom Row -->
          <div class="flex justify-center" style="max-width: 1400px;">
            <div class="flex justify-center w-full gap-8">
              <div
                v-for="(box, index) in boxes[1]"
                :key="'target-bottom-' + index"
                class="w-64 bg-yellow-700 rounded h-96"
                :ref="el => { if (el) targetBoxesBottom[index] = el as HTMLElement }"
              >
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <Footer/>
</template>

<script setup lang="ts">
import { animate, onScroll } from 'animejs';
import { onMounted, ref, type Ref, nextTick } from 'vue';
import Hero from '../components/Hero.vue';
import FoodTypeCard from '../components/FoodTypeCard.vue';
import Footer from '../components/Footer.vue';

interface foodTCard {
  color: string;
  hex: string;
  initialTop: string;
  initialLeft: string;
  transform: string;
}

interface foodTypeCard {
  source: string,
  id: number,
  initialTop: string;
  initialLeft: string;
  transform: string;
  title: string
}

const animateCard: Ref<HTMLElement | null> = ref(null);
const ft_cards_container = ref<HTMLElement | null>(null);
const ft_cards_container_underneath = ref<HTMLElement | null>(null);
const floatingBoxes = ref<[HTMLElement[], HTMLElement[]]>([[], []]);
const targetBoxesTop = ref<HTMLElement[]>([]);
const targetBoxesBottom = ref<HTMLElement[]>([]);
const isAligned: Ref<boolean> = ref(false);

  

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

const food_type_cards_animation = () => {
  nextTick (() => {
    boxes.value.forEach((row, rowIndex) => {
    row.forEach((_, boxIndex) => {
      const floatBox = floatingBoxes.value[rowIndex][boxIndex];
      const targetBox = rowIndex === 0 
        ? targetBoxesTop.value[boxIndex] 
        : targetBoxesBottom.value[boxIndex];

      if (floatBox && targetBox) {
        // Get positions relative to document
        const targetRect = targetBox.getBoundingClientRect();
        const floatRect = floatBox.getBoundingClientRect();
        
        // Calculate center points
        const targetCenterX = targetRect.left + targetRect.width / 2;
        const targetCenterY = targetRect.top + targetRect.height / 2;
        
        const floatCenterX = floatRect.left + floatRect.width / 2;
        const floatCenterY = floatRect.top + floatRect.height / 2;

        // Calculate required movement to align centers
        const moveX = targetCenterX - floatCenterX;
        const moveY = targetCenterY - floatCenterY;

        // Remove transform temporarily for clean movement
        floatBox.style.transform = '';

        console.log("floatBox", floatBox);
        console.log("targetBox", targetBox);

        console.log("floatBox", floatBox.offsetLeft);
        console.log("targetBox", targetBox.offsetLeft);
        
        // Animate using relative movement
        animate(floatBox, {
          translateX: moveX,
          translateY: moveY,
          easing: 'easeInOutQuad',
          duration: 800
        });
      }
    });
  });
  })
};
  


const boxes: Ref<Array<Array<foodTCard>>> = ref([[  
  { color: 'bg-red-500', hex: '#ef4444', initialTop:'-400px' , initialLeft: '0%', transform: 'translateX(-50%)'},
  { color: 'bg-blue-500', hex: '#3b82f6', initialTop:'-400px' , initialLeft: '50%', transform: 'translateX(-50%)'},
  { color: 'bg-green-500', hex: '#10b981', initialTop:'-400px' , initialLeft: '100%', transform: 'translateX(-50%)'}],
  [{ color: 'bg-yellow-500', hex: '#facc15', initialTop:'300px', initialLeft: '-15%', transform: 'translateX(-50%)' },
  { color: 'bg-purple-500', hex: '#8b5cf9', initialTop:'300px', initialLeft: '115%', transform: 'translateX(-50%)' }]
]);

// const alignedTransforms = computed(() => {
//   if (!isAligned.value) return;

//   boxes.value.forEach((row, rowIndex) => {
//     row.forEach((_, boxIndex) => {
//       const floatBox = floatingBoxes.value[rowIndex][boxIndex];
//       const targetBox = rowIndex === 0 
//         ? targetBoxesTop.value[boxIndex] 
//         : targetBoxesBottom.value[boxIndex];

//       if (floatBox && targetBox) {
//         const targetRect = targetBox.getBoundingClientRect();
//         const floatRect = floatBox.getBoundingClientRect();

//         const moveX = targetRect.left - floatRect.left - floatRect.width / 2;
//         const moveY = targetRect.top - floatRect.top + (targetRect.height - floatRect.height) / 2;

//         floatBox.style.transform = `translate(${moveX}px, ${moveY}px)`;
//       }
//     });
//   });
// });


onMounted(() => {
  // food_type_cards_animation();
});
</script>

<style scoped>
.images{
  object-fit: contain;
  height: 16rem;
}

#second_section{
  background: linear-gradient(180deg, #C9A723 0%, #332C2C 100%);
}
</style>