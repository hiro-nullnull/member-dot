import { createApp } from "vue";
// import App from "./App.vue";
import store from "./store";

require("./pages/style");

const app = createApp({});
app.use(store)
app.mount("#app");
