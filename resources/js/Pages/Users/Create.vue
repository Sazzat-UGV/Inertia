<template>
    <Head title="Create" />
    <Layout>
        <p class="text-3xl font-semibold">Create New User</p>
        <form action="" class="max-w-md mx-auto mt-8" @submit.prevent="submit">
            <div class="mb-6">
                <label
                    for="name"
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >Name<span class="text-red-600">*</span>
                </label>
                <input
                    type="text"
                    class="border border-gray-400 p-2 w-full rounded-sm"
                    id="name"
                    name="name"
                    v-model="form.name"
                />
                <div
                    v-if="errors.name"
                    class="text-red-500 font-bold text-xs mt-1"
                    v-html="errors.name"
                ></div>
            </div>
            <div class="mb-6">
                <label
                    for="email"
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >Email<span class="text-red-600">*</span>
                </label>
                <input
                    type="email"
                    class="border border-gray-400 p-2 w-full rounded-sm"
                    id="email"
                    name="email"
                    v-model="form.email"
                />
                <div
                    v-if="errors.email"
                    class="text-red-500 font-bold text-xs mt-1"
                    v-html="errors.email"
                ></div>
            </div>
            <div class="mb-6">
                <label
                    for="password"
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >Password<span class="text-red-600">*</span>
                </label>
                <input
                    type="password"
                    class="border border-gray-400 p-2 w-full rounded-sm"
                    id="password"
                    name="password"
                    v-model="form.password"
                />
                <div
                    v-if="errors.password"
                    class="text-red-500 font-bold text-xs mt-1"
                    v-html="errors.password"
                ></div>
            </div>
            <div class="mb-6">
                <button
                    type="submit"
                    class="bg-gray-700 text-white rounded py-2 px-5 hover:bg-gray-950 transition-all duration-300"
                :disabled="form.processing"
                >
                    Submit
                </button>
            </div>
        </form>
    </Layout>
</template>
<script setup>
import Layout from "@/Components/Layout.vue";
import { useForm } from "@inertiajs/vue3";
import { reactive } from "vue";
let form = useForm({
    name: "",
    email: "",
    password: "",
});

defineProps({
    errors: {
        type: Object,
        default: [],
    },
});

let submit = () => {
    form.post("/users/create");
};
</script>
