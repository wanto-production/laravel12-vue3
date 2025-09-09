<script setup lang="ts">
import { User } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { onMounted } from 'vue';

const { user } = defineProps<{ user: User }>()

function logout() {
    router.get('/logout')
}

onMounted(() => {
    console.log(user)
})
</script>

<template>

    <Head title="home">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>

    <main>
        <Button v-if="user" @click="logout()">logout</Button>
        hello world!
    </main>
</template>
