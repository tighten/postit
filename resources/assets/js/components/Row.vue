<template>
    <tr>
        <td class="text-right pr-8">
            <a :href="this.post.url" class="no-underline hover:underline text-sm font-normal text-grey-darkest">{{ this.post.title }}</a>
        </td>
        <td v-for="target in this.targets">
            <input type="checkbox">
        </td>
    </tr>
</template>

<script>
    export default {
        props: [
            'post',
            'targets'
        ],

        mounted() {
        }
    }
</script>
