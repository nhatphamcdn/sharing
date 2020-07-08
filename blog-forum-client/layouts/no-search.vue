<template>
	<div class="no-search-layout">
		<navigation :search="false" />
		<Nuxt />
	</div>
</template>

<script>
// Component
import Navigation from "@/components/Navigation";

export default {
	components: {
		Navigation
	}
};
</script>