<template>
    <div>
        <b-alert :show="this.sent">Sent</b-alert>

        <b-form @submit="handleForm" class="py-5" v-if="!this.sent">
            <b-form-group
                id="input-group-1"
                label="Github Token:"
                label-for="input-1"
            >
                <b-form-input
                    id="input-1"
                    v-model="form.gh_token_id"
                    type="text"
                    required
                    placeholder="Enter token"
                ></b-form-input>
            </b-form-group>

            <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                gh_token_id: ""
            },
            sent: false
        };
    },
    methods: {
        handleForm(e) {
            e.preventDefault();
            console.log("form" + this.form.token);

            this.$inertia
                .post(this.$route("tokens.store"), this.form)
                .then(() => (this.sent = true));
        }
    }
};
</script>

<style></style>
