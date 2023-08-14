<script setup>
import Navbar from '@/Components/Navbar.vue'
</script>

<template>
    <Navbar/>
    <div class="container mt-5">
    <div class="row g-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <p class="card-title col-5">投稿タイトル</p>
                        <p class="col-3 ms-auto">投稿日付</p>
                    </div>
                    <p class="card-text">Some quick example text to build on the card title and make up content ああああああああああああああ
                        あああああああああああ
                    </p>
                    <div class="row">
                        <button class="btn btn-warning text-white col-3 ms-auto me-1">詳細を見る</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <img src="path_to_your_image.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title 1</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
        <!-- 2つ目のカード -->
        <div class="col-md-6">
            <div class="card">
                <img src="path_to_your_image.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title 2</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <img src="path_to_your_image.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title 2</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
    </div>

</template>
