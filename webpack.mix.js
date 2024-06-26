const mix = require( 'laravel-mix' );

mix.js( 'src/assets/js/admin.js', 'assets/js' )
	.js( 'src/assets/js/app.js', 'assets/js' )
	.sass(
		'src/assets/scss/style.scss',
		'assets/css',
		[],
		[ require( 'postcss-import' ), require( 'autoprefixer' ) ]
	)
	.sass(
		'src/assets/scss/style-rtl.scss',
		'assets/css',
		[],
		[
			require( 'postcss-import' ),
			require( 'rtlcss' ),
			require( 'autoprefixer' ),
		]
	)
	.js( 'src/assets/widgets/hello/js/widget.js', 'assets/widgets/hello/js' )
	.sass(
		'src/assets/widgets/hello/scss/widget.scss',
		'assets/widgets/hello/css',
		[],
		[ require( 'postcss-import' ), require( 'autoprefixer' ) ]
	)
	.sass(
		'src/assets/widgets/hello/scss/widget-rtl.scss',
		'assets/widgets/hello/css',
		[],
		[
			require( 'postcss-import' ),
			require( 'rtlcss' ),
			require( 'autoprefixer' ),
		]
	);
