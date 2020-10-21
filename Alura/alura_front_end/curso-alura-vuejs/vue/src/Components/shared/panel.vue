<template>
	<div class="panel">
    <h2 class="panel__title" @dblclick="visible = !visible" >{{ title }}</h2>
    <transition name="transiction">
      <div class="panel__content" v-show="visible">
          <slot></slot>
      </div>
    </transition>
  </div>
</template>
<script>

  export default {
    props: ['title'],
    data() {
      return {
        visible: true
      }
    }
}
</script>
<style scoped>
  .panel {
	  display: flex;
	  flex-direction: column;
	  height: 100%;
    width: 100%;
  }

  .painel:hover {
  	box-shadow: 1px 1px 1px black;
	  cursor: pointer;
  }

  .panel__title {
	  font-size: 15pt;
	  text-align: center;
	  /* height: 2rem; */
	  padding: 1rem;
	  border: 1px solid black;
  }

  .panel__content {
	  display: flex;
    flex-direction: column;
    justify-content: space-between;
    justify-items: center;
	  flex-grow: 1;
    width: 100%;
    height: 100%;
  }

  .transiction-enter, .transiction-leave-active {
    opacity: 0;
    transition: opacity .4s;
  }

  .transiction-enter-active, .transiction-leave-active {
    border: none;
    transition: opacity .4s;
  }

  .panel__content {
    overflow: hidden;
    
  }


</style>