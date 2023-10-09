<script setup>
import LinkSection from '@/Components/LinkSection.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    isCollapsed: Boolean
})
</script>

<template>
    <nav>
        <Link href="/dashboard" class="flex items-center space-x-2">
            <img src="../Components/logo/r-logo.jpg" alt="" class="w-[30px] rounded-sm">
            <span v-show="!isCollapsed" class="text-2xl text-white font-extrabold">Rosalino Flores</span>
        </Link>
        <hr class="mt-4">

        <span v-show="!isCollapsed" class="text-[10px] uppercase font-bold text-gray-300 select-none">Navigation</span>

        <LinkSection :isCollapsed="isCollapsed" />
    </nav>
</template>