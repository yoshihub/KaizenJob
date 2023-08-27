<script setup>
import { reactive } from 'vue';
import App from '@/Components/App.vue';
import BackButton from '@/Components/BackButton.vue';
import { Head, router } from '@inertiajs/vue3';

const props = defineProps({
    user: Object,
    errors: Object,
})

const form = reactive({
    name: props.user.name,
    email: props.user.email,
})

const submitFunction = () => {
    router.post('/profile', form)
}
</script>

<template>
<Head title="プロフィール編集"/>
<App>
    <BackButton :url="'/profile'"/>
    <div class="row">
    <div class="col-8 mx-auto mt-3">
        <h2>プロフィール編集</h2>
        <form class="mt-4" @submit.prevent="submitFunction">
            <div class="mb-3">
                <label for="InputName" class="form-label">お名前</label>
                <input type="text" class="form-control" id="InputName" v-model="form.name">
                <div v-if="errors.name" class="error">
                    {{ errors.name }}
                </div>
            </div>
            <div class="mb-3">
                <label for="InputEmail" class="form-label">メールアドレス</label>
                <input type="email" class="form-control" id="InputEmail" v-model="form.email">
                <div v-if="errors.email" class="error">
                    {{ errors.email }}
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
