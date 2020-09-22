import "./bootstrap";
import Vue from "vue";
import { InertiaApp } from "@inertiajs/inertia-vue";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

// Add Ziggy Routes
Vue.prototype.$route = (...args) => route(...args).url();
Vue.mixin({
    methods: {
        route: window.route
    }
});

Vue.use(InertiaApp);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

const app = document.getElementById("app");

// Add Components load
const files = require.context("./", true, /\.vue$/i);
files.keys().map(key =>
    Vue.component(
        key
            .split("/")
            .pop()
            .split(".")[0],
        files(key).default
    )
);

new Vue({
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name => require(`./Pages/${name}`).default
            }
        })
}).$mount(app);
