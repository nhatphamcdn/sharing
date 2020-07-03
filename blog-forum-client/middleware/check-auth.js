export default async ({ store, req }) => {
    const token = store.getters['auth/token'];
    
    if (!store.getters['auth/check'] && token) {
        await store.dispatch('auth/fetchUser');
    }
}
