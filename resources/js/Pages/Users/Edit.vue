<template>
    <Head title="Create User" />

    <div class="my-6 flex justify-between">
        <h1 class="text-3xl">Create new user</h1>
    </div>

    <form @submit.prevent="submit" class="max-w-md mx-auto">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>

            <div class="mt-1">
                <input
                    v-model="form.name"
                    class="border border-gray-400 p-2 w-full rounded-md"
                    name="name"
                    type="text"
                    id="name"
                    required
                />
            </div>

            <p v-if="form.errors.name" v-text="form.errors.name" class="text-red-400 text-sm mt-1"></p>
        </div>

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
                    Submit
                </button>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/inertia-vue3';

let props = defineProps({ user: Object });

let form = useForm({
    name: props.user.name,
    email: props.user.email,
});

let submit = () => {
    form.put(`/users/${props.user.id}`, form);
};
</script>
