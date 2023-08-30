<script setup>
import App from '@/Components/App.vue';
import BackButton from '@/Components/BackButton.vue';
import { Head, router, Link } from '@inertiajs/vue3';


const props = defineProps({
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
<BackButton :url="'/posts'"/>
<Head title="改善詳細"/>
<h3 class="mt-3">改善詳細</h3>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
    <div class="row">
        <span class="col-3 m-0 p-2">タイトル</span>
        <div class="dropdown col-auto ms-auto">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="fa-solid fa-ellipsis-vertical"
                style="font-size: 17px;"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><Link class="dropdown-item" :href="`/posts/${props.post.id}/edit`">編集</Link></li>
                <li><a class="dropdown-item"
                    @click="deleteConfirm(props.post.id)">削除</a></li>
            </ul>
        </div>
    </div>

    <hr class="mt-0">
    <p>{{ props.post.title }}</p>
    <p class="m-0 p-2">改善内容</p>
    <hr class="mt-0">
    <p class="textarea-enter">{{ props.post.content }}</p>
</div>
</div>
</div>
</div>
</App>
</template>

<style scoped>
.dropdown-toggle {
    background: none;
    border: none;
}
.dropdown-toggle::after {
    display: none;
}
.textarea-enter{
    white-space: pre-line;
}
</style>
