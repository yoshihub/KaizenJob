<script setup>
import { reactive } from 'vue';
import App from '@/Components/App.vue';
import BackButton from '@/Components/BackButton.vue';
import { Head, router } from '@inertiajs/vue3';

const props = defineProps({
    errors: Object,
})

const form = reactive({
    password: null,
    password_confirmation: null,
})

const submitFunction = () => {
    router.post('/password_update', form)
}
</script>

<template>
    <Head title="パスワード変更" />
    <App>
        <BackButton :url="'/profile'"/>
        <div class="row">
            <div class="col-8 mx-auto mt-3">
                <h2>パスワード変更</h2>
                <form class="mt-4" @submit.prevent="submitFunction">
                    <div class="mb-3">
                        <label for="InputPass" class="form-label">パスワード</label>
                        <input type="password" class="form-control" id="InputPass" v-model="form.password">
                        <div v-if="errors.password" class="error">
                            {{ errors.password }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="InputPassConfirmed" class="form-label">パスワード確認</label>
                        <input type="password" class="form-control" id="InputPassConfirmed" v-model="form.password_confirmation">
                        <div v-if="errors.password_confirmation" class="error">
                            {{ errors.password_confirmation }}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">更新</button>
                </form>
            </div>
        </div>
    </App>
</template>

<style scoped>
.error {
    color: red;
}
</style>
