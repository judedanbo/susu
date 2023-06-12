<script setup>
defineProps({
  association: Object,
});
</script> 
<template>
  <div
    class="flex flex-col items-start justify-between gap-x-8 gap-y-4 dark:bg-gray-700/10 bg-green-50/50  px-4 py-4 sm:flex-row sm:items-center sm:px-6 lg:px-8"
  >
    <div>
      <div class="flex items-center gap-x-3">
        <div class="flex-none rounded-full bg-green-400/10 p-1 text-green-400">
          <div class="h-2 w-2 rounded-full bg-current" />
        </div>
        <h1 class="flex gap-x-3 text-base leading-7">
          <span class="font-semibold text-gray-800 dark:text-white">{{ association.name }}</span>
          <!-- <span class="text-gray-600">/</span>
          <span class="font-semibold text-white">mobile-api</span> -->
        </h1>
      </div>
      <p class="mt-2 text-xs leading-6 text-gray-600 dark:text-gray-400">
        {{ association.slogan }}
      </p>
    </div>

    <img class="inline-block h-14 w-14 rounded-md" :src="association.imageUrl" :alt="association.name" />

    <!-- <div
      class="order-first flex-none rounded-full bg-indigo-400/10 px-2 py-1 text-xs font-medium text-indigo-400 ring-1 ring-inset ring-indigo-400/30 sm:order-none"
    >
      Production
    </div> -->
  </div>
</template>
