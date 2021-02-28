module.exports = {
  outputDir: '../public/vue',
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
    port: 9001,
    proxy: {
      '/': {
        target: 'http://localhost:10080',
      }
    }
  }
};
