<template>
  <div class="w-full">
    <div class="text-2xl font-bold">Registre</div>
    <div class="text-sm">Crie sua conta grátis.</div>
  </div>
  <div class="w-full">
    <div class="flex flex-col mt-5">
      <label class="text-theme-primary text-sm">NOME</label>
      <input
        v-model="formData.name"
        type="text"
        class="border-b border-theme-primary focus:outline-none"
      />
    </div>
    <div class="flex flex-col mt-5">
      <label class="text-theme-primary text-sm">CPF</label>
      <input
        v-model="formData.cpf"
        type="text"
        class="border-b border-theme-primary focus:outline-none"
      />
    </div>
    <div class="flex flex-col mt-5">
      <label class="text-theme-primary text-sm">E-MAIL</label>
      <input
        v-model="formData.email"
        type="text"
        class="border-b border-theme-primary focus:outline-none"
      />
    </div>
    <div class="flex flex-col mt-5">
      <label class="text-theme-primary text-sm">TELEFONE</label>
      <input
        v-model="formData.phone"
        type="text"
        class="border-b border-theme-primary focus:outline-none"
      />
    </div>
    <div class="flex flex-col mt-5">
      <label class="text-theme-primary text-sm">SENHA</label>
      <input
        v-model="formData.password"
        type="password"
        class="border-b border-theme-primary focus:outline-none"
      />
    </div>
  </div>
  <div class="flex items-center justify-between w-full mt-5">
    <router-link
      class="text-theme-primary text-xs"
      v-bind:to="{ name: 'login' }"
      >Já tenho uma conta</router-link
    >
    <button
      v-on:click.prevent="auth()"
      type="submit"
      class="py-2 px-3 bg-theme-primary text-white text-sm rounded"
    >
      Criar conta
    </button>
  </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
  data() {
    return {
      formData: {
        name: "",
        cpf: "",
        email: "",
        phone: "",
        password: "",
      },
    };
  },
  methods: {
    ...mapActions(["register"]),
    auth() {
      this.register(this.formData).then(() => {
        this.$router.push({ name: "home" });
      });
    },
  },
};
</script>