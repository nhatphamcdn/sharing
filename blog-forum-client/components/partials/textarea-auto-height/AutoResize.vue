<script>
// Renderless component
export default {
	name: "auto-resize",
	methods: {
		resize(event) {
            event.target.style.height = 'auto';
            event.target.style.height = (event.target.scrollHeight) + 'px';
		}
	},
	mounted() {
        this.$nextTick(() => {
            this.$el.setAttribute('style', 'height:' + (this.$el.scrollHeight) + 'px')
		})
	},
    beforeDestroy () {
        this.$el.removeEventListener('input', this.resize);
    },
	render() {
		return this.$scopedSlots.default({
			resize: this.resize
		});
	}
};
</script>