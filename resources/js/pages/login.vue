<script setup lang="ts">
import { Link, Head, useForm } from '@inertiajs/vue3'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Card, CardHeader, CardTitle, CardContent, CardFooter } from '@/components/ui/card'
import { Button } from '@/components/ui/button'

const form = useForm({
    email: '',
    password: '',
    remember: false
})

function login() {
    form.post('/api/login', {
        onFinish: () => form.reset('password') // reset password setelah submit
    })
}

function clearForm() {
    form.reset()
}
</script>

<template>

    <Head>
        <title>Login</title>
    </Head>

    <main class="w-full h-screen flex justify-center items-center">
        <div class="p-8 w-[400px]">
            <Card>
                <CardHeader>
                    <CardTitle>Login</CardTitle>
                </CardHeader>
                <CardContent>
                    <form @submit.prevent="login" class="space-y-4">
                        <!-- Email -->
                        <div>
                            <Label for="email" class="block mb-1">Email</Label>
                            <Input id="email" type="email" v-model="form.email" placeholder="Your email" />
                            <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</p>
                        </div>

                        <!-- Password -->
                        <div>
                            <Label for="password" class="block mb-1">Password</Label>
                            <Input id="password" type="password" v-model="form.password" placeholder="Your password" />
                            <p v-if="form.errors.password" class="text-red-500 text-sm mt-1">{{ form.errors.password }}
                            </p>
                        </div>

                        <!-- Remember me -->
                        <div class="flex items-center gap-2">
                            <input id="remember" type="checkbox" v-model="form.remember"
                                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500" />
                            <Label for="remember">Remember me</Label>
                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-2">
                            <Button type="submit" class="flex-1" :disabled="form.processing">
                                {{ form.processing ? 'Logging in...' : 'Login' }}
                            </Button>
                            <Button type="button" variant="outline" class="flex-1" @click="clearForm">
                                Clear
                            </Button>
                        </div>
                    </form>
                </CardContent>
                <CardFooter>
                    <p>Don’t have an account?
                        <Link class="text-blue-500 underline" href="/register">Register</Link>
                    </p>
                </CardFooter>
            </Card>
        </div>
    </main>
</template>
