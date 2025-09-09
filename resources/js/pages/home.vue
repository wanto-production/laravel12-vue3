<script setup lang="ts">
import { User } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';

const { auth } = defineProps<{ auth: { user: User } }>()

function logout() {
    router.get('/logout')
}

</script>

<template>

    <Head title="home">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>

    <main>
        <Button v-if="auth.user" @click="logout()">logout</Button>
        hello world!
    </main>
</template>
