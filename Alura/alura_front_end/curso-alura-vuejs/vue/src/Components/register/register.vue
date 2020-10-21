<template>
  <div class="register">
	<h1 class="centralizado">Cadastro</h1>
	<h2 v-if="!this.id" class="centralizado">Incluindo</h2>
  <h2 v-else class="centralizado">Alterando</h2>

	<form>
	  <div class="controle">
		<label for="titulo">TÍTULO</label>
		<input id="titulo" autocomplete="off" v-model.lazy="fotos.titulo">
	  </div>

	  <div class="controle">
		<label for="url">URL</label>
		<input id="url" autocomplete="off" v-model.lazy="fotos.url">
		<img-responsive :v-show="fotos.url" :photo="fotos.url" :title="fotos.titulo"/>
	  </div>
    <!-- @input="fotos.url = $event.target.value" :value="fotos.url" é indentico a v-model -->
	  <div class="controle">
		<label for="descricao">DESCRIÇÃO</label>
		<textarea id="descricao" autocomplete="off" rows="10" v-model="fotos.desc"></textarea>
	  </div>

	  <div class="centralizado">
		<ready-button @click.prevent.native="record()" label="GRAVAR" type="submit"/>
		<router-link to="/"><ready-button label="VOLTAR" type="button"/></router-link>
	  </div>

	</form>
  </div>
</template>

<script>

  import Img from '../shared/img-responsive.vue'
  import Button from '../shared/button.vue';
  import Foto from '../../domai/Foto';
  import FotosServices from '../../domai/FotosServices'

  export default {

    components: {

    'img-responsive': Img, 
    'ready-button': Button
    },

    data() {
      return {
        fotos: new Foto(),
        id: this.$route.params.id
      }
    },

    methods: {
      record() {
        this.services.rigister(this.fotos).then(() => {
          if (this.id) {
            this.$router.push({name: 'home'})
          }
          this.fotos = new Foto()
        }, err => console.log(err));
      }
    },

    created() {
      this.services = new FotosServices(this.$resource);

      if(this.id) {
        this.services.get(this.id).then(foto => this.fotos = foto);
      }
    }
  }

</script>
<style scoped>
	.register {
		width: 80%;
		margin: 0 auto;
	}

	textarea {
		width: 50%;
	}

	input, textarea {
		border: 1px solid black;
		padding: 0.5rem;
		box-shadow: 1px 1px 2px black;
	}

  .centralizado {
    text-align: center;
    margin: 2rem;
  }
  .controle {
    font-size: 1.2em;
    margin-bottom: 20px;

  }
  .controle label {
    display: block;
    font-weight: bold;
  }

	label {
		margin-top: 2rem;
	}

 .controle label + input, .controle  {
    width: 100%;
    font-size: inherit;
    border-radius: 5px
  }

  .centralizado {
    text-align: center;
  }

</style>