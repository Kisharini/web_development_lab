<!-- eslint-disable vue/multi-word-component-names -->
<template>
  <div class="container mt-5">
    <div class="text-center mb-4">
      <h1 class="display-5">Quiz Trivia</h1>
    </div>

    <div v-if="questions.length > 0">
      <div
        v-for="(q, index) in questions"
        :key="index"
        class="mb-4 p-3 border rounded shadow-sm bg-light"
      >
        <p v-html="q.question" class="fw-semibold mb-3"></p>

        <div v-for="opt in q.options" :key="opt" class="form-check text-start">
          <input
            class="form-check-input"
            type="radio"
            :id="'q' + index + '-' + opt"
            :name="'q' + index"
            :value="opt"
            v-model="userAnswers[index]"
          />
          <label
            class="form-check-label"
            :for="'q' + index + '-' + opt"
            v-html="opt"
          />
        </div>
      </div>

      <div class="text-center">
        <button @click="submitQuiz" class="btn btn-primary mt-3">
          Submit Quiz
        </button>
      </div>
    </div>

    <div v-else class="text-center">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
      <p class="mt-2">Loading questions...</p>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import axios from 'axios';

const route = useRoute();
const router = useRouter();
const categoryId = route.query.id;

const questions = ref([]);
const userAnswers = ref({});

onMounted(async () => {
  if (!categoryId) {
    console.error('Missing category ID in query parameters.');
    return;
  }

  try {
    const res = await axios.get(
      `https://opentdb.com/api.php?amount=10&category=${categoryId}&type=multiple`
    );

    questions.value = res.data.results.map((q) => {
      const options = [...q.incorrect_answers, q.correct_answer];
      return {
        ...q,
        options: options.sort(() => Math.random() - 0.5)
      };
    });
  } catch (err) {
    console.error('Failed to load questions:', err);
  }
});

const submitQuiz = () => {
  let score = 0;
  questions.value.forEach((q, i) => {
    if (userAnswers.value[i] === q.correct_answer) {
      score++;
    }
  });

  router.push({ name: 'Result', query: { score } });
};
</script>

<style scoped>
.fw-semibold {
  font-weight: 600;
}
</style>
