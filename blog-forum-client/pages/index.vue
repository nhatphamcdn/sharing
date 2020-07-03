<template>
  <div class="container">
    <div>
      asd
    </div>
  </div>
</template>

<script>
// Service import
import user from '@/services/user';

export default {
  middleware: 'auth',
  mounted: function() {
    this.getUser();
  },
	methods: {
		getUser() {
			user.auth().then(rs => {
        console.log(rs);
			}).catch(error => {
        console.log(error);
        
      });
		}
	},
};
</script>