<template>
	<div class="auth-layout">
		<navigation />

		<div class="p-6 w-full min-h-screen flex justify-center flex-col items-center bg-gray-200 rounded-lg">
			<Nuxt />
		</div>
	</div>
</template>

<script>
// Component
import Navigation from "@/components/Navigation";

export default {
	middleware: "guest"
};
</script>