<template>
  <div>
    <header-app></header-app>
    <div class="content-wrapper">
      <section class="content">
        <div class="col-lg-7">
          <hr />
          <form
            id="incluir_itens"
            v-for="contato in contatos"
            :key="contato.id"
          >
            <div class="row">
              <br />
              <h3>Dados do Contato </h3>
             
              <hr>
              <div class="col-md-12">
               
                <div
                  style="
                    margin-top:10px;
                    word-break: break-word;
                    height: auto;
                    color: #333b40;
                    background-color: #ebecf0;
                    border-radius: 10px;
                    padding: 10px;
                  "
                  placeholder="Digite aqui ..."
                  required=""
                >
                  <span>
                    {{ contato.nome }}
                  </span>
                </div>
                 <div
                  style="
                    margin-top:10px;
                    word-break: break-word;
                    height: auto;
                    color: #333b40;
                    background-color: #ebecf0;
                    border-radius: 10px;
                    padding: 10px;
                  "
                  placeholder="Digite aqui ..."
                  required=""
                >
                  <span>
                    {{ contato.email }}
                  </span>
                </div>
                 <div
                  style="
                    margin-top:10px;
                    word-break: break-word;
                    height: auto;
                    color: #333b40;
                    background-color: #ebecf0;
                    border-radius: 10px;
                    padding: 10px;
                  "
                  placeholder="Digite aqui ..."
                  required=""
                >
                  <span>
                    {{ contato.endereco }}
                  </span>
                  
                </div>
                
              </div>
            </div>
            <br />
            <hr />
             <router-link
                    :to="{ name: 'edit', params: { id: contato.id } }"
                    class="info-rout"
                    style="margin-left:-80px!important;"
                  >
                    <strong class="routers-dados">Editar </strong>
                  </router-link>
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
  name: "histcont",

  data() {
    return {
      contatos: [],
      contatosRequest: {},
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
  },

  components: {
    "header-app": header,
  },
};
</script>
<style lang="scss" src="./style.scss" scoped></style>
