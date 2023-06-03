require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import Toaster from "@meforma/vue-toaster";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

const app = createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        let myApp = createApp({ render: () => h(app, props) })
            .use(plugin).use(Toaster)
            .mixin({
                methods: { route }
            })
        myApp.config.globalProperties.$window = window;
        myApp.mount(el);
        return myApp
    },
});
InertiaProgress.init({ color: '#4B5563' });
