<template>
	<div class="container mx-auto p-8 flex">
		<div class="max-w-md w-full mx-auto">
			<div class="bg-white rounded-lg overflow-hidden shadow-2xl">
				<div class="p-8">
					<form @submit.prevent="login">
						<div class="mb-5">
							<form-label :label="'Email'">
								<input
									class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none"
									type="email"
									name="email"
									placeholder="email"
									id="email"
									v-model="form.email"
									autocomplete="off"
								/>

								<validate-error :errors="validationErrors" field="email" />
							</form-label>
						</div>

						<div class="mb-5">
							<form-label :label="'Password'">
								<input
									v-model="form.password"
									id="password"
									type="password"
									name="password"
									placeholder="*****************"
									class="block w-full p-3 rounded bg-gray-200 border border-transparent focus:outline-none"
								/>

								<validate-error :errors="validationErrors" field="password" />
							</form-label>
						</div>

						<Button
							:loading="status"
							type="submit"
							class="w-full bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-10 rounded focus:outline-none focus:shadow-outline"
						>Login</Button>
					</form>
				</div>

				<div class="flex justify-between p-8 text-sm border-t border-gray-300 bg-gray-100">
					<nuxt-link :to="{ name: 'register' }" class="font-medium text-blue-500">Create account</nuxt-link>
					<a href="#" class="text-gray-600">Forgot password?</a>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
// Service import
import user from "@/services/user";
// Component import
import FormLabel from "@/components/FormLabel";
import Button from "@/components/Button";
import ValidateError from "@/components/ValidateError";
// Helper import
import emitError from "@/helpers/EmitError";
// Lib
import { mapGetters } from "vuex";

export default {
	layout: "auth",
	data() {
		return {
			form: {
				email: "",
				password: ""
			},
			validationErrors: {}
		};
	},
	components: {
		Button,
		FormLabel
	},
	computed: {
		...mapGetters({
			status: "form/busy"
		})
	},
	methods: {
		login: function() {
			this.$store.commit("form/set_busy", true);

			user.login(this.form)
				.then(response => {
					this.validationErrors = {};

					// Set token after login
					this.$store.dispatch("auth/saveToken", {
						token: response.data.data.token
						// remember: false
					});

					// Fetch the user.
					this.$store.dispatch("auth/fetchUser");

					this.$router.push({ name: "index" });
				})
				.catch(error => {
					this.validationErrors = emitError(error.response);
				})
				.finally(() => {
					this.$store.commit("form/set_busy", false);
				});
		}
	}
};
</script>