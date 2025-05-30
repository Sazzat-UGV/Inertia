<template>
    <nav class="">
        <ul class="flex list-none space-x-4 list-inside">
            <li class="">
                <Link
                    class="text-black hover:underline"
                    :class="{ 'font-bold underline': $page.url === '/' }"
                    href="/"
                    >Home</Link
                >
            </li>
            <li class="">
                <Link
                    class="text-black hover:underline"
                    :class="{
                        'font-bold underline': $page.component === 'Users',
                    }"
                    href="/users"
                    >Users</Link
                >
            </li>
            <li class="">
                <Link
                    class="text-black hover:underline"
                    :class="{
                        'font-bold underline': $page.url === '/settings',
                    }"
                    href="/settings"
                    >Settings</Link
                >
            </li>
            <!-- <li class="">
                <Link href="/logout" method="post" as="button" :data="{name:'Sarah Moni'}"  class="bg-red-400 px-3 py-1 rounded-full text-white font-bold hover:cursor-pointer">Log out</Link>
            </li> -->
        </ul>
    </nav>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
</script>
