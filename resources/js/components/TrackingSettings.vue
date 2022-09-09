<template>
    <div class="grid grid-cols-3 gap-4 w-full max-h-screen px-4">
        <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow overflow-y-auto">
            <div class="px-4 py-5 sm:px-6">
                <div class="flex justify-between items-center">
                    <h3>Campaigns</h3>
                    <button @click="createSetting('campaigns')" class="mt-3 inline-flex w-full items-center justify-center rounded-md border border-green-600 bg-transparent px-4 py-2 font-medium text-green-600 shadow-sm sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        <PlusIcon class-styles="h-4 w-4"/>
                        <span>New</span>
                    </button>
                </div>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <Loading :loading="loading">
                    <ul role="list" class="divide-y divide-gray-200">
                        <li  v-for="(label, value) in campaigns" :key="value" class="py-4">
                            <div class="flex justify-between items-center">
                                <div>{{ label }}</div>
                                <div class="flex items-center content-center">
                                    <button @click="updateSetting('campaigns', value)" :aria-label="'Delete ' + label" class="text-red-600">
                                        <TrashIcon class-styles="h-4 w-4"/>
                                    </button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </Loading>
            </div>
        </div>
        <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow overflow-y-auto">
            <div class="px-4 py-5 sm:px-6">
                <div class="flex justify-between items-center">
                    <h3>Sources</h3>
                    <button @click="createSetting('sources')" class="mt-3 inline-flex w-full items-center justify-center rounded-md border border-green-600 bg-transparent px-4 py-2 font-medium text-green-600 shadow-sm sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        <PlusIcon class-styles="h-4 w-4"/>
                        <span>New</span>
                    </button>
                </div>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <Loading :loading="loading">
                    <ul role="list" class="divide-y divide-gray-200">
                        <li v-for="(label, value) in sources" :key="value" class="py-4"><div class="flex justify-between items-center">
                            <div>{{ label }}</div>
                            <div class="flex items-center content-center">
                                <button @click="updateSetting('sources', value)" :aria-label="'Delete ' + label" class="text-red-600">
                                    <TrashIcon class-styles="h-4 w-4"/>
                                </button>
                            </div>
                        </div>
                        </li>
                    </ul>
                </Loading>
            </div>
        </div>
        <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow overflow-y-auto">
            <div class="px-4 py-5 sm:px-6">
                <div class="flex justify-between items-center">
                    <h3>Mediums</h3>
                    <button @click="createSetting('mediums')" class="mt-3 inline-flex w-full items-center justify-center rounded-md border border-green-600 bg-transparent px-4 py-2 font-medium text-green-600 shadow-sm sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        <PlusIcon class-styles="h-4 w-4"/>
                        <span>New</span>
                    </button>
                </div>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <Loading :loading="loading">
                    <ul role="list" class="divide-y divide-gray-200">
                        <li  v-for="(label, value) in mediums" :key="value" class="py-4"><div class="flex justify-between items-center">
                            <div>{{ label }}</div>
                            <div class="flex items-center content-center">
                                <button @click="updateSetting('mediums', value)" :aria-label="'Delete ' + label" class="text-red-600">
                                    <TrashIcon class-styles="h-4 w-4"/>
                                </button>
                            </div>
                        </div>
                        </li>
                    </ul>
                </Loading>
            </div>
        </div>
        <transition name="modal">
            <div v-if="showCreate">
                <create-setting v-on:success="success" v-on:close="showCreate = false" v-bind:typeKey="settingType"/>
            </div>
        </transition>
        <transition name="modal">
            <div v-if="showUpdate">
                <update-setting v-on:confirm="deleteSetting" v-on:close="showUpdate = false" v-bind:setting="this[this.selectedSetting.type][this.selectedSetting.value]"/>
            </div>
        </transition>
    </div>
</template>

<script>
import Loading from "./Loading";
import PlusIcon from "./icons/PlusIcon";
import PencilIcon from "./icons/PencilIcon";
import TrashIcon from "./icons/TrashIcon";
import CreateSetting from "./forms/CreateSetting";
import UpdateSetting from "./forms/UpdateSetting";

export default {
    components: {
        UpdateSetting,
        CreateSetting,
        PlusIcon,
        Loading,
        PencilIcon,
        TrashIcon
    },
    data: () => {
        return {
            loading: true,
            campaigns: {},
            sources: {},
            mediums: {},
            settingIds: {
                campaigns: null,
                sources: null,
                mediums: null
            },
            showCreate: false,
            showUpdate: false,
            settingType: null,
            selectedSetting: {},
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
                                state.settingIds.campaigns = setting.id;
                                break;
                            case 'sources':
                                state.sources = setting.value;
                                state.settingIds.sources = setting.id;
                                break;
                            case 'mediums':
                                state.mediums = setting.value;
                                state.settingIds.mediums = setting.id;
                                break;
                            default:
                                break;
                        }
                    });

                    state.loading = false;
                });
        },
        createSetting(key) {
            this.settingType = key;
            this.showCreate = true;
        },
        updateSetting(key, value) {
            this.selectedSetting = {
                type: key,
                id: this.settingIds[key],
                value: value
            };
            this.showUpdate = true;
        },
        deleteSetting() {
            let settingsList =  this[this.selectedSetting.type];
            delete settingsList[this.selectedSetting.value];

            const state = this;

            axios.patch(`/tracking/settings/${state.selectedSetting.id}`, {
                value: settingsList
                }).then((response) => {
                    console.log(response);
                    state.success();
                });
        },
        success() {
            this.showCreate = false
            this.showUpdate = false
            this.loading = true;
            this.getSettings();
        }
    },
    mounted() {
        this.getSettings();
    }
}
</script>
<style scoped>
.modal-enter-active {
    @apply ease-out duration-300;
}
.modal-enter-to {
    opacity: 1;
}
.modal-leave-active {
    @apply ease-in duration-300;
}
.modal-enter, .modal-leave-to  {
    opacity: 0;
}
</style>
