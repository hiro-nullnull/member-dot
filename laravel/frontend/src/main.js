import { createApp } from "vue";
import store from "./store";
import * as components from "./components/index";
import axios from "axios";
import VueAxios from "vue-axios";

require("./pages/style");

const app = createApp({});
app.use(store);
app.use(VueAxios, axios);

// Vueコンポーネントをグローバル登録する
Object.values(components).forEach(value => {
    app.component(value.name, value);
});

app.mount("#app");
