import App from './components/App.svelte';
import { DOM } from './stores';

const app = new App({
    target: document.querySelector("#post-body-content")
});

DOM.subscribe(elements => {
    let root = document.createElement("div")
    elements.forEach(element => {
        let domElement = document.createElement(element)
        root.appendChild(domElement)
    })
    console.log(root)
})

function writeToEditor(editorValue) {

}

export default app;