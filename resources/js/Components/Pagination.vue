<script setup>
import { Link } from '@inertiajs/vue3';
// import { computed } from 'vue';

const props = defineProps({
    links: Array,
    // currentPage: Number,
    // totalPages: Number,
    // pageRange: Number 
})
</script>

<template>
    <div>
        <div class="flex flex-wrap -mb-1">
            <template v-for="(link, p) in links" :key="p">
                <div v-if="link.url === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                    v-html="link.label"></div>
                <Link v-else
                    class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-gray-700 hover:text-white"
                    :class="{ 'bg-gray-700 text-white hover:bg-gray-500': link.active }" :href="link.url" v-html="link.label"></Link>
            </template>
        </div>
    </div>
</template>