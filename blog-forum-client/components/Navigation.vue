<template>
	<header class="z-10 top-0 fixed w-full shadow-sm bg-white">
		<div class="w-full container mx-auto px-4 md:px-8 py-2 h-16 flex justify-between items-center">
            <div class="flex items-center w-2/5">
                <div class="mr-5">
					<nuxt-link to="/" class="font-bold uppercase block w-2/5">
						<!-- <img src="@/static/img/logo.svg" alt="Forum Blog"> -->
						Logo
					</nuxt-link>
                </div>
                
				<!-- Form search -->
				<search-form v-if="search" />

				<div
					class="p-2 rounded-full hover:bg-gray-200 cursor-pointer md:hidden"
				>
					menu
				</div>
			</div>

			<div class="flex items-center">
				<template v-if="check">
					<Button :to="{name: 'post'}" class="mr-4 button-small">Create a post</Button>

					<a
						href="#"
						class="text-gray-500 p-2 rounded-full hover:text-blue-600 hover:bg-gray-200 cursor-pointer mr-4"
					>
						<sound />
					</a>

					<dropdown-user />
				</template>
				<template v-else>
					<Button :to="{name: 'login'}">Login</Button>
				</template>
			</div>
		</div>
	</header>
</template>

<script>
// Icon
import Sound from "./Icon/Sound";
import Search from "./Icon/Search";
// Component
import Button from "./Button";
import SearchForm from "./partials/navigation/SearchForm";
import DropdownUser from "./partials/navigation/DropdownUser";
import { mapGetters } from "vuex";

export default {
	name: "navigation",
	components: {
        Button,
        Search,
		DropdownUser,
		SearchForm
	},
	props: {
		search: {
			type: Boolean,
			default: true
		}
	},
	computed: {
		...mapGetters({
			check: 'auth/check'
		})
	}
};
</script>