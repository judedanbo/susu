<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import PageHeader from "./Partials/PageHeader.vue";
import MembersList from "./Partials/MembersList.vue";
// import MemberList from "./Partials/MemberList.vue";
defineProps({
  association: Object,
});
const secondaryNavigation = [
    {
        name: "Members",
        href: "#",
        current: true,
    },
    {
        name: "Settings",
        href: "#",
        current: false,
    },
]
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2
        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
      >
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
          <!-- Secondary navigation -->
          <nav class="flex overflow-x-auto border-b border-white/10 py-4">
            <ul
              role="list"
              class="flex min-w-full flex-none gap-x-6 px-4 text-sm font-semibold leading-6 text-gray-400 sm:px-6 lg:px-8"
            >
              <li v-for="item in secondaryNavigation" :key="item.name">
                <a
                  :href="item.href"
                  :class="item.current ? 'text-green-400 dark:text-gray-100' : ''"
                  >{{ item.name }}</a
                >
              </li>
            </ul>
          </nav>
          <PageHeader :association="association" />
          <MembersList :members="association.members" />
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
