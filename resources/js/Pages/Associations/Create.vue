<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from "@inertiajs/vue3";
import CreateAssociationForm from "./Partials/CreateAssociationForm.vue";

const props = defineProps({
  pages: Object,
});

const submitFormHandler = async (data, node) => {
  const body = new FormData(createAssociationForm);
  router.post(route("associations.store"),
  body,
  {
      preserveState: true,
      onSuccess: () => {
          node.reset();
          router.push(route("associations.index"));
      },
      onError: (errors) => {
          node.setErrors(errors);
      },
  }
  );
};
</script>

<template>
  <Head title="Create Association" />

  <AuthenticatedLayout>
    <template #header>
      <h2
        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
      >
        Create Association
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
          <FormKit
            @submit="submitFormHandler"
            type="form"
            name="createAssociationForm"
            id="createAssociationForm"
          >
            <CreateAssociationForm />
          </FormKit>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
