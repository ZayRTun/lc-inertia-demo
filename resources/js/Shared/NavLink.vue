<template>
	<Link :class="{ 'text-blue-400 underline': active }">
		<slot />
	</Link>
</template>
<script>
	import { Link } from "@inertiajs/inertia-vue3";
	export default {
		components: { Link },
		props: {
			active: Boolean,
		},
	};
</script>