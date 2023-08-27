import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import 'vue-toast-notification/dist/theme-sugar.css';
import VueToast from 'vue-toast-notification';

createInertiaApp({
resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
},
setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
    .use(plugin)
    .use(ZiggyVue, Ziggy)
    .use(VueToast)
    .mount(el)
},
})
