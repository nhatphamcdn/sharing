<template>
	<auto-resize>
		<template v-slot:default="{resize}">
			<textarea @input="resize" rows="1"></textarea>
		</template>
	</auto-resize>
</template>

<script>
import AutoResize from "./partials/textarea-auto-height/AutoResize";

export default {
	name: "textarea-auto-height",
	components: { AutoResize }
};
</script>