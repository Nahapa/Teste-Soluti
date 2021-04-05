<template>
  <div class="flex">
    <div class="flex flex-1 min-h-screen bg-theme-primary shadow-xl">
      <div
        class="flex items-center flex-1 h-full mx-16 text-white text-justify font-bold"
      >
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem
        dolor ipsa eos hic inventore ut porro ad pariatur unde totam praesentium
        consequatur delectus, tenetur possimus, asperiores excepturi modi ullam.
        Deserunt.
      </div>
      <div class="flex flex-col justify-center flex-none w-32">
        <div class="bg-black text-white rounded-l-full cursor-pointer">
          <router-link
            v-bind:to="{ name: 'login' }"
            active-class="bg-white text-black rounded-l-full cursor-default shadow-xl"
            class="flex justify-center items-center w-full h-14"
          >
            Login
          </router-link>
        </div>
        <div class="mt-1 bg-black text-white rounded-l-full cursor-pointer">
          <router-link
            v-bind:to="{ name: 'register' }"
            active-class="bg-white text-black rounded-l-full cursor-default shadow-xl"
            class="flex justify-center items-center w-full h-14"
          >
            Registrar
          </router-link>
        </div>
      </div>
    </div>
    <div class="flex justify-center items-center flex-none w-96 min-h-screen">
      <div class="flex flex-col justify-center items-center w-full mx-16">
        <div class="mb-5">
          <img src="@/panel/assets/images/logo.png" alt="logo" />
        </div>
        <router-view />
      </div>
    </div>
  </div>
</template>