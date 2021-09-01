<template>
    <div id="app" ref="app">
        <example-component></example-component>
    </div>
</template>
<script>
    import { mapGetters } from 'vuex';
    export default {
        name: 'App',
        computed: {
            ...mapGetters('auth', ['isAuth']),
            component() {
                if (!this.isAuth) {
                    return 'auth'
                }
                return null;
            }
        },
        beforeMount() {
            if (this.isAuth) {
                this.setState()
            }
        },
        created() {
            miniToastr.setIcon('error', 'i', {
                'class': 'fas fa-times'
            });
            miniToastr.setIcon('success', 'i', {
                'class': 'fas fa-check'
            });
            miniToastr.setIcon('info', 'i', {
                'class': 'fas fa-info-circle'
            });
        }
    }
</script>
<style lang="scss" src="./assets/sass/bootstrap/bootstrap.scss"></style>
<style src="bootstrap-vue/dist/bootstrap-vue.css"></style>
