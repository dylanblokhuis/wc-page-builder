<script>
  import Header from './Header.svelte';
  import { addElement } from '../dom.js';
  import { onMount } from 'svelte';

  let components = [];


  onMount(async () => {
    const request = await fetch(`${window.wcpb_object.plugin_url}/backend/src/components.json`);

    components = await request.json();
  });

  function handleOnClick(element) {
    // document.createElement based on a JSON file
    addElement(element.tag);
  }
</script>

<Header />

<style>
  .components {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }

  .components .component-wrapper {
    width: 100%;
    height: 100px;
    padding: 5px;
  }

  .components .component-wrapper .component {
    background: red;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
  }
</style>

<div class="components">
  {#each components as element}
    <div class="component-wrapper">
      <div class="component" on:click={() => handleOnClick(element)}>
        <p>{element.name}</p>
      </div>
    </div>
  {/each}
</div>