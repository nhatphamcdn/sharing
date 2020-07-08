<template>
	<div class="editor relative">
		<div id="toolbar" class="bg-white z-10 sticky top-0">
			<div class="px-20 -mx-1">
				<span class="ql-formats">
					<button type="button" class="ql-header" value="2"></button>
					<button type="button" class="ql-header" value="3">
						<header-3 />
					</button>
				</span>
				<span class="ql-formats">
					<button class="ql-bold" title="Bold"></button>
					<button class="ql-italic" title="Italic"></button>
					<button class="ql-underline" title="Underline"></button>
					<button class="ql-strike" title="Strikethrough"></button>
				</span>
				<span class="ql-formats">
					<select class="ql-color" title="Color"></select>
					<select class="ql-background" title="Background color"></select>
				</span>
				<span class="ql-formats">
					<button class="ql-list" value="ordered" title="List Number"></button>
					<button class="ql-list" value="bullet" title="List Bullet"></button>
					<select class="ql-align">
						<option selected></option>
						<option value="center" title="Align Center"></option>
						<option value="right" title="Align Right"></option>
						<option value="justify" title="Align Justify"></option>
					</select>
				</span>
				<span class="ql-formats">
					<button class="ql-blockquote" title="Blockquote"></button>
					<button class="ql-link" title="Link"></button>
					<button class="ql-image" title="Image"></button>
					<button class="ql-code-block" title="Code block"></button>
					<button class="ql-video" title="Video"></button>
				</span>
				<span class="ql-formats float-right">
					<button class="focus:outline-none overflow-hidden" title="Undo" @click="undoChange">
						<Undo />
					</button>
					<button class="focus:outline-none overflow-hidden" title="Redo" @click="redoChange">
						<Redo />
					</button>
				</span>
			</div>
		</div>
		<div class="w-full py-4 text-black" :id="forId"></div>
		<input type="hidden" :name="name" />
	</div>
</template>

<script>
// Helper
import slug from "@/helpers/Slugify";
import Undo from "quill/assets/icons/undo.svg?inline";
import Redo from "quill/assets/icons/redo.svg?inline";
import Header3 from "quill/assets/icons/header-3.svg?inline";

export default {
	components: {
		Undo,
		Redo,
		Header3
	},
	props: {
		name: {
			type: String,
			default: "Content"
		},
		id: {
			type: String,
			default: null
		}
	},
	data() {
		return {
			value: null,
			editor: null
		};
	},
	methods: {
		editorInit() {
			this.editor = this.$editorjs(`#${this.forId}`, {
				debug: "info",
				scrollingContainer: "#scrolling-container",
				modules: {
					toolbar: '#toolbar',
					history: {
						delay: 500,
						maxStack: 500,
						userOnly: true
					}
				},
				placeholder: "Write away...",
				theme: "snow"
			});

			this.editor.on("text-change", function(delta) {
				if (this.$editorDelta) console.log(this.$editorDelta);
			});
		},
		// Undo and redo functions for Custom Toolbar
		undoChange() {
			this.editor.history.undo();
		},
		redoChange() {
			this.editor.history.redo();
		}
	},
	mounted: function() {
		this.editorInit();
	},
	computed: {
		forId: function() {
			if (!this.id) return slug(this.name);

			return this.id;
		}
	}
};
</script>

<style lang="scss">
	@import url("quill/dist/quill.snow.css");
	
	.ql-container.ql-snow,
    .ql-toolbar.ql-snow {
		padding: 8px 0;
		border-width: 1px 0px;
		@apply border-gray-300;
	}
	
	.ql-container.ql-snow {
		@apply px-20 border-b-0;
	}

	.ql-editor {
		@apply px-0 text-xl;
		min-height: 12rem;
		
		&.ql-blank {
			&::before {
				@apply inset-x-auto not-italic;
			}
		}
	}

	.ql-tooltip {
		left: auto !important;
	}

	.ql-snow.ql-toolbar,
	.ql-snow .ql-toolbar {
		button {
			height: 26px;
		}
	}
</style>