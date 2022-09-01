<template>
    <div class="grid grid-cols-3 gap-4 w-full px-4">
        <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow max-h-96 overflow-y-auto">
            <div class="px-4 py-5 sm:px-6">
                Campaigns
            </div>
            <div class="px-4 py-5 sm:p-6">
                <Loading :loading="loading">
                    <ul role="list" class="divide-y divide-gray-200">
                        <li  v-for="(label, value) in campaigns" :key="value" class="py-4">
                            {{ label }}
                        </li>
                    </ul>
                </Loading>
            </div>
        </div>
        <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow max-h-96 overflow-y-auto">
            <div class="px-4 py-5 sm:px-6">
                Sources
            </div>
            <div class="px-4 py-5 sm:p-6">
                <Loading :loading="loading">
                    <ul role="list" class="divide-y divide-gray-200">
                        <li  v-for="(label, value) in sources" :key="value" class="py-4">
                            {{ label }}
                        </li>
                    </ul>
                </Loading>
            </div>
        </div>
        <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow max-h-96 overflow-y-auto">
            <div class="px-4 py-5 sm:px-6">
                Mediums
            </div>
            <div class="px-4 py-5 sm:p-6">
                <Loading :loading="loading">
                    <ul role="list" class="divide-y divide-gray-200">
                        <li  v-for="(label, value) in mediums" :key="value" class="py-4">
                            {{ label }}
                        </li>
                    </ul>
                </Loading>
            </div>
        </div>
    </div>
</template>

<script>
import Loading from "./Loading";

export default {
    components: {Loading},
    data: () => {
        return {
            loading: true,
            campaigns: {},
            sources: {},
            mediums: {}
        }
    },
    methods: {
        getSettings() {
            let state = this;

            axios.get('/tracking/settings')
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
                })
                .catch(function (error) {
                    console.log(error);
                })
                .then(function () {
                    state.loading = false;
                });
        },
    },
    mounted() {
        this.getSettings();
    }
}
</script>
