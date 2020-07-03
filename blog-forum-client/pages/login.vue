<template>
	<div class="flex h-screen items-center justify-center">
		<form @submit.prevent="login" class="w-1/4 mx-auto p-4">
			<h1 class="font-semibold mb-2 text-xl">Login</h1>

			<div class="mb-4">
				<form-label :label="'Email'">
					<input v-model="form.email"
							id="email"
							type="email"
							name="email"
							class="w-full border rounded px-3 py-2"
							autocomplete="off" />

					<validate-error :errors="validationErrors" field="email" />
				</form-label>
			</div>

			<div class="mb-4">
				<form-label :label="'Password'">
					<input v-model="form.password"
							id="password"
							type="password"
							name="password"
							class="w-full border rounded px-3 py-2" />

					<validate-error :errors="validationErrors" field="password" />
				</form-label>
			</div>

			<Button
				:loading="status"
				type="submit"
				class="bg-blue-500 text-white font-semibold py-2 px-10 w-full rounded"
			>Login</Button>
		</form>
	</div>
</template>

<script>
// Service import
import user from '@/services/user';
// Component import
import FormLabel from '@/components/FormLabel';
import Button from '@/components/Button';
import ValidateError from '@/components/ValidateError';
// Helper import
import emitError from '@/helpers/EmitError';
// Lib
import { mapGetters } from 'vuex';

export default {
	layout: 'auth',
	data() {
		return {
			form: {
				email: '',
				password: '',
			},
			validationErrors: {}
		}
	},
	components: {
		Button,
		FormLabel,
	},
	computed: {
		...mapGetters({
			status: 'form/busy'
		}),
	},
	methods: {
		login: function() {
			this.$store.commit('form/set_busy', true);
			
			user.login(this.form).then(response => {
				this.validationErrors = {}

				// Set token after login
				this.$store.dispatch('auth/saveToken', {
					token: response.data.data.token,
					// remember: false
				});

				// Fetch the user.
				this.$store.dispatch('auth/fetchUser');
			
				this.$router.push({name: 'index'});
			}).catch(error => {
				this.validationErrors = emitError(error.response);
			}).finally(() => {
				this.$store.commit('form/set_busy', false);
			});
		}
	},
};
</script>