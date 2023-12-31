<script setup>
import App from '@/Components/App.vue';
import { useFlashToast } from '@/useFlashToast.js';
import { Head,Link,router} from '@inertiajs/vue3';
import { ref } from 'vue';
import dayjs from 'dayjs';

defineProps({
    posts: Array
});

const searchParams = ref({
    keyword: null,
    date_from: null,
    date_to: null,
});

const search = () => {
    router.get('/posts',
    searchParams.value,
    {replace: true,preserveState: true});
};

const formatDate = (date) => {
    return dayjs(date).format('YYYY-MM-DD HH:mm');
}

const deleteConfirm = id => {
    router.delete(`/posts/${id}`, {
        onBefore: () => confirm('本当に削除しますか？'),
        preserveState: false,
    })
}

useFlashToast();
</script>

<template>
<Head title="投稿一覧"/>
<App>
    <div>
        <form @submit.prevent="search">
            <label for="keyword" class="me-1">キーワード</label>
            <input type="text" name="keyword" id="keyword" v-model="searchParams.keyword">
            <label class="ms-3 me-1">日付</label>
            <input type="date" name="date_from" v-model="searchParams.date_from">
            <span>〜</span>
            <input type="date" name="date_to" v-model="searchParams.date_to">
            <button class="btn btn-primary ms-3">検索</button>
        </form>
    </div>
    <div class="row g-3">
        <div class="col-md-6" v-for="post in posts" :key="post.id">
            <div class="card" style="height: 180px;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <div class="row">
                            <p class="card-title col-auto">{{ post.title }}</p>
                            <div class="dropdown col-auto ms-auto">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical" style="font-size: 17px;"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><Link class="dropdown-item" :href="`/posts/${post.id}/edit`">編集</Link></li>
                                    <li><a class="dropdown-item" @click="deleteConfirm(post.id)">削除</a></li>
                                </ul>
                            </div>
                        </div>
                        <p class="card-text textarea-enter txt-limit">
                            {{ post.content }}
                        </p>
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-1 me-2">
                    <p class="col-auto ms-auto me-3">
                        {{ formatDate(post.created_at) }}
                    </p>
                    <Link :href="route('posts.show', { id: post.id })" class="btn btn-info text-white">
                        詳細
                    </Link>
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
.txt-limit {
  overflow: hidden;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 3;
}
</style>
