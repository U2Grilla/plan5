<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import SideNav from '@/components/nav/SideNav.vue';
import TopNav from '@/components/nav/TopNav.vue';

withDefaults(
    defineProps<{
        title?: string;
    }>(),
    {
        title: 'Dashboard',
    },
);

const isSideNavOpen = ref(false);

function toggleSideNav(): void {
    isSideNavOpen.value = !isSideNavOpen.value;
}

function closeSideNav(): void {
    isSideNavOpen.value = false;
}
</script>

<template>
    <div class="flex min-h-screen bg-brand-main-bg text-main-text">
        <Head :title="title" />
        <button
            v-show="isSideNavOpen"
            type="button"
            class="fixed inset-0 z-30 bg-black/50 lg:hidden"
            aria-label="Close navigation"
            @click="closeSideNav"
        />

        <SideNav :open="isSideNavOpen" @close="closeSideNav" />

        <div class="flex min-h-screen min-w-0 flex-1 flex-col">
            <TopNav
                :title="title"
                :side-nav-open="isSideNavOpen"
                @toggle-side-nav="toggleSideNav"
            />
            <main class="flex-1">
                <slot />
            </main>
        </div>
    </div>
</template>
