<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import { FwbFileInput } from 'flowbite-vue';

const files = ref([]);
const errors = ref([]);

watch(files, async (newValue, oldValue) => {
    errors.value = [];
    if (newValue.length > 5) {
        errors.value.push('Изображений больше пяти');
    }
})

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:end-0 p-6 text-end z-10">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</Link>

                <Link v-if="canRegister" :href="route('register')" class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</Link>
            </template>
        </div>

        <div class="max-w-xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <div class="max-w-md m-auto">
                    <img class="" src="/images/pictrix-main-picture.jpg" alt="PicTrix Image Service">
                </div>
            </div>

            <div class="flex flex-wrap justify-center mt-16 px-6 sm:items-center sm:justify-between">
                <fwb-file-input class="w-full" v-model="files" label="Выберите изображения" size="lg" multiple>
                    <p class="!mt-1 text-sm text-gray-500 dark:text-gray-300">
                        Не более пяти файлов PNG, JPG или GIF с максимальным разрешением 1024x1024 px
                    </p>
                </fwb-file-input>
                <span class="w-full text-red-700" v-for="error in errors">{{ error }}</span>
                <div v-if="files.length !== 0" class="mt-4 border-[1px] border-gray-300 dark:border-gray-600 p-2 rounded-md">
                    <div v-for="file in files" :key="file">
                        {{ file.name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
