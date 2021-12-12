<template>
	<div class="mt-6">
		<h1 class="text-4xl font-bold">Users</h1>
	</div>
	<div style="margin-top: 800px">
		<p>The current time is {{ time }}.</p>
		<Link href="users" preserve-scroll>Refresh</Link>
	</div>
</template>

<script>
	export default {
		props: {
			time: String,
		},
	};
</script>