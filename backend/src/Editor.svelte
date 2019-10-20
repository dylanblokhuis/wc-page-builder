<script>
	import { onMount } from 'svelte';
	import { editorFrame } from './stores.js';
	import Panel from './Panel/Index.svelte';

	let iframe;
	let site = 'http://localhost/wordpress/';

	onMount(() => {
		iframe.onload = () => {
			let root = iframe.contentWindow.document.getElementById("page-builder-root");

			editorFrame.set(root);
		}
	});
</script>

<style>
:global(*) {
	position: relative;
	margin: 0;
	padding: 0;
	-webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
	box-sizing: border-box;
}

:global(html, body) {
	width: 100%;
	height: 100%;
}

.editor {
	display: flex;
	flex-wrap: wrap;
	height: 100%;
}

aside {
	width: 300px;
	background: rgb(250, 250, 250);
}

.site {
	flex: 1;
	overflow: hidden;
}

.site iframe {
	width: 100%;
	height: 100%;
	border: none;
}


</style>

<div class="editor">
	<aside>
		<Panel />
	</aside>
	<div class="site">

		<iframe bind:this={iframe} title="Editing site: {site}" src={site}>
		
		</iframe>
	</div>

</div>
