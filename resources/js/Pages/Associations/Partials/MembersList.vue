<script setup>
import Modal from '@/Components/Modal.vue';
import CreatePerson from '@/Pages/People/Create.vue';
import {  ref } from 'vue';
defineProps({
  members: Array,
});

let showModal = ref(false);

const statuses = { Completed: 'text-green-400 bg-green-400/10', Error: 'text-rose-400 bg-rose-400/10' }

const handleAddMember = () => {
    showModal.value = true;
  console.log('Add member');
}

</script>
<template>
  <div class="border-t border-white/10 pt-11">
   <div class="flex justify-between">
    <h2
      class="px-4 text-base font-semibold leading-7 text-gray-700 dark:text-white sm:px-6 lg:px-8"
    >
      Members
    </h2>
    <p @click="handleAddMember" class="mr-3 cursor-pointer" as="button">Add member</p>
   </div>
    <table class="mt-6 w-full whitespace-nowrap text-left">
      <colgroup>
        <col class="w-full sm:w-4/12" />
        <col class="lg:w-1/12" />
        <col class="lg:w-1/12" />
      </colgroup>
      <thead class="border-b border-white/10 text-sm leading-6 text-gray-600 dark:text-white">
        <tr>
          <th scope="col" class="py-2 pl-4 pr-8 font-semibold sm:pl-6 lg:pl-8">
            Name
          </th>
          
          <th
            scope="col"
            class="py-2 pl-0 pr-4 text-right font-semibold sm:pr-8 sm:text-left lg:pr-20"
          >
            Status
          </th>
          
          <th
            scope="col"
            class="hidden py-2 pl-0 pr-4 text-right font-semibold sm:table-cell sm:pr-6 lg:pr-8"
          >
            Date joined
          </th>
        </tr>
      </thead>
      <tbody class="divide-y divide-white/5">
        <tr v-for="member in members" :key="member.commit">
          <td class="py-4 pl-4 pr-8 sm:pl-6 lg:pl-8">
            <div class="flex members-center gap-x-4">
              <img
                :src="member.imageUrl"
                alt=""
                class="h-8 w-8 rounded-full bg-gray-800"
              />
              <div class="truncate text-sm font-medium leading-6 text-gray-700 dark:text-white">
                {{ member.name }}
              </div>
            </div>
          </td>
          
          <td class="py-4 pl-0 pr-4 text-sm leading-6 sm:pr-8 lg:pr-20">
            <div class="flex items-center justify-end gap-x-2 sm:justify-start">
              <time class="text-gray-400 sm:hidden" :datetime="member.dateTime">{{
                member.date
              }}</time>
              <div
                :class="[statuses[member.status], 'flex-none rounded-full p-1']"
              >
                <div class="h-1.5 w-1.5 rounded-full bg-current" />
              </div>
              <div class="hidden text-gray-700 dark:text-white sm:block">{{ member.status }}</div>
            </div>
          </td>
          
          <td
            class="hidden py-4 pl-0 pr-4 text-right text-sm leading-6 text-gray-400 sm:table-cell sm:pr-6 lg:pr-8"
          >
            <time :datetime="member.dateTime">{{ member.date }}</time>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <Modal @close="showModal=false" :show="showModal" >
    <div class="p-4">
        <h2 class="text-xl leading-2 py-2">Add Member to Association</h2>
        <CreatePerson />
    </div>
  </Modal>
</template>
