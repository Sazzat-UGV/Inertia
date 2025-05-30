<template>
    <Nav />
    <h1 class="text-4xl font-bold">Users</h1>
    <div class="mt-[700px]">
        <p>The current time is {{ time }}</p>
        <Link href="/users" class="text-blue-500 hover:underline" preserve-scroll>Refresh</Link>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
import Nav from "../Components/Nav.vue";
defineProps({
    time: {
        type: String,
        default: "N/A",
    },
});
</script>
