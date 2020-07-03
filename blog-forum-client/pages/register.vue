<template>
	<div class="flex h-screen items-center justify-center">
		<form @submit.prevent="register" class="w-1/4 mx-auto p-4">
			<h1 class="font-semibold mb-2 text-xl">Register</h1>

			<div class="mb-4">
				<form-label label="Name">
					<input v-model="form.name"
							id="name"
							type="text"
							name="name"
							class="w-full border rounded px-3 py-2"
							autocomplete="off" />

					<validate-error :errors="validationErrors" field="name" />
				</form-label>
			</div>

			<div class="mb-4">
				<form-label label="Email">
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
            
			<div class="mb-4">
				<form-label :label="'Password Confirm'">
					<input v-model="form.password_confirmation"
							id="password_confirmation"
							type="password"
							name="password_confirmation"
							class="w-full border rounded px-3 py-2" />

					<validate-error :errors="validationErrors" field="password_confirmation" />
				</form-label>
			</div>

			<Button
				:loading="status"
				type="submit"
				class="bg-blue-500 text-white font-semibold py-2 px-10 w-full rounded"
			>Register</Button>
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
				name: '',
				email: '',
				password: '',
				password_confirmation: '',
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
		register() {
			this.$store.commit('form/set_busy', true);
			
			user.register(this.form).then((response) => {
                this.validationErrors = {}
			}).catch(error => {
				this.validationErrors = emitError(error.response);
			}).finally(() => {
				this.$store.commit('form/set_busy', false);
			});
		}
    },
    beforeDestroy() {
        this.$store.commit('form/set_busy', false);
    },
};
</script>