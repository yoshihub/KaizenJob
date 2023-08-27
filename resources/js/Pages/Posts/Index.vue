<script setup>
import App from '@/Components/App.vue';
import { useFlashToast } from '@/useFlashToast.js';
import { Head,Link } from '@inertiajs/vue3';
import dayjs from 'dayjs';

defineProps({
    posts: Array
});

const formatDate = (date) => {
    return dayjs(date).format('YYYY-MM-DD HH:mm');
}

useFlashToast();
</script>

<template>
<Head title="投稿一覧"/>
<App>
    <div class="row g-3">
        <div class="col-md-6" v-for="post in posts" :key="post.id">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <p class="card-title col-5">{{ post.title }}</p>
                        <p class="col-3 ms-auto">
                            {{ formatDate(post.created_at) }}
                        </p>
                    </div>
                    <p class="card-text">
                        {{ post.content }}
                    </p>
                    <div class="row">
                        <div class="col-3 ms-auto">
                        <Link :href="route('posts.show', { id: post.id })"
                        class="btn btn-primary px-3">
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
