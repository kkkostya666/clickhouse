<template>
  <div>
    <h1>Кампании</h1>
    <table class="table">
      <thead>
      <tr>
        <th>Название</th>
        <th>Статус</th>
        <th>Действия</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="campaign in campaigns" :key="campaign.id">
        <td>{{ campaign.title }}</td>
        <td>{{ campaign.status }}</td>
        <td>
          <button @click="deleteCampaign(campaign.id)" class="btn btn-danger">Удалить</button>
        </td>
      </tr>
      </tbody>
    </table>
    <router-link to="/campaigns/create" class="btn btn-primary">Добавить кампанию</router-link>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      campaigns: [],
    };
  },
  mounted() {
    this.fetchCampaigns();
  },
  methods: {
    fetchCampaigns() {
      axios.get('/api/campaigns/')
          .then(response => {
            this.campaigns = response.data;
          })
          .catch(error => {
            console.error(error);
          });
    },
    deleteCampaign(id) {
      axios.delete(`/api/campaigns/${id}`)
          .then(() => {
            this.fetchCampaigns();
          })
          .catch(error => {
            console.error(error);
          });
    }
  }
};
</script>
