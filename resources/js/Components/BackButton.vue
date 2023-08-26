<script setup>
const goBack = () => {
    window.history.back();
}
</script>

<template>
    <button class="btn btn-outline-success" @click="goBack">戻る</button>
</template>
