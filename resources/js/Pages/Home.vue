<template>
    <div class="py-5">
        <token-form></token-form>
        <div>
            <div v-if="this.gh_token_id">
                <h4>Your Token</h4>
                <div>{{ gh_token_id }}</div>
            </div>
            <a v-else target="_blank" class="py-5" href="https://github.com"
                >No Token? Click here to learn how to make token</a
            >
        </div>
        <repo-component
            :gh_token_id="gh_token_id"
            :starredRepos="starredRepos"
        ></repo-component>
    </div>
</template>

<script>
import PageLayout from "@/Layouts/PageLayout";
export default {
    layout: PageLayout,
    props: {
        gh_token_id: String,
        starredRepos: Array
    }
};
</script>

<style></style>
