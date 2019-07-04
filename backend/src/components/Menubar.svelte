<script>

  import { createEventDispatcher } from 'svelte';

  const dispatch = createEventDispatcher();
</script>

<style>
  button {
    margin-top: 10px;
    padding: 12.5px;
    border-radius: 15px;
    background: #5c6ac4;
    border: none;
    color: white;
    transition: 100ms;
  }

  button:hover {
    transform: scale(1.02)
  }
</style>

<button on:click|preventDefault={() => dispatch('openEditor', true)}>WC Editor</button>
<button on:click|preventDefault={() => dispatch('openEditor', false)}>Classic Editor</button>