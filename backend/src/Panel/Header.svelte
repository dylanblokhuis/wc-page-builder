<script>
  import { MenuIcon } from 'svelte-feather-icons';
</script>

<style>
  header {
    background: #fff;
    height: 50px;
    display: flex;
    align-items: center;
    padding-left: 10px;
    padding-right: 10px;
  }

  header :global(svg) {
    width: 28px;
    height: 28px;
  }
</style>

<header>
  <MenuIcon />
</header>