<template>
  <div>
    <FormDefault title="Novo Certificado" v-on:submit="submit()">
      <TextFormDefault
        title="Certificado"
        type="file"
        v-model="formData.certificate"
      />
    </FormDefault>
    <div class="m-5">
      <!-- HEADER CONTENT -->
      <div class="flex justify-between items-center my-5">
        <div class="text-theme-primary">Certificados</div>
        <div>
          <button
            type="button"
            v-on:click="setFormShow"
            class="border border-theme-primary bg-theme-primary text-white rounded-md px-4 py-1 hover:bg-theme-primary focus:outline-none focus:shadow-outline shadow"
          >
            Novo
          </button>
        </div>
      </div>
      <!-- CONTENT -->
      <div>
        <div class="w-full">
          <div
            class="border border-theme-primary rounded shadow overflow-hidden"
          >
            <table class="w-full bg-white">
              <thead class="bg-theme-primary text-white">
                <tr>
                  <th
                    class="py-3 px-4 text-left uppercase font-semibold text-sm"
                  >
                    Path
                  </th>
                  <th
                    class="py-3 px-4 text-left uppercase font-semibold text-sm"
                  >
                    Data de Validade
                  </th>
                  <th
                    class="py-3 px-4 text-left uppercase font-semibold text-sm"
                  >
                    DN
                  </th>
                  <th
                    class="py-3 px-4 text-left uppercase font-semibold text-sm"
                  >
                    DN Issuer
                  </th>
                  <th
                    class="py-3 px-4 text-center uppercase font-semibold text-sm"
                  >
                    Ações
                  </th>
                </tr>
              </thead>
              <tbody class="text-gray-700">
                <tr
                  v-for="certificate in getCertificatesAll"
                  v-bind:key="certificate.id"
                  class="odd:bg-white even:bg-theme-striped"
                >
                  <td class="py-3 px-4 text-left">{{ certificate.path }}</td>
                  <td class="py-3 px-4 text-left">
                    {{ certificate.expiration_at }}
                  </td>
                  <td class="py-3 px-4 text-left">{{ certificate.DN }}</td>
                  <td class="py-3 px-4 text-left">
                    {{ certificate.DN_issuer }}
                  </td>
                  <td
                    class="flex justify-around py-3 px-4 text-left text-theme-secondary"
                  >
                    <i
                      v-on:click="deleteCertificate(certificate.id)"
                      class="cursor-pointer fa fa-trash"
                    ></i>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

import Format from "@/panel/mixins/FormatMixins";

import FormDefault from "@/panel/components/form/default/FormDefault";
import TextFormDefault from "@/panel/components/form/default/TextFormDefault";

export default {
  data() {
    return {
      formData: {
        certificate: "",
      },
    };
  },

  computed: {
    ...mapGetters(["getCertificatesAll"]),
  },

  methods: {
    ...mapActions(["setFormShow", "newCertificate", "deleteCertificate"]),
    submit() {
      this.newCertificate(this.formData);
    },
  },

  mounted() {
    this.$store.dispatch("setCertificates");
  },

  mixins: [Format],

  components: {
    FormDefault,
    TextFormDefault,
  },
};
</script>