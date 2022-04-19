<template>
  <div>
    <header-app></header-app>
    <div class="content-wrapper">
      <section class="content">
        <div class="board col-md-9">
          <div>
            <div class="new-cont">
              <h1>
                <router-link
                  :to="{ name: 'new-cont', params: { id: contatos.id } }"
                >
                  <i class="fa fa-solid fa-plus"></i>
                </router-link>
              </h1>
            </div>
            <h2>
              Contatos
              <hr />
            </h2>
            <div class="lane" style="border-top: solid 3px #0071bb">
              <span v-if="contatos.length == 0" class="not-contact"
                >Nenhum Contato Cadastrado!</span
              >
              <div group-name="cards">
                <div
                  class="info-box"
                  v-for="contato in contatos"
                  :key="contato.id"
                >
                  <span class="info-cont">
                    <strong>{{ contato.nome }} </strong>
                    <strong>|</strong>
                    <strong>{{ contato.email }} </strong>
                  </span>
                  <router-link
                    :to="{ name: 'histcont', params: { id: contato.id } }"
                    class="info-rout"
                  >
                    <strong class="routers-dados">Visualizar </strong>
                  </router-link>
                  <router-link
                    :to="{ name: 'edit', params: { id: contato.id } }"
                    class="info-rout"
                  >
                    <strong class="routers-dados">Editar </strong>
                  </router-link>
                  <button
                    type="button"
                    @click="createAtt"
                    class="routers-dados-rm"
                  >
                    Excluir
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</template>
<script>
import header from "../../components/header/header";

export default {
  name: "home",

  data() {
    return {
      contatos: {},
      contatosRequest: {},
    };
  },

  mounted() {
    this.getData();
    this.getContatos();
  },

  methods: {
    
    async getData() {
      const { data } = await this.$http.post("/contatos");
      this.contatosRequest = data;
      this.contatos = data;
    },
    createAtt() {
      this.$router.go();
      this.$http.post("/removecont", {
        ...this.contatos[0],
      });
    },
  },

  components: {
    "header-app": header,
  },
};
</script>
<style lang="scss" src="./style.scss" scoped></style>
