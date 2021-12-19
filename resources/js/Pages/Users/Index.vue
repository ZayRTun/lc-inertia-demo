<template>
    <Head title="User" />

    <div class="my-6 flex justify-between">
        <div class="flex items-baseline">
            <h1 class="text-4xl font-bold">Users</h1>
            <Link v-if="can.createUser" href="/users/create" class="text-blue-500 text-sm ml-3" as="button"
                >New User</Link
            >
        </div>

        <input v-model="search" type="text" placeholder="Search..." class="border px-2 rounded-md" />
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody>
                            <tr
                                v-for="(person, personIdx) in users.data"
                                :key="person.email"
                                :class="personIdx % 2 === 0 ? 'bg-white' : 'bg-gray-50'"
                            >
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ person.name }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ person.email }}</td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a
                                        v-if="person.can.edit"
                                        :href="`/users/${person.id}/edit`"
                                        class="text-indigo-600 hover:text-indigo-900"
                                        >Edit</a
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Paginator -->
    <!-- <div class="mt-8">
		<template v-for="link in users.links">
			<Link
				v-if="link.url"
				:href="link.url"
				:key="link.url"
				v-html="link.label"
				class="border p-2 rounded-md inline-block"
			/>
			<span class="border p-2 rounded-md inline-block" v-else :key="link.url" v-html="link.label"></span>
		</template>
	</div>-->

    <!-- A better way to do the above -->
    <Pagination :links="users.links" class="mt-8" />
</template>

<script setup>
import Pagination from '../../Shared/Pagination.vue';
import { ref, watch } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import debounce from 'lodash/debounce';

let props = defineProps({
    users: Object,
    filters: Object,
    can: Object,
});

let search = ref(props.filters.search);

watch(
    search,
    debounce(function (value) {
        Inertia.get('/users', { search: value }, { preserveState: true, replace: true });
    }, 500)
);
</script>
