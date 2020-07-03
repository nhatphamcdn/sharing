<template>
	<div v-if="hasErrors">
		<span class="text-xs text-red-500">{{ getErrors(field) }}</span>
	</div>
</template>

<script>
export default {
	name: "validate-error",
	props: {
		errors: {
			type: Object,
			required: true
		},
		field: {
			type: String,
			required: true
		},
    },
    computed: {
        hasErrors: function() {
            if(!Object.values(this.errors).length)
                return false;

            return true;
        }
    },
    methods: {
        getErrors: function(field) {
            if(this.errors[field])
                return this.errors[field][0];
            
            return;
        }
    },
};
</script>