module.exports = {
  outputDir: "../public/assets/vue",
  filenameHashing: false,
  configureWebpack: {
    devtool: "source-map",
    resolve: {
      alias: {
        vue$: "vue/dist/vue.esm-bundler.js"
      }
    }
  },
  devServer: {
    port: 9001
  },
  chainWebpack: config => {
    config.module
      .rule("images")
      .use("url-loader")
      .loader("url-loader")
      .tap(options => Object.assign(options, { limit: 80240 }));
  }
};
