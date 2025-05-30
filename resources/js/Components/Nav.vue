<template>
    <nav class="my-6">
        <ul class="list-none ml-5">
            <li class="flex flex-row gap-3 items-center">
                <Link class="text-blue-500 hover:underline" :class="{'font-bold underline': $page.url=== '/'}" href="/">Home</Link>
                <Link class="text-blue-500 hover:underline" :class="{'font-bold underline': $page.component=== 'Users'}"  href="/users">Users</Link>
                <Link class="text-blue-500 hover:underline" :class="{'font-bold underline': $page.url=== '/settings'}"  href="/settings">Settings</Link>
                <Link href="/logout" method="post" as="button" :data="{name:'Sarah Moni'}"  class="bg-red-400 px-3 py-1 rounded-full text-white font-bold hover:cursor-pointer">Log out</Link>
            </li>
        </ul>
    </nav>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
</script>
