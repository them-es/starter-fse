const path = require( 'path' ),
	// webpack = require( 'webpack' ), // Uncomment if jQuery support is needed
	localHost = 'http://localhost/starter-fse'; // Localhost URL (webpack-dev-server)

module.exports = {
	mode: 'production',
	context: path.resolve( __dirname, 'assets' ),
	entry: [
		'./main.scss',
		'./main.js',
	],
	output: {
		path: path.resolve( __dirname, 'assets/dist' ),
		filename: '[name].bundle.js',
	},
	watch: true,
	// $ webpack serve
	/*devServer: {
		static: {
			directory: path.join( __dirname, 'assets' ),
		},
		open: true,
		compress: true,
		devMiddleware: {
			writeToDisk: true,
		},
		client: {
			overlay: false,
		},
		host: new URL( localHost ).hostname,
		proxy: {
			'*': {
				target: localHost,
				changeOrigin: true,
				rewrite: function ( path, req ) {
					return path.replace( /\/(.*?)/g, '' );
				},
			},
		},
	},*/
	module: {
		rules: [
			{
				test: /\.scss$/,
				use: [
					{
						loader: 'file-loader',
						options: {
							name: '[name].css',
						},
					},
					{
						loader: 'extract-loader',
					},
					{
						loader: 'css-loader',
						options: {
							url: false,
						},
					},
					{
						loader: 'postcss-loader',
						options: {
							postcssOptions: {
								plugins: [require('autoprefixer')],
							},
						},
					},
					{
						loader: 'sass-loader',
						options: {
							sassOptions: {
								includePaths: ['node_modules'],
							},
						},
					},
				]
			},
			{
				test: /\.(png|svg|jpg|jpeg|gif)$/i,
				type: 'asset/resource',
			},
			{
				test: /\.(woff2?|eot|ttf|otf)$/i,
				type: 'asset/resource',
			},
		]
	},
	// Uncomment if jQuery support is needed
	/*externals: {
		jquery: 'jQuery'
	},
	plugins: [
		new webpack.ProvidePlugin( {
			$: 'jquery',
			jQuery: 'jquery',
			'window.jQuery': 'jquery',
		} ),
	],*/
};
