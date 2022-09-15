<template>
    <div>
        <Loading :loading="loading">
            <div class="flex flex-col gap-4">
                <div>
                    <label for="base_url" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input v-model="baseURL" type="url" name="base_url" id="base_url" class="block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" placeholder="https://tighten.com" aria-describedby="base_url_description">
                    </div>
                    <p class="mt-2 text-sm text-gray-500" id="base_url_description">The full URL of the page where traffic is being sent. Don't forget to include https://</p>
                </div>

                <div>
                    <label for="campaign" class="block text-sm font-medium text-gray-700">Campaign</label>
                    <select v-model="campaign" id="campaign" name="campaign" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base sm:text-sm">
                        <option v-for="(label, value) in campaigns" :key="value" value="value">{{ label }}</option>
                    </select>
                </div>

                <div>
                    <label for="source" class="block text-sm font-medium text-gray-700">Source</label>
                    <select v-model="source" id="source" name="source" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base sm:text-sm">
                        <option v-for="(label, value) in sources" :key="value" value="value">{{ label }}</option>
                    </select>
                </div>

                <div>
                    <label for="medium" class="block text-sm font-medium text-gray-700">Medium</label>
                    <select v-model="medium" id="medium" name="medium" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base sm:text-sm">
                        <option v-for="(label, value) in mediums" :key="value" value="value">{{ label }}</option>
                    </select>
                </div>

                <div>
                    {{ trackingURL }}
                </div>
            </div>
        </Loading>
    </div>
</template>

<script>
import Loading from "./Loading";

export default {
    name: "Tracking",
    components: {
        Loading
    },
    data: () => {
        return {
            loading: true,
            campaigns: {},
            sources: {},
            mediums: {},
            baseURL: null,
            campaign: null,
            source: null,
            medium: null
        }
    },
    computed: {
        trackingURL() {
            const trackingParams = new URLSearchParams({
                'utm_campaign': this.campaign,
                'utm_source': this.source,
                'utm_medium': this.medium,
            });


            return `${this.baseURL}?${trackingParams.toString()}`;
        }
    },
    methods: {
        getSettings() {
            let state = this;

            axios.get('/api/tracking-settings')
                .then(function (response) {
                    response.data.forEach((setting) => {
                        switch (setting.key) {
                            case 'campaigns':
                                state.campaigns = setting.value;
                                break;
                            case 'sources':
                                state.sources = setting.value;
                                break;
                            case 'mediums':
                                state.mediums = setting.value;
                                break;
                            default:
                                break;
                        }
                    });

                    state.loading = false;
                });
        }
    },
    mounted() {
        this.getSettings();
    }
}
</script>
