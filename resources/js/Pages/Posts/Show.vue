<script setup>
import { router } from '@inertiajs/vue3'

defineProps({
    post: Object
})

const deleteConfirm = id => {
    router.delete(`/posts/${id}`, {
        onBefore: () => confirm('本当に削除しますか？')
    })
}
</script>

<template>
<p>{{ post.title }}</p>
<p>{{ post.content }}</p>
<button class="btn btn-danger" @click="deleteConfirm(post.id)">削除</button>
</template>
