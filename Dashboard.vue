<!-- eslint-disable vue/multi-word-component-names -->
<template>
  <div class="container mt-5">
    <div class="text-center mb-4">
      <h1 class="display-5">Welcome to the Quiz Trivia Website</h1>
      <p class="lead">Select a quiz category to begin!</p>
    </div>

    <div class="row justify-content-center">
      <div
        class="col-md-4 mb-3"
        v-for="cat in categories"
        :key="cat.id"
      >
        <div class="card shadow-sm">
          <div class="card-body text-center">
            <h5 class="card-title">{{ cat.name }}</h5>
            <button class="btn btn-primary mt-2" @click="goToQuiz(cat.id)">
              Start Quiz
            </button>
          </div>
        </div>
      </div>
    </div>

    <router-view />
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

const categories = ref([]);
const router = useRouter();

const goToQuiz = (id) => {
  router.push({ name: 'Quiz', query: { id } });
};

onMounted(async () => {
  const res = await axios.get('https://opentdb.com/api_category.php');
  categories.value = res.data.trivia_categories;
});
</script>

<style scoped>
.card {
  transition: transform 0.2s ease;
}

.card:hover {
  transform: scale(1.05);
}
</style>
