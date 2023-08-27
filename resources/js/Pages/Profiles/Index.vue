<script setup>
import App from '@/Components/App.vue';
import { Head, Link } from '@inertiajs/vue3';
import { useFlashToast } from '@/useFlashToast.js';

useFlashToast();
</script>

<template>
<Head title="プロフィール"/>
<App>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
    <h2 class="my-3">プロフィール</h2>
    <div class="row">
    <div class="col-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>お名前</td>
                    <td>{{ $page.props.auth.user.name }}</td>
                </tr>
                <tr>
                    <td>メールアドレス</td>
                    <td>{{ $page.props.auth.user.email }}</td>
                </tr>
            </thead>
        </table>
        <Link href="/profile/create" class="btn btn-secondary me-2">プロフィールを編集</Link>
        <Link href="/password_update" class="btn btn-success">パスワードを変更</Link>
    </div>
    </div>
</div>
</div>
</div>
</div>
</App>

</template>
