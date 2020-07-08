<template>
    <div class="relative">
        <div
            class="cursor-pointer font-bold w-10 h-10 bg-blue-200 text-blue-600 flex items-center justify-center rounded-full"
            @click.stop="dropdownUser = !dropdownUser"
        >N</div>

        <transition
            enter-active-class="transition-all duration-500 ease-out"
            leave-active-class="transition-all duration-500 ease-in"
            enter-class="opacity-0 scale-75"
            enter-to-class="opacity-100 scale-100"
            leave-class="opacity-100 scale-100"
            leave-to-class="opacity-0 scale-75"
        >
            <div
                class="absolute top-0 mt-12 right-0 w-48 bg-white py-2 shadow-md border border-gray-100 rounded-lg z-40"
                v-click-outside="hiddenOutside"
                v-if="dropdownUser"
            >
                <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600">
                    Edit
                    Profile
                </a>
                <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600">
                    Account
                    Settings
                </a>
                <a @click="logout" href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-blue-600">
                    Logout
                </a>
            </div>
        </transition>
    </div>
    
</template>

<script>
// Directive
import ClickOutside from '@/directives/ClickOutside';

export default {
    name: 'dropdown-user',
    data: () => ({
        dropdownUser: false
    }),
    directives: {
        ClickOutside
    },
    methods: {
        hiddenOutside: function() {
            this.dropdownUser = false;
        },
        logout: async function () {
            await this.$store.dispatch('auth/logout');
            this.$router.push({ name: 'login' });
        }
    },
}
</script>