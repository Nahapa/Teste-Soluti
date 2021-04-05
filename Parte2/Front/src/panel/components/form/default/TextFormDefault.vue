<template>
  <div class="flex mt-3">
    <span class="flex-none w-20 text-right">{{ title }}</span>
    <input
      v-bind:type="type ?? 'text'"
      class="flex-1 mx-5 px-1 border rounded focus:outline-none focus:border-theme-primary"
      v-bind:value="modelValue ?? value"
      v-bind:placeholder="placeholder"
      v-bind:name="name"
      v-on:input="$emit('update:modelValue', $event.target.value)"
    />
  </div>
</template>

<script>
export default {
  props: {
    title: {
      required: true,
      type: String,
    },
    value: {
      required: false,
      type: String,
    },
    placeholder: {
      required: false,
      type: String,
    },
    name: {
      required: false,
      type: String,
    },
    type: {
      required: false,
      type: String,
    },
    modelValue: {
      required: false,
      type: String,
    },
  },
};
</script>