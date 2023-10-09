<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ClientCard from '@/Components/ClientCard.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    clients: Object
})
</script>

<template>
    <Head title="Clients" />

    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">Clients</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-wrap w-full">
                    <ClientCard v-for="client in props.clients.data" :key="client.id" :client="client" />
                </div>

                <!-- Paginator -->
                <div class="flex justify-center items-center">
                    <Pagination 
                        :links="clients.links" 
                        :currentPage="clients.current_page"
                        :totalPages="clients.total"
                        pageRange="4" />
                </div>
            </div>
        </div>
    </AppLayout>
</template>