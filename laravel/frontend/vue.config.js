module.exports = {
  outputDir: '../public/assets/vue',
  filenameHashing: false,
  configureWebpack: {
    devtool: 'source-map',
    resolve: {
      alias: {
        vue$: "vue/dist/vue.esm-bundler.js"
      }
    }
  },
  devServer: {
    port: 9001
  }
};
