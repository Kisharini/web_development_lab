<!-- eslint-disable vue/multi-word-component-names -->
<template>
  <div class="container text-center mt-5">
    <div class="card shadow p-4">
    <h1 class="display-5 mb-3">Your Score: {{ score }} / 10</h1>
    <button @click="goHome" class="btn btn-success">Go Back</button>
  </div>
  </div>
</template>

<script setup>
import { useRouter, useRoute } from 'vue-router';

const route = useRoute();
const router = useRouter();
const score = route.query.score || 0;

const goHome = () => {
  router.push('/dashboard');
};
</script>
