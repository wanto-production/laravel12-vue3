<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { Head, useForm } from '@inertiajs/vue3'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Card, CardHeader, CardTitle, CardContent, CardFooter } from '@/components/ui/card'
import { Button } from '@/components/ui/button'

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
})

function register() {
    form.post('/api/register')
}

function clearForm() {
    form.reset() // reset semua field ke nilai awal
}
</script>

<template>

    <Head>
        <title>Register</title>
    </Head>

    <main class="w-full h-screen flex justify-center items-center">
        <div class="p-8 w-[400px]">
            <Card>
                <CardHeader>
                    <CardTitle>Register</CardTitle>
                </CardHeader>
                <CardContent>
                    <form @submit.prevent="register" class="space-y-4">
                        <!-- Name -->
                        <div>
                            <Label for="name" class="block mb-1">Name</Label>
                            <Input id="name" type="text" v-model="form.name" placeholder="Your name" />
                            <p v-if="form.errors.name" class="text-red-500 text-sm mt-1">{{ form.errors.name }}</p>
                        </div>

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

                        <!-- Password Confirmation -->
                        <div>
                            <Label for="password_confirmation" class="block mb-1">Confirm Password</Label>
                            <Input id="password_confirmation" type="password" v-model="form.password_confirmation"
                                placeholder="Confirm password" />
                            <p v-if="form.errors.password_confirmation" class="text-red-500 text-sm mt-1">{{
                                form.errors.password_confirmation }}</p>
                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-2">
                            <Button type="submit" class="flex-1" :disabled="form.processing">
                                {{ form.processing ? 'Registering...' : 'Register' }}
                            </Button>
                            <Button type="button" variant="outline" class="flex-1" @click="clearForm">
                                Clear
                            </Button>
                        </div>
                    </form>
                </CardContent>
                <CardFooter>
                    <p>alredy have accout?
                        <Link class=" text-blue-500 underline" href="/login">login</Link>
                    </p>
                </CardFooter>
            </Card>
        </div>
    </main>
</template>
