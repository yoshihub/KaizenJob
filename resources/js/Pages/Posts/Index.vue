<script setup>
import App from '@/Components/App.vue';
import { Head } from '@inertiajs/vue3';

</script>

<template>
<Head title="投稿一覧" />
<App>
    <div class="container">
    <div class="row g-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <p class="card-title col-5">投稿タイトル</p>
                        <p class="col-3 ml-auto">投稿日付</p>
                    </div>
                    <p class="card-text">Some quick example text to build on the card title and make up content ああああああああああああああ
                        あああああああああああ
                    </p>
                    <div class="row">
                        <button class="btn btn-warning text-white col-3 ml-auto me-1">詳細を見る</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <img src="" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title 1</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <img src="" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title 2</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <img src="" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title 2</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</App>

</template>
