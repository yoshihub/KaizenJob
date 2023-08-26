<script setup>
import App from '@/Components/App.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import { router} from '@inertiajs/vue3'


const props = defineProps({
    errors: Object
})

const form = ref({
    title: '',
    content:'',
});

const handleSubmit = () => {
    router.post('/posts', form.value);
};
</script>

<template>
    <Head title="投稿作成" />
    <App>
        <div class="row bg-light text-dark py-1">
            <div class="col-md-8 offset-md-2">
                <h2 class="fs-1 mb-5 text-center fw-bold">改善登録</h2>
                <form method="post" @submit.prevent="handleSubmit">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title" placeholder="タイトル" v-model="form.title">
                        <div v-if="errors.title" class="error">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-4">
                        <textarea class="form-control" name="content" rows="5" placeholder="内容を入力してください" v-model="form.content"></textarea>
                        <div v-if="errors.content" class="error">
                            {{ errors.content }}
                        </div>
                    </div>
                    <div class="text-center pt-4 col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-primary">
                            登録
                        </button>
                    </div>
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
