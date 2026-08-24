<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

defineProps<{
    title: string;
    sideNavOpen: boolean;
}>();

defineEmits<{
    toggleSideNav: [];
}>();

const page = usePage();
const user = computed(() => page.props.auth.user);
const displayName = computed(() => user.value?.name ?? 'Admin');
const userInitials = computed(() => {
    const parts = displayName.value.split(' ').filter(Boolean).slice(0, 2);

    return parts.map((part) => part.charAt(0).toUpperCase()).join('');
});
</script>

<template>
    <header
        class="sticky top-0 z-20 flex h-16 items-center justify-between gap-4 border-b border-white/10 bg-brand-secondary-bg px-4"
    >
        <div class="flex min-w-0 items-center gap-3">
            <button
                type="button"
                class="inline-flex h-9 w-9 items-center justify-center rounded-md text-main-text hover:bg-white/5 lg:hidden"
                :aria-label="
                    sideNavOpen ? 'Close navigation' : 'Open navigation'
                "
                aria-controls="app-sidenav"
                :aria-expanded="sideNavOpen"
                @click="$emit('toggleSideNav')"
            >
                <svg
                    class="h-5 w-5"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        d="M3.5 5.5h13M3.5 10h13M3.5 14.5h13"
                        stroke="currentColor"
                        stroke-width="1.6"
                        stroke-linecap="round"
                    />
                </svg>
            </button>
            <h1 class="truncate text-sm font-medium text-main-text">
                {{ title }}
            </h1>
        </div>

        <div class="flex items-center gap-3">
            <span class="hidden text-sm text-main-text/80 sm:inline">
                {{ displayName }}
            </span>
            <span
                class="flex h-8 w-8 items-center justify-center rounded-full bg-brand text-xs font-medium text-main-text"
                aria-hidden="true"
            >
                {{ userInitials }}
            </span>
        </div>
    </header>
</template>
