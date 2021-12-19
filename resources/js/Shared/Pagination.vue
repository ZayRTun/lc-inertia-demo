<template>
    <div>
        <Component
            :is="link.url ? 'Link' : 'span'"
            v-for="link in links"
            :href="link.url"
            :key="link.url"
            v-html="link.label"
            class="p-2"
            :class="{ 'text-gray-400': !link.url, 'font-semibold': link.active }"
        />
    </div>
</template>

<script setup>
defineProps({ links: Array });
</script>
