import { createApp, h } from "vue";
import { createInertiaApp ,Head } from "@inertiajs/vue3";
import NProgress from "nprogress";
import { router } from "@inertiajs/vue3";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Head',Head)
            .mount(el);
    },
    progress: {
        delay: 250,
        color: "#6B7280",
        includeCSS: true,
         showSpinner: false,
    },
      title: title => `My App- ${title}`,
});
router.on("start", () => NProgress.start());
router.on("finish", () => NProgress.done());
