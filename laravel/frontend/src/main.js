import { createApp } from "vue";
import store from "./store";
import * as components from "./components/index";

require("./pages/style");

const app = createApp({});
app.use(store);

// Vueコンポーネントをグローバル登録する
Object.values(components).forEach(value => {
    app.component(value.name, value);
});

app.mount("#app");
