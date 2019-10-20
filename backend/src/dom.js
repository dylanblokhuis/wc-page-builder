import { editorFrame } from './stores.js';

export const addElement = (component) => {
  let DOM;

  editorFrame.subscribe(value => {
    DOM = value;
  });

  DOM.appendChild(createElement(component));
}

const createElement = (tag) => {
  const node = document.createElement(tag);

  return node;
}