<script setup>
import App from '@/Components/App.vue';
import BackButton from '@/Components/BackButton.vue';
import { Head, router, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import { useFlashToast } from '@/useFlashToast.js';
import dayjs from 'dayjs';


const props = defineProps({
    post: Object,
    errors: Object,
})

const selectedComment = ref({});
const selectedCommentCopy = ref({});

const selectComment = (comment) => {
    selectedComment.value = comment;
    selectedCommentCopy.value = { ...selectedComment.value };
    var myModal = new bootstrap.Modal(document.getElementById('editCommentModal'));
    myModal.show();
};

const updateComment = () => {
    router.put(`/post_comments/${selectedCommentCopy.value.id}`,
    {'comment': selectedCommentCopy.value.comment },
    { preserveState: false ,preserveScroll: true });

    var myModalEl = document.getElementById('editCommentModal');
    var myModal = bootstrap.Modal.getInstance(myModalEl);
    myModal.hide();
};

const deleteConfirm = id => {
    router.delete(`/posts/${id}`, {
        onBefore: () => confirm('本当に削除しますか？')
    })
}

const deleteComment = id => {
    router.delete(`/post_comments/${id}`, {
        onBefore: () => confirm('本当に削除しますか？'),
        preserveState: false,
        preserveScroll: true,
    })
}

const form = ref({
    comment: '',
    post_id: props.post.id,
});

const handleSubmit = () => {
    router.post('/post_comments', form.value, { preserveState: false, preserveScroll: true });
};

const formatDate = (date) => {
    return dayjs(date).format('YYYY-MM-DD HH:mm');
}

useFlashToast();
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
    <div class="d-flex justify-content-end">
    <div class="d-flex mb-2">
        <span class="me-4">{{ formatDate(props.post.created_at) }}</span>
        <div class="dropdown">
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
    </div>
    <p>投稿者：{{ $page.props.auth.user.name }}</p>
    <hr>
    <p>タイトル：{{ props.post.title }}</p>
    <hr>
    <p>改善内容</p>
    <p class="textarea-enter">{{ props.post.content }}</p>
</div>
</div>
</div>
</div>

<h5 class="mt-2">コメント</h5>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
    <form method="post" @submit.prevent="handleSubmit">
        <textarea type="text" class="form-control" name="comment" placeholder="コメントを入力してください" v-model="form.comment" rows="4" style="padding-right: 50px;"></textarea>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success mt-1">
                コメント送信
            </button>
        </div>
        <div v-if="errors.comment" class="error">
            {{ errors.comment }}
        </div>
    </form>


    <h4>コメント一覧</h4>
    <div class="card mb-2" v-for="post_comment in props.post.post_comments" :key="post_comment.id">
        <p class="ps-3 pt-2">
            <span class="fw-bold">{{ post_comment.user.name }}</span>
            <span v-if="post_comment.user_id === $page.props.auth.user.id">
                <a @click="selectComment(post_comment)" style="cursor:pointer">
                    <i class="fa-solid fa-pen ms-4" style="color: #80d270;"></i>
                </a>
                <a @click="deleteComment(post_comment.id)" style="cursor:pointer">
                    <i class="fa-solid fa-trash-can ms-2" style="color: #80d270;"></i>
                </a>
            </span>
            <small class="ms-5">{{ formatDate(post_comment.created_at) }}</small>
        </p>
        <div class="card-body pt-0">
            <p class="card-text textarea-enter">{{ post_comment.comment }}</p>
        </div>
    </div>

    <!-- 編集モーダル -->
    <div class="modal fade" id="editCommentModal" tabindex="-1" aria-labelledby="editCommentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editCommentModalLabel">コメントを編集</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <textarea class="form-control" v-model="selectedCommentCopy.comment" rows="5"></textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
            <button type="button" class="btn btn-primary" @click="updateComment">更新</button>
        </div>
        </div>
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
.error {
    color: red;
}
</style>
