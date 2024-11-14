<template>
  <div>
    <h1>Создать кампанию</h1>
    <form @submit.prevent="createCampaign">
      <div class="form-group">
        <label for="title">Название</label>
        <input type="text" id="title" v-model="title" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="status">Статус</label>
        <select id="status" v-model="status" class="form-control">
          <option value="active">Активен</option>
          <option value="inactive">Неактивен</option>
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
      title: '',
      status: 'active',
      user_id: '1',
    };
  },
  methods: {
    createCampaign() {
      axios.post('/api/campaigns/create', {
        title: this.title,
        status: this.status,
        user_id: this.user_id
      })
          .then(() => {
            this.$router.push('/campaigns');
          })
          .catch(error => {
            console.error(error);
          });
    }
  }
};
</script>
