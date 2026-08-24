<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import { cn } from '@/lib/utils';
import { index as dashboard } from '@/routes/dashboard';

defineProps<{
    open: boolean;
}>();

const emit = defineEmits<{
    close: [];
}>();

const page = usePage();
const appName = computed(() => page.props.name);
const dashboardUrl = dashboard.url();
const isDashboardActive = computed(() => {
    return page.url === dashboardUrl || page.url.startsWith(`${dashboardUrl}?`);
});
</script>

<template>
    <aside
        id="app-sidenav"
        :class="open ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 z-40 flex w-64 flex-col border-r border-white/10 bg-brand-secondary-bg transition-transform duration-200 ease-out lg:static lg:translate-x-0"
        aria-label="Sidebar"
    >
        <div class="flex h-16 items-center gap-3 border-b border-white/10 px-4">
            <span
                class="flex h-8 w-8 items-center justify-center rounded-md bg-brand text-sm font-medium text-main-text"
                aria-hidden="true"
            >
                {{ appName.charAt(0) }}
            </span>
            <span class="truncate text-sm font-medium text-main-text">
                {{ appName }}
            </span>
        </div>

        <nav class="flex flex-1 flex-col gap-1 p-3" aria-label="Admin">
            <Link
                :href="dashboardUrl"
                prefetch
                :class="
                    cn(
                        'flex items-center gap-3 rounded-md px-3 py-2 text-sm text-main-text/80 hover:bg-white/5 hover:text-main-text',
                        isDashboardActive && 'bg-white/10 text-main-text',
                    )
                "
                @click="emit('close')"
            >
                <svg
                    class="h-4 w-4 shrink-0"
                    viewBox="0 0 16 16"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        d="M2.5 7.2 8 2.5l5.5 4.7v6.3H9.5V9.5h-3v4H2.5V7.2Z"
                        stroke="currentColor"
                        stroke-width="1.4"
                        stroke-linejoin="round"
                    />
                </svg>
                Dashboard
            </Link>
        </nav>
    </aside>
</template>
