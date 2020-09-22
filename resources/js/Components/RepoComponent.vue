<template>
    <div class="my-4">
        <b-button
            v-if="!starredRepos"
            variant="outline-primary"
            :disabled="!this.gh_token_id.length >= 1"
            @click="handleButton()"
            >Get starred repositories</b-button
        >
        <b-alert :show="this.sending" class="my-4">Getting your data</b-alert>
        <div v-if="starredRepos">
            <h4>Starred Repositories</h4>
            <ul>
                <li v-for="starredRepo in starredRepos">
                    {{ starredRepo.name }}
                </li>
            </ul>
        </div>
        <b-toast id="errors-toast" title="Error" no-auto-hide>
            Error: {{ $page.errors.message }}
        </b-toast>
    </div>
</template>

<script>
export default {
    props: {
        gh_token_id: String,
        starredRepos: Array
    },
    data() {
        return {
            sending: false
        };
    },
    methods: {
        handleButton() {
            // post with inertia
            this.sending = true;
            this.$inertia.post(this.$route("starred-repos")).then(e => {
                this.sending = false;

                // check if errors and show toast if true
                if (Object.keys(this.$page.errors).length) {
                    this.$bvToast.show("errors-toast");
                }
            });
        }
    }
};
</script>

<style></style>
