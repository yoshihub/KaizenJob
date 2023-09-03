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
            <label for="keyword">キーワード</label>
            <input type="text" name="keyword" id="keyword" v-model="searchParams.keyword">
            <label>日付</label>
            <input type="date" name="date_from" v-model="searchParams.date_from">
            <span>〜</span>
            <input type="date" name="date_to" v-model="searchParams.date_to">
            <button class="btn btn-primary">検索</button>
        </form>
    </div>
    <div class="row g-3">
        <div class="col-md-6" v-for="post in posts" :key="post.id">
            <div class="card" style="height: 200px;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <div class="row">
                            <p class="card-title col-5">{{ post.title }}</p>
                            <p class="col-auto ms-auto">
                                {{ formatDate(post.created_at) }}
                            </p>
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
                    <div class="row mt-auto">
                        <div class="col-3 ms-auto">
                            <Link :href="route('posts.show', { id: post.id })" class="btn btn-primary px-3">
                                詳細
                            </Link>
                        </div>
                    </div>
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
