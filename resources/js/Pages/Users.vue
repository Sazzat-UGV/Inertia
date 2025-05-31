<template>
    <Head title="Users" />
    <Layout>
        <section class="container px-4 mx-auto">
        <div v-if="users.length===0">
        <h1 class="text-2xl text-center">Loading...</h1>
        </div>
            <div class="flex flex-col mt-6" v-else>
            <div class="flex justify-between mb-3">
            <p class="text-3xl font-semibold">Users</p>
            <input type="text" v-model="search" placeholder="Search..." class=" w-64 border-2 border-gray-200 px-2 py-1 rounded-lg">
            </div>
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div
                        class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8"
                    >
                        <div
                            class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg"
                        >
                            <table
                                class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
                            >
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                                        >
                                            Name
                                        </th>

                                        <th
                                            scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                                        >
                                            Email
                                        </th>

                                        <th
                                            scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400"
                                        >
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900"
                                >
                                    <tr v-for="user in users.data" :key="user.id">
                                        <td
                                            class="px-4 py-4 text-sm font-medium whitespace-nowrap"
                                        >
                                            <div>
                                                <h2
                                                    class="font-medium text-gray-800 dark:text-white"
                                                >
                                                    {{ user.name }}
                                                </h2>
                                            </div>
                                        </td>

                                        <td
                                            class="px-4 py-4 text-sm whitespace-nowrap"
                                        >
                                            <div>
                                                <h4
                                                    class="text-gray-700 dark:text-gray-200"
                                                >
                                                      {{ user.email }}
                                                </h4>
                                            </div>
                                        </td>

                                        <td
                                            class="px-4 py-4 text-sm whitespace-nowrap"
                                        >
                                            <Link class="font-bold text-indigo-600 hover:text-indigo-900 hover:underline hover:cursor-pointer" href="`/users/${user.id}/edit`">Edit</Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <Pagination :links="users.links" class="mt-6" />
        </section>
    </Layout>
</template>
<script setup>
import Pagination from '../Components/Pagination.vue';
import Layout from "../Components/Layout.vue";
import { Link } from '@inertiajs/vue3'
import { Inertia } from '@inertiajs/inertia'
import { ref,watch } from "vue";

var search=ref('')

defineProps({
    users: {
        type: Object,
        default: [],
    },
});
watch(search, value=>{
    Inertia.get('/users',{search: value});
    console.log(search.value);
})
</script>
