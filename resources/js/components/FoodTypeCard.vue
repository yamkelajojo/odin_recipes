<template>
    <div class="flex flex-col rounded-xl" id="food_card_type">
        <!-- <img src="" alt="" id="card_image" class="h-48"> -->
        <div class="h-48" card_image></div>
        <div id="card_description" class="p-2">
            <p id="food_type" class="font-bold">{{ foodType }}</p>
            <p id="food_type_description" class="font-bold">{{ foodType }}</p>
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
        }
    })
</script>

<style scoped>
    #food_card_type{
        max-width: 224px;
        max-height: 288px;
        background-color: var(--main-bg);
        box-shadow: 0px 7px 29px rgba(253, 187, 63, 0.25);
        border: solid 1px #FDBB3F
    }

    #card_image{
        height: 160px;
        border: none;
    }

    /* #card_description{

    } */

    #food_type{
        font-size: 28px;
    }

    #food_type_description{
        color:  var(--main-gray);
        height: 80px;
    }
</style>
