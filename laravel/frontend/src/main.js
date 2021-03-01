import { createApp } from "vue";
import store from "./store";
// import components from "./components/index";

require("./pages/style");

const app = createApp({});
app.use(store);

// Vueコンポーネントをグローバル登録する

app.mount("#app");
