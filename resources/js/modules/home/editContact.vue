<template>
  <div>
    <header-app></header-app>
    
    <div class="content-wrapper">
      <section
        class="content"
      >
        <div class="col-lg-7 desc-aten">
          <div>
            <strong>Editar Contato </strong>
            <hr style="color:#0071bb ; height:2px; width:320px">
          </div>
        </div>
        <div class="col-lg-7">
          <hr />
          <form id="incluir_itens" v-for="contato in contatos"
            :key="contato.id">
            <div class="row">
              <br />
              <div class="col-md-12">
                <label>Nome</label>
                <input
                  style="color: #363838; background-color: #ebecf0!important; border: solid #ebecf0 "
                  class="form-control"
                  v-model="contato.nome"
                  required=""
                ></input>
                <br>
                <label>E-mail</label>
                <input
                  style="color: #363838; background-color: #ebecf0!important; border: solid #ebecf0 "
                  class="form-control"
                  v-model="contato.email"
                  required=""
                ></input>
                <label>Endereço</label>
                <input
                  style="color: #363838; background-color: #ebecf0!important; border: solid #ebecf0 "
                  class="form-control"
                  v-model="contato.endereco"
                  required=""
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
  name: "edit",
  data() {
    return {
      contatos: [],
      contatoRequest: {},
      
    };
  },
  mounted() {
    this.getDataAtt(this.$route.params.id);
  },
  methods: {
  async getDataAtt(id) {
      const { data } = await this.$http.post("/contatoHist", {
        id,
      });
      this.contatosRequest = data;
      this.contatos = data;
    },

    createAtt() {
      this.$http.post("/editcont", {
        ...this.contatos[0]
      });     
    },
  },

  components: {
    "header-app": header,
  },
};
</script>
<style lang="scss" src="./style.scss" scoped>
</style>