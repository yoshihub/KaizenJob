<script setup>
import App from '@/Components/App.vue';
import BackButton from '@/Components/BackButton.vue';
import { Head, router } from '@inertiajs/vue3';


defineProps({
    post: Object,
})

const deleteConfirm = id => {
    router.delete(`/posts/${id}`, {
        onBefore: () => confirm('本当に削除しますか？')
    })
}

</script>

<template>
<App>
<Head title="改善詳細"/>
<h3 class="mt-2">改善詳細</h3>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
    <BackButton :url="'/posts'"/>
    <p class="m-0 p-2">タイトル</p>
    <hr class="mt-0">
    <p>{{ post.title }}</p>
    <p class="m-0 p-2">改善内容</p>
    <hr class="mt-0">
    <p>{{ post.content }}</p>
    <button class="btn btn-danger" @click="deleteConfirm(post.id)">削除</button>
</div>
</div>
</div>
</div>
</App>
</template>
