import Editor from './Editor.svelte';

const editor = new Editor({
	target: document.querySelector('.wcpb-editor')
});

export default editor;