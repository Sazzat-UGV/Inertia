<template>
    <section class="p-6 bg-gray-200">
        <header class="flex justify-between items-center">
            <div class="flex items-center">
                <h1 class="font-bold text-lg">My App</h1>
                <p class="text-sm font-bold ml-4 border py-1 px-2 rounded-2xl">Welcome back, {{ $page.props.auth.user.name }} !</p>
            </div>
            <Nav />
        </header>
    </section>
    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot />
        </div>
    </section>
</template>
<script setup>
import Nav from "./Nav.vue";
</script>
