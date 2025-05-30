<template>
    <nav>
        <ul>
            <li style="display: flex; flex-direction: column">
                <Link href="/">Home</Link>
                <Link href="/users">Users</Link>
                <Link href="/settings">Settings</Link>
            </li>
        </ul>
    </nav>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
</script>
