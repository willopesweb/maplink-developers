const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");
const CopyPlugin = require("copy-webpack-plugin");
const ImageMinimizerPlugin = require("image-minimizer-webpack-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");

const PROXY_URL = "localhost:8080";

const JS_DIR = path.resolve(__dirname, "assets/src/js");
const IMG_DIR = path.resolve(__dirname, "assets/src/img");
const FONT_DIR = path.resolve(__dirname, "assets/src/fonts");
const BUILD_DIR = path.resolve(__dirname, "assets/public");

const entry = {
  main: JS_DIR + "/main.ts",
};

const output = {
  path: BUILD_DIR,
  filename: "js/[name].js",
};

const rules = [
  {
    test: /\.ts$/,
    include: [JS_DIR],
    exclude: /node_modules/,
    use: "ts-loader",
  },
  {
    test: /\.js$/,
    include: [JS_DIR],
    exclude: /node_modules/,
    use: "babel-loader",
  },
  {
    test: /.s?css$/,
    use: [
      MiniCssExtractPlugin.loader,
      "css-loader",
      "sass-loader",
      "postcss-loader",
    ],
  },
  {
    test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
    type: "asset",
  },
  {
    test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
    exclude: [/node_modules/],
    use: {
      loader: "file-loader",
      options: {
        name: "[path][name].[ext]",
        publicPath: "production" === process.env.NODE_ENV ? "../" : "../../",
      },
    },
  },
];

const plugins = (argv) => [
  new CleanWebpackPlugin({
    // Automatically remove all unused webpack asstes on rebuil
    // false in development, true in production
    cleanStaleWebpackAssets: argv.mode === "production",
  }),

  new MiniCssExtractPlugin({
    filename: "css/[name].css",
  }),

  require("autoprefixer"),

  new CopyPlugin({
    patterns: [
      { from: FONT_DIR, to: BUILD_DIR + "/fonts" },
      { from: IMG_DIR, to: BUILD_DIR + "/img" },
    ],
  }),
  new ImageMinimizerPlugin({
    minimizer: {
      implementation: ImageMinimizerPlugin.imageminMinify,
      options: {
        // Lossless optimization with custom option
        // Feel free to experiment with options for better result for you
        plugins: [
          ["gifsicle", { interlaced: true }],
          ["jpegtran", { progressive: true }],
          ["optipng", { optimizationLevel: 5 }],
          [
            "svgo",
            {
              name: "preset-default",
              params: {
                overrides: [
                  {
                    name: "removeViewBox",
                    active: false,
                  },
                  {
                    name: "addAttributesToSVGElement",
                    params: {
                      attributes: [{ xmlns: "http://www.w3.org/2000/svg" }],
                    },
                  },
                ],
              },
            },
          ],
        ],
      },
    },
  }),

  new BrowserSyncPlugin({
    //host: 'localhost', // browse to http://localhost:3000/ during development, ./public directory is being served
    //server: { baseDir: ['public'] },
    port: 3000,
    proxy: PROXY_URL,
    files: ["./*php", "./**/*.php"],
    injectChanges: true,
  }),
];

module.exports = (env, argv) => ({
  entry: entry,
  output: output,
  //devtool: 'source-map',
  resolve: {
    extensions: [".ts", ".js"],
  },
  module: {
    rules: rules,
  },
  optimization: {
    minimizer: [new CssMinimizerPlugin(), new TerserPlugin()],
  },
  plugins: plugins(argv),
});
