<template>
    <div class="relative" :class="{ 'overflow-hidden': loading }">
        <div
            v-if="loading"
            class="flex items-center justify-center z-30 p-6"
            style="min-height: 150px"
        >
            <LoadIcon class="text-gray-300" />
        </div>

        <slot v-else />
    </div>
</template>

<script>
import LoadIcon from "./icons/LoadIcon";

export default {
    components: {
        LoadIcon
    },
    props: {
        loading: {
            type: Boolean,
            default: true,
        },
    },
}
</script>
