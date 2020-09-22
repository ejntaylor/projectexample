<template>
    <div class="pb-5">
        <b-alert :show="this.sent">Sent</b-alert>

        <h4>Token Form</h4>
        <b-form @submit="handleForm" v-if="!this.sent" class="py-3">
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
            this.$inertia
                .post(this.$route("tokens.store"), this.form)
                .then(() => (this.sent = true));
        }
    }
};
</script>

<style></style>
