<template>
    <div class="rounded px-3 py-2 w-full flex items-center space-x-4 border border-gray-300 border-opacity-75">
        <button class=" focus:outline-none">
            <search />
        </button>
        <input type="text" placeholder="Search ..." class="text-base w-full bg-transparent focus:outline-none">
    </div>
    
</template>

<script>
export default {
    name: 'search-form',
}
</script>