<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import { useDark, useToggle } from '@vueuse/core';
import { MoonIcon, SunIcon } from '@heroicons/vue/24/outline';

const isDark = useDark();
const toggleDark = useToggle(isDark);
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
            <div  class="flex justify-end pt-2">
                <SunIcon @click="toggleDark()"  v-if="isDark" class="w-5 h-5 text-white cursor-pointer" />
                <MoonIcon @click="toggleDark()" v-else class="w-5 h-5" />
            </div>
        </div>
    </div>
</template>
