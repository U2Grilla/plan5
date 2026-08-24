<script setup lang="ts">
    import { Head } from '@inertiajs/vue3';
    import SideNav from '@/components/nav/SideNav.vue'
</script>  

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>  

    <div class="app-container bg-brand-main-bg">
        <SideNav />
        <slot />
    </div>
</template>