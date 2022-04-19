<template>
  <div>
    <header-app></header-app>
    
    <div class="content-wrapper">
      <section
        class="content"
      >
        <div class="col-lg-7 desc-aten">
          <div>
            <strong>Novo contato </strong>
            <hr style="color:#0071bb ; height:2px; width:320px">
          </div>
        </div>

        <div class="col-lg-7">
          <hr />
          <form id="incluir_itens">
          <div class="err-camp">
            <p v-if="errors.length">
            <ul>
              <li v-for="error in errors">{{ error }}</li>
            </ul>
            </p>
          </div>
            <div class="row">
              <br />
              <div class="col-md-12">
                <label>Nome</label>
                <input
                  style="color: #363838; background-color: #ebecf0!important; border: solid #ebecf0 "
                  class="form-control"
                  v-model="nome"
                  name="nome"
                  placeholder="Nome"
                ></input>
                <br>
                <label>E-mail</label>
                <input
                  style="color: #363838; background-color: #ebecf0!important; border: solid #ebecf0 "
                  class="form-control"
                  name="email"
                  v-model="email"
                  placeholder="E-mail"
                ></input>
                <br>
                 <label>Endereço</label>
                <input
                  style="color: #363838; background-color: #ebecf0!important; border: solid #ebecf0 "
                  class="form-control"
                  v-model="endereco"
                  placeholder="Rua, Cidade, CEP ..."
                 
                ></input>
              </div>
            </div>
            <br/>
            <div class="col-md-4" id="div_botao">
             <router-link to="/home"> 
              <button
                type="button"
                @click="createAtt"
                class="btn btn-sm btn-danger btn-block"
                style="font-size: 20px; background-color: #0071bb!important; border: none;"
              >
                Salvar
              </button>
              </router-link>
            </div>
            <hr>
          </form> 
        </div>       
      </section>
    </div>
  </div>
</template>
<script>
import header from "../../components/header/header";
import moment from "moment";
export default {
  name: "new-cont",

  data() {
    return {
      errors: [],
      contatos: [],
      contatoRequest: {},  
      nome: null, 
      email: null, 
      endereco: null,  
    };
  },
  
  mounted() {
    this.getDataAtt(this.$route.params.id);
  },
  methods: {
  createAtt(e) {
   
      this.$http.post("/newcont", {
      nome: this.nome,
      email: this.email,
      endereco: this.endereco,
      ...this.contatos[0]
      }); 
      
       this.errors = [];

      if (!this.nome) {
        this.errors.push('O campo nome é obrigatório.');
      }
      if (!this.email) {
        this.errors.push('O campo e-mail é obrigatório.');
      }
      e.preventDefault();
      if (this.nome && this.email) {
      this.$router.push('/home');
      }
     
    },
  },

  components: {
    "header-app": header,
  },
};
</script>
<style lang="scss" src="./style.scss" scoped>
</style>