<template>
  <div>
    <h1>Объявления</h1>
    <table class="table">
      <thead>
      <tr>
        <th>Текст</th>
        <th>Статус</th>
        <th>Действия</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="ad in ads" :key="ad.id">
        <td>{{ ad.text }}</td>
        <td>{{ ad.status }}</td>
        <td>
          <button @click="deleteAd(ad.id)" class="btn btn-danger">Удалить</button>
        </td>
      </tr>
      </tbody>
    </table>
    <router-link to="/ads/create" class="btn btn-primary">Добавить объявление</router-link>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      ads: [],
    };
  },
  mounted() {
    this.fetchAds();
  },
  methods: {
    fetchAds() {
      axios.get('/api/ads')
          .then(response => {
            this.ads = response.data;
          })
          .catch(error => {
            console.error(error);
          });
    },
    deleteAd(id) {
      axios.delete(`/api/ads/delete/${id}`)
          .then(() => {
            this.fetchAds();
          })
          .catch(error => {
            console.error(error);
          });
    }
  }
};
</script>
