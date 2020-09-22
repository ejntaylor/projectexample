<template>
    <div class="py-5">
        <token-form></token-form>
        <div>
            <div v-if="this.gh_token_id">
                <span class="font-bold">Your Token: </span>{{ gh_token_id }}
            </div>
            <a v-else target="_blank" class="py-5" href="https://github.com"
                >No Token? Click here to learn how to make token</a
            >
        </div>
    </div>
</template>

<script>
import PageLayout from "@/Layouts/PageLayout";
export default {
    layout: PageLayout,
    props: {
        gh_token_id: String
    }
};
</script>

<style></style>
