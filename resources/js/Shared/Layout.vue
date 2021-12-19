<template>
    <Head>
        <title>My App</title>
        <meta type="description" content="My app information" head-key="description" />
    </Head>

    <main class="flex flex-col min-h-screen">
        <section class="p-6 bg-gray-800">
            <div class="container mx-auto">
                <header class="text-white flex items-center justify-between">
                    <div class="flex space-x-4 items-center">
                        <h1 class="text-2xl font-semibold">My Inertia App</h1>
                        <p>Welcome back, {{ username }}</p>
                    </div>

                    <Nav />
                </header>
            </div>
        </section>

        <section class="flex-grow">
            <section class="p-6">
                <div class="container mx-auto">
                    <!-- <input class="border bg-gray-300 rounded-md" type="text" name="lsdfk" id="" /> -->
                    <slot />
                </div>
            </section>
        </section>
    </main>
</template>

<script>
import Nav from '../Shared/Nav.vue';
import { Head } from '@inertiajs/inertia-vue3';
export default {
    components: {
        Nav,
        Head,
    },

    computed: {
        username() {
            return this.$page.props.auth.user.username;
        },
    },
};
</script>

<style></style>
