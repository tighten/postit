<template>
    <div class="grid grid-cols-3 gap-4 w-full max-h-screen px-4">
        <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow overflow-y-auto">
            <div class="px-4 py-5 sm:px-6">
                <div class="flex justify-between items-center">
                    <h3>Campaigns</h3>
                    <button @click="createSetting = true" class="mt-3 inline-flex w-full items-center justify-center rounded-md border border-green-600 bg-transparent px-4 py-2 font-medium text-green-600 shadow-sm sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
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
                                    <button :aria-label="'Edit ' + label" class="px-2 text-yellow">
                                        <PencilIcon class-styles="h-4 w-4"/>
                                    </button>
                                    <button :aria-label="'Delete ' + label" class="text-red-600">
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
        <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow overflow-y-auto">
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
        <transition name="modal">
            <div v-if="createSetting">
                <create-setting v-on:close="createSetting = false"/>
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

export default {
    components: {
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
            createSetting: false,
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
        createSetting(key) {
            //
        },
        updateSetting(key, value) {
            //
        },
        deleteSetting(key, value) {
            //
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
