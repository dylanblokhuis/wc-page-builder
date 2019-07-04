<script>
  import { components, DOM } from '../stores.js'
  import { get, writable } from 'svelte/store';
  import Menubar from './Menubar.svelte'
  let isEditorEnabled = true;

  function handleOnOpenEditor(event) {
    DOM.update(array => [...array, components[0].element])
    isEditorEnabled = event.detail
  }  
</script>

<style>
  :global(#postdivrich) {
    display: none;
  }

  .container {
    width: 100%;
    display: flex;
    margin-top: 20px;
  }

  .toolbar {
    display: flex;
  }
</style>

<Menubar on:openEditor={handleOnOpenEditor} />

{#if isEditorEnabled}
  <div class="container">
    <div class="toolbar">
      <button>+</button>
    </div>


  </div>
{/if}
