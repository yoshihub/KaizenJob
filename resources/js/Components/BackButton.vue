<script setup>
import { router } from '@inertiajs/vue3';

const props = defineProps({
    url:String
});

const goBack = () => {
    router.visit(props.url);
};
</script>

<template>
    <button class="btn btn-outline-success" @click="goBack">戻る</button>
</template>
