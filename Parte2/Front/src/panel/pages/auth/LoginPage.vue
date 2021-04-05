<template>
  <div class="w-full">
    <div class="text-2xl font-bold">Login</div>
    <div class="text-sm">Entre em sua conta.</div>
  </div>
  <form class="w-full">
    <div class="flex flex-col mt-5">
      <label class="text-theme-primary text-sm">E-MAIL</label>
      <input
        v-model="formData.email"
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
  </form>
  <div class="flex items-center justify-between w-full mt-5">
    <router-link
      class="text-theme-primary text-xs"
      v-bind:to="{ name: 'register' }"
      >Ainda não tenho conta</router-link
    >
    <button
      v-on:click.prevent="auth()"
      type="submit"
      class="py-2 px-3 bg-theme-primary text-white text-sm rounded"
    >
      Entrar
    </button>
  </div>
</template>

<script>
import { mapActions } from "vuex";

export default {
  data() {
    return {
      formData: {
        email: "",
        password: "",
      },
    };
  },

  methods: {
    ...mapActions(["login"]),
    auth() {
      this.login(this.formData).then(() => {
        console.log("teste");
        this.$router.push({ name: "home" });
      });
    },
  },
};
</script>