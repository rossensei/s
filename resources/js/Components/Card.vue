<script setup>
import { inject } from 'vue';
const color = inject('color')
console.log(color)

defineProps({
    clientCount: Number
})
</script>

<template>
   <div class="block max-w-sm p-6 bg-white border border-gray-200 shadow-sm rounded-lg">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ clientCount }}</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Total Clients</p>

        <div class="flex justify-end">
            <button type="button" class="px-4 py-1.5 rounded-md text-white text-sm"
            :class="{
                'bg-black' : color == '',
                'bg-blue-600' : color == 'Blue',
                'bg-red-600' : color == 'Red',
                'bg-green-600' : color == 'Green',
            }"
            >Go to</button>
        </div>
   </div> 
</template>