<script setup>
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();

console.log(page.props);

defineProps({
    isCollapsed: Boolean
})
</script>

<template>
    <div class="flex flex-col mt-4 space-y-3" :class="{ 'items-center' : isCollapsed }">
        <Link href="/dashboard" class="px-2 py-1.5 rounded-lg text-sm text-white hover:bg-white hover:text-black duration-75 space-x-2">
            <i class="fa-solid fa-gauge"></i>
            <span v-show="!isCollapsed" class="text-sm">Dashboard</span>
        </Link>
        <Link href="/clients" class="px-2 py-1.5 rounded-lg text-sm text-white hover:bg-white hover:text-black duration-75 space-x-2">
            <i class="fa-solid fa-users"></i>
            <span v-show="!isCollapsed" class="text-sm">Clients</span>
        </Link>
        <Link v-if="page.props.auth.user.permissions.includes('manage-suppliers')" href="/suppliers" class="px-2 py-1.5 rounded-lg text-sm text-white hover:bg-white hover:text-black duration-75 space-x-2">
            <i class="fa-solid fa-boxes-packing"></i>
            <span v-show="!isCollapsed" class="text-sm">Suppliers</span>
        </Link>
    </div>
</template>
