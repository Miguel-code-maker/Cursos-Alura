<template>
	<header class="header">
      <div class="container">
        <h1 class="header__logo">Logo</h1>
        <nav class="menu">
          <ul class="menu__list">
            <li class="menu__list__itens" v-for="router in routes">
              <router-link class="link" :to="router.path? router.path : '/'">{{ router.title }}</router-link>
            </li>
          </ul>
        </nav>
      </div>
    </header>
</template>
<script>
export default {
  props: {
    routers: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      routes: this.routers.filter(route => route.menu)
    }
  }
}
</script>
<style scoped>
	.header {
    background: #ABABAB;
  }

  .container {
    display: flex;
    justify-content: space-between;
    max-width: 90%;
    margin: 0 auto;
    padding: 2rem;
  }

  .header__logo {
    font-weight: 800;
  }

  .menu__list {
    display: flex;
  }

  .menu__list__itens {
    margin: 0.5rem;
    list-style: none;
  }

  .menu__list__itens * {
    color: inherit;
    text-decoration: none;
    background: #CCCC;
    padding: 0.5rem;
  }

</style>