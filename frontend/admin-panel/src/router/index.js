import Vue from 'vue';
import Router from 'vue-router';
import Campaigns from '../components/Campaigns.vue';
import CreateCampaign from '../components/CreateCampaign.vue';
import Ads from '../components/Ads.vue';
import CreateAd from '../components/CreateAd.vue';

Vue.use(Router);

export default new Router({
    routes: [
        { path: '/campaigns', component: Campaigns },
        { path: '/campaigns/create', component: CreateCampaign },
        { path: '/ads', component: Ads },
        { path: '/ads/create', component: CreateAd },
    ]
});
