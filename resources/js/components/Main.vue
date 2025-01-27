<template>
    <div class="flex flex-col items-center py-10 grow lg:container lg:mx-auto">
        <input class="px-1 py-2 my-8 bg-white border border-gray-300 rounded shadow w-96" b type="text" name="todo" id="todo" v-model="newToDo" placeholder="Enter New To Do">
        <section class="flex flex-col gap-5">
            <div class="p-3 text-gray-700 transition duration-200 ease-in-out rounded shadow-md cursor-pointer w-96 bg-stone-200 hover:bg-stone-300 hover:scale-105"
            v-for="td in todos"
            :key="td.id"
            @click="() => {todos = todos.filter((t) => t.id == td.id)}"
            >
               {{ td.title }}
            </div>
        </section>
    </div>
</template>

<script setup lang="ts">
import { ref, Ref} from 'vue';

interface ToDo {
    id: number,
    title: string
};

const newToDo: Ref<string> = ref('');

const todos: Ref<Array<ToDo>> = ref([ 
    {
        id: 1,
        title: 'Complete the Header Component'
    },
    {
        id: 2,
        title: 'Apply Roboto Font Globally'
    }
]);

</script>
