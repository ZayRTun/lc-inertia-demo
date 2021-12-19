<template>
    <Head title="Login Page" />

    <main class="min-h-screen grid place-content-center">
        <section class="bg-white p-8 rounded-md max-w-md mx-auto border">
            <h1 class="text-3xl">Login</h1>

            <form @submit.prevent="submit" class="mt-6">
                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>

                    <div class="mt-1">
                        <input
                            v-model="form.email"
                            class="border border-gray-400 p-2 w-full rounded-md"
                            name="email"
                            type="email"
                            id="email"
                            required
                        />
                    </div>

                    <p v-if="form.errors.email" v-text="form.errors.email" class="text-red-400 text-sm mt-1"></p>
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>

                    <div class="mt-1">
                        <input
                            v-model="form.password"
                            class="border border-gray-400 p-2 w-full rounded-md"
                            name="password"
                            type="password"
                            id="password"
                        />
                    </div>

                    <p v-if="form.errors.password" v-text="form.errors.password" class="text-red-400 text-sm mt-1"></p>
                </div>

                <div class="mt-6">
                    <div class="flex">
                        <button
                            type="submit"
                            class="
                                inline-flex
                                justify-center
                                py-2
                                px-4
                                border border-transparent
                                shadow-sm
                                text-sm
                                font-medium
                                rounded-md
                                text-white
                                bg-blue-400
                                hover:bg-blue-500
                                focus:outline-none
                            "
                            :disabled="form.processing"
                        >
                            Log In
                        </button>
                    </div>
                </div>
            </form>
        </section>
    </main>
</template>

<script>
export default {
    layout: null,
};
</script>

<script setup>
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';

let form = useForm({
    email: '',
    password: '',
});

let submit = () => {
    Inertia.post('/login', form);
};
</script>
