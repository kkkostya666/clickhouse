<template>
  <div>
    <h1>Создать объявление</h1>
    <form @submit.prevent="createAd">
      <div class="form-group">
        <label for="text">Текст</label>
        <input type="text" id="text" v-model="text" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="status">Статус</label>
        <select id="status" v-model="status" class="form-control">
          <option value="pending">В ожидании</option>
          <option value="active">Активен</option>
        </select>
      </div>
      <button type="submit" class="btn btn-success">Создать</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      text: '',
      status: 'pending',
    };
  },
  methods: {
    createAd() {
      axios.post('/api/ads', {
        text: this.text,
        status: this.status
      })
          .then(() => {
            this.$router.push('/ads');
          })
          .catch(error => {
            console.error(error);
          });
    }
  }
};
</script>
