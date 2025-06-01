<template>
  <div class="flex flex-wrap justify-end items-center gap-2 py-4">
    <Link
      v-for="(link, index) in links"
      :key="index"
      :href="link.url || ''"
      v-html="link.label"
      class="px-3 py-1 rounded border text-sm transition-colors duration-200"
      :class="{
        'bg-gray-600 text-white font-semibold': link.active,
        'text-gray-500 cursor-default': !link.url,
        'hover:bg-gray-100 text-gray-600': link.url && !link.active
      }"
    />
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
  links: {
    type: Array,
    default: [],
  },
});
</script>
