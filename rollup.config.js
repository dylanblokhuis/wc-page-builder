import svelte from "rollup-plugin-svelte";
import resolve from 'rollup-plugin-node-resolve';
import commonjs from "rollup-plugin-commonjs";
import babel from 'rollup-plugin-babel';
import typescript from 'rollup-plugin-typescript2';
import { terser } from 'rollup-plugin-terser';
import postcss from 'rollup-plugin-postcss';

const production = !process.env.ROLLUP_WATCH;

export default [
	{
		input: ['frontend/src/index.ts'],
		output: {
			file: 'frontend/build/index.js',
			format: 'iife',
			name: "index",
			sourcemap: true
		},
		plugins: [
			resolve({
				browser: true
			}),
			commonjs(),
			babel(),
			typescript({
				tsconfig: "tsconfig.frontend.json"
			}),
			postcss({
				plugins: [
					require('cssnano')({
						preset: 'default'
					})
				]
			}),

			production && terser()
		]
	},
	{
		input: ['backend/src/main.js'],
		output: {
			file: 'backend/build/index.js',
			format: 'iife',
			name: "index",
			sourcemap: true
		},
		plugins: [
			svelte({
				// enable run-time checks when not in production
				dev: !production,
				// we'll extract any component CSS out into
				// a separate file — better for performance
				css: css => {
					css.write("backend/build/bundle.css");
				},
			}),
			resolve({
				browser: true
			}),
			commonjs(),
			postcss({
				plugins: [
					require('cssnano')({
						preset: 'default'
					})
				]
			}),

			production && terser()
		]
	}
];