<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import AssociationsList from "./Partials/AssociationsList.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineProps({
  associations: Object,
});
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between">

        <h2
          class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
        >
          Dashboards
        </h2>
        <Link as="button" :href="route('associations.create')">Create Association</Link>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
        >
          <div class="p-6 text-gray-900 dark:text-gray-100">
            <AssociationsList :associations="associations" />
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
