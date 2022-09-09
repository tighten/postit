<template>
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                    <div>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">New <span class="capitalize">{{ typeKey }}</span> Item</h3>
                            <div class="my-3">
                                <p class="mt-2 text-sm text-red-600">{{ errorMessage }}</p>
                                <div class="mt-1">
                                    <input type="text" :name="typeKey" v-model="setting" id="newSetting" placeholder="ex. Blog Post" class="p-2 block w-full rounded-md border border-gray-300 shadow-sm sm:text-sm" aria-describedby="setting-description">
                                </div>
                                <p class="mt-2 text-sm text-gray-500" id="setting-description">Your input will be displayed as the option label. The option value will be created as a snake case version of the input.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                        <button @click="saveSetting" type="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-yellow px-4 py-2 text-base font-medium text-primary shadow-sm hover:bg-yellow-darker sm:col-start-2 sm:text-sm">Save</button>
                        <button @click="$emit('close')" type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 sm:col-start-1 sm:mt-0 sm:text-sm">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CreateSetting",
    props: {
        typeKey: {
            type: String,
            required: true
        }
    },
    data: () => {
        return {
            setting: '',
            errorMessage: '',
        }
    },
    methods: {
        saveSetting() {
            this.errorMessage = '';
            if(!this.setting) {
                this.errorMessage = 'Input is required.'
                return;
            }
            const state = this;

            axios.post('/tracking/settings', {
                key: state.typeKey,
                value: state.setting
            }).then((response) => {
                if(response.data.error) {
                    state.errorMessage = response.data.error;
                }
                else {
                    state.$emit('success');
                }
            });
        }
    }
}
</script>
