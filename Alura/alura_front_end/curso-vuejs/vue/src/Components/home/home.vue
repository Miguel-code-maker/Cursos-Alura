<template>
	<div>
		<h1 class="title" v-text="title"></h1>
    <h3 v-if="mensagem" class="title">{{ mensagem }}</h3>
		<input type="text" class="search" name="search" id="seach" placeholder="Pesquisar fotos" v-on:input="search = $event.target.value">
		<ul class="list">
		<li class="list__itens" v-for="foto of photosWithFilter">
			<the-panel :title="foto.titulo">
				<img-responsive :photo="foto.url" :title="foto.titulo" v-transform:scale.animate="1.2"/>
				<ready-button label="Remover" type="button" btnStyle="danger" :confirmation="true" @ButtonActive="remove(foto)"></ready-button>
        <router-link :to="{ name:'altera', params: { id: foto._id } }">
          <ready-button label="Editar imagem" type="button" btnStyle="default" :confirmation="false"></ready-button>
        </router-link>
			</the-panel>
		</li>
		</ul>
	</div>
</template>
<script>
  import Button from '../shared/button.vue';
  import Panel from '../shared/panel.vue';
  import img from '../shared/img-responsive.vue';
  import FotosServices from '../../domai/FotosServices'
  export default {
  components: {
    'the-panel': Panel,
    'img-responsive': img,
    'ready-button': Button
  },

  data() {
    return {
      title: "Alurapic",
      fotos: [],
      search: '',
      mensagem: ''
    }
  },

  created() {

    this.services = new FotosServices(this.$resource);

    this.services.list().then(fotos => this.fotos = fotos,err => this.mensagem = err.message)
  },

  computed: {
	  photosWithFilter() {
	    const SpecialCharsRegExp = /[-[\]{}()*+?.,\\^$|#\s]/g;
	    if (this.search) {
		  let exp = new RegExp(this.search.trim().replace(SpecialCharsRegExp, "\\$&"), 'i');
		  return this.fotos.filter(foto => exp.test(foto.titulo));
	    } else {
		  return this.fotos;
	    }
	  }
  },

  methods: {
	  remove(foto) {
      this.services.trash(foto._id)
      .then(() => {
        let indice = this.fotos.indexOf(foto);
        this.fotos.splice(indice, 1);
        this.mensagem = 'Foto removida com sucesso'
      },err => this.mensagem = err.mensage)
    }
  }
}

</script>
<style scoped>
  .title {
    text-align: center;
    padding: 2rem;
  }

  .search {
    position: relative;
    left: 50%;
    transform: translateX(-50%);
    margin: 1rem;
  }

  .list {
    list-style: none;
    display: flex;
    justify-items: center;
    /* justify-content: center; */
    flex-wrap: wrap;
    width: 95%;
    margin: 3rem auto;
  }

  .list__itens {
    width: 20rem;
    max-height: 25rem;
    min-height: 0;
  }
</style>