<template>
    <ul class="flex items-center space-x-4 h-16 px-3">
        <li>
            <NavLink href="/" :active="$page.component === 'Home'">Home</NavLink>
        </li>
        <li>
            <NavLink href="/users" :active="$page.component === 'Users'">User</NavLink>
        </li>
        <li>
            <NavLink href="/settings" :active="$page.component === 'Settings'">Settings</NavLink>
        </li>
        <li>
            <NavLink href="/logout" method="post">Log Out</NavLink>
        </li>
    </ul>
</template>

<script setup>
import NavLink from './NavLink.vue';
</script>
