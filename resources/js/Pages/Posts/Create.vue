<script setup>
import App from '@/Components/App.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
    <Head title="投稿作成" />
    <App>
        <div class="row bg-light text-dark py-1">
            <div class="col-md-8 offset-md-2">
                <h2 class="fs-1 mb-5 text-center fw-bold">改善登録</h2>
                <form method="post" action="mail.php">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="タイトル" placeholder="タイトル" value="">
                    </div>
                    <div class="mb-4">
                        <textarea class="form-control" name="改善内容" rows="5" placeholder="内容を入力してください"></textarea>
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
