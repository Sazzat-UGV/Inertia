<template>
    <div>
       <Component
      v-for="(link, index) in links"
      :key="index"
      :is="link.url ? 'a' : 'span'"
      v-html="link.label"
      :href="link.url || undefined"
      class="px-1"
      :class="{
        'text-gray-500': !link.url,
        'font-bold': link.active
      }"
    />
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    links: {
        type: Array,
        default: [],
    },
});
</script>
