<template>
    <div>
        <label :for="labelId" class="block mb-2 text-sm font-medium text-gray-600">{{ label }}</label>
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