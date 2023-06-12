<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import { EllipsisVerticalIcon } from "@heroicons/vue/20/solid";
import { Link } from '@inertiajs/vue3';

defineProps({
  associations: {
    type: Array,
    required: true,
  },
});
</script>
<template>
  <ul role="list" class="divide-y divide-gray-100 dark:divide-gray-700">
    <li
      v-for="association in associations"
      :key="association.id"
      class="flex justify-between gap-x-6 py-5"
    >
      <div class="flex gap-x-4">
        <img
          class="h-12 w-12 flex-none rounded-full bg-gray-50"
          :src="association.imageUrl"
          alt=""
        />
        <div class="min-w-0 flex-auto">
          <p
            class="text-sm font-semibold leading-6 text-gray-900 dark:text-white"
          >
            <Link
              :href="
                route('associations.show', { association: association.id })
              "
              class="hover:underline"
              >{{ association.name }}</Link
            >
          </p>
          <p
            class="mt-1 flex text-xs leading-5 text-gray-500 dark:text-gray-400"
          >
            {{ association.slogan }}
          </p>
        </div>
      </div>
      <div class="flex items-center gap-x-6">
        <div class="hidden sm:flex sm:flex-col sm:items-end">
          <p class="text-sm leading-6 text-gray-900 dark:text-white">
            {{ association.members }} Members
          </p>
          <p
            v-if="association.lastSeen"
            class="mt-1 text-xs leading-5 text-gray-500"
          >
            Last seen
            <time :datetime="association.lastSeenDateTime">{{
              association.lastSeen
            }}</time>
          </p>
          <div v-else class="mt-1 flex items-center gap-x-1.5">
            <div class="flex-none rounded-full bg-emerald-500/20 p-1">
              <div class="h-1.5 w-1.5 rounded-full bg-emerald-500" />
            </div>
            <p class="text-xs leading-5 text-gray-500 dark:gray-400">Online</p>
          </div>
        </div>
        <Menu as="div" class="relative flex-none">
          <MenuButton
            class="-m-2.5 block p-2.5 text-gray-500 hover:text-gray-900"
          >
            <span class="sr-only">Open options</span>
            <EllipsisVerticalIcon class="h-5 w-5" aria-hidden="true" />
          </MenuButton>
          <transition
            enter-active-class="transition ease-out duration-100"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
          >
            <MenuItems
              class="absolute right-0 z-10 mt-2 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
            >
              <MenuItem v-slot="{ active }">
                <Link
                  href="#"
                  :class="[
                    active ? 'bg-gray-50' : '',
                    'block px-3 py-1 text-sm leading-6 text-gray-900',
                  ]"
                >
                  Profile <span class="sr-only">, {{ association.name }}</span>
                </Link>
              </MenuItem>
              <MenuItem v-slot="{ active }">
                <Link
                  href="#"
                  :class="[
                    active ? 'bg-gray-50' : '',
                    'block px-3 py-1 text-sm leading-6 text-gray-900',
                  ]"
                >
                  Messages <span class="sr-only">, {{ association.name }}</span>
                </Link>
              </MenuItem>
            </MenuItems>
          </transition>
        </Menu>
      </div>
    </li>
  </ul>
</template>
