<template>
    <div>
        <label :for="labelId" class="block mb-1 text-sm">{{ label }}</label>
        <slot></slot>
    </div>
</template>

<script>
import slug from '@/helpers/Slugify';

export default {
    name: "form-label",
    computed: {
        labelId: function() {
            return slug(this.label);
        }
    },
    props: {
        label: {
            type: String,
            default: null
        }
    }
}
</script>