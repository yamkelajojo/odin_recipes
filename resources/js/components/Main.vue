<template>
    <div class="grow lg:container lg:mx-auto py-10 flex flex-col items-center">
        <input class="bg-white w-96 py-2 px-1 border border-gray-300 my-8 rounded shadow" b type="text" name="todo" id="todo" v-model="newToDo" placeholder="Enter New To Do" @keyup.enter="addTodo">
        <section class="flex flex-col gap-5">
            <div class="w-96 p-3 shadow-md rounded bg-stone-200 cursor-pointer text-gray-700 hover:bg-stone-300 hover:scale-105 transition duration-200 ease-in-out"
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
import { ref } from 'vue';

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

const addToDo(){
    
}

</script>
