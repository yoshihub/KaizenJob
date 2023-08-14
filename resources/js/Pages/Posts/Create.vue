<script setup>
import Navbar from '@/Components/Navbar.vue'

</script>

<template>
    <Navbar/>
    <div class="container">
    <div class="container-fluid">
        <div class="row bg-light text-dark py-5">
            <div class="col-md-8 offset-md-2">
                <h2 class="fs-1 mb-5 text-center fw-bold">改善登録</h2>
                <form method="post" action="mail.php">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="お名前" placeholder="名前（必須）" value="">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="住所" placeholder="住所" value="">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="Email" placeholder="メールアドレス（必須）" value="">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="電話番号" placeholder="電話番号" value="">
                    </div>
                    <div class="mb-4">
                        <textarea class="form-control" name="お問い合わせ内容" rows="5" placeholder="メッセージを入力してください"></textarea>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                        <label class="form-check-label" for="flexCheckIndeterminate">
                            利用規約に同意します。<a href="" target="_blank" rel="noopener noreferrer" class="text-decoration-underline text-dark">プライバシーポリシーはこちら</a>
                        </label>
                    </div>
                    <div class="text-center pt-4 col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</template>
