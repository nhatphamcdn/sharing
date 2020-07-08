<template>
	<div class="section-content overflow-hidden">
		<div class="w-2/3 shadow">
			<div class="flex items-center">
				<div class="w-full bg-white h-full pt-10">
					<form class="w-full">
						<div class="px-20">
							<textarea-auto-height
								id="title"
								placeholder="Type a title..."
								v-model="title"
								class="cs-input w-full resize-none border-0 placeholder-gray-700 focus:outline-none mb-3"
							></textarea-auto-height>
						</div>

						<div class="w-full overflow-x-hidden overflow-y-auto" id="scrolling-container">
							<editor name="Content" id="content" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
// Components
import Editor from "@/components/Editor";
import TextareaAutoHeight from "@/components/TextareaAutoHeight";
// Helper
import FitHeightScreen from "@/helpers/FitHeightScreen";

export default {
	middleware: "auth",
	layout: "no-search",
	components: {
		Editor,
		TextareaAutoHeight
    },
    data: () => ({
        title: ''
    }),
	mounted() {
		this.$nextTick(function() {
			if (process.browser) {
				window.addEventListener("resize", FitHeightScreen());

				// Init
				FitHeightScreen();
			}
		});
	},

	beforeDestroy() {
		window.removeEventListener("resize", FitHeightScreen());
	}
};
</script>

<style scoped lang="scss">
$placeholderSize: 2.4em;
$placeholderWeight: 900;

@mixin fontStyle {
	font-size: $placeholderSize;
	font-weight: $placeholderWeight;
}

.cs-input {
	@include fontStyle;
}
</style>