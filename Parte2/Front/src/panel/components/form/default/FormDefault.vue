<template>
  <div
    class="fixed top-0 left-0 flex justify-end h-screen w-screen bg-black bg-opacity-20 z-40"
    v-show="form"
    v-on:click.self="formHide"
  >
    <div class="flex flex-col justify-between min-h-screen w-96 bg-white z-50">
      <div class="p-5">
        <span class="uppercase font-bold">{{ title }}</span>
        <form class="w-full mt-5 mb-16" id="formDefault">
          <slot></slot>
        </form>
      </div>
      <div class="flex justify-center items-center w-full h-16 bg-gray-200">
        <button
          type="reset"
          class="w-20 h-9 text-theme-secondary text-xs focus:outline-none focus:shadow-outline"
          v-on:click="formHide"
        >
          Cancelar
        </button>
        <button
          type="submit"
          form="formDefault"
          class="w-20 h-9 bg-theme-primary text-white rounded-md text-xs focus:outline-none focus:shadow-outline"
          v-on:click.prevent="submit()"
        >
          Confirmar
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  props: {
    title: {
      type: String,
      required: true,
    },
  },
  computed: {
    ...mapGetters({ form: "getForm" }),
  },
  methods: {
    ...mapActions({ formHide: "setFormHide" }),
    submit() {
      this.$emit("submit");
    },
  },
};
</script>
