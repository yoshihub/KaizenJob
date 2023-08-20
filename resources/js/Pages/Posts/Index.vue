<script setup>
import App from '@/Components/App.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    posts: Array
})
</script>

<template>
<Head title="投稿一覧" />
<App>
    <div class="row g-3">
        <div class="col-md-6" v-for="post in posts" :key="post.id">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <p class="card-title col-5">{{ post.title }}</p>
                        <p class="col-3 ml-auto">{{ post.created_at }}</p>
                    </div>
                    <p class="card-text">
                        {{ post.content }}
                    </p>
                    <div class="row">
                        <a>詳細</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</App>

</template>
