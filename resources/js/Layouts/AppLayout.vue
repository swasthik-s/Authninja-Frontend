<script setup>
import { ref } from 'vue';
import Sidebar from '@/Components/Sidebar/Sidebar.vue';
import MainHeader from '@/Components/Header/MainHeader.vue';
import SidebarOpenButton from '@/Assets/SVG/Sidebar/SidebarOpenButton.vue';
import Banner from '@/Components/Shared/Banner.vue';

defineProps({
  title: String,
});

const isSidebarOpen = ref(true);
const isLoading = ref(true); // New variable for loading state

function toggleSidebar() {
  isSidebarOpen.value = !isSidebarOpen.value;
}

// Simulate an asynchronous operation (e.g., fetching data from an API)
// Replace this with your actual data loading logic
setTimeout(() => {
  isLoading.value = false;
}, 2000);

</script>
<template>
  <Banner />

  <!-- Header (conditionally rendered) -->
  <div v-if="!isLoading" class="relative flex h-full w-full">
    <MainHeader/>
  </div>

  <!-- Page Heading -->
  <!-- Sidebar & Main Content -->
  <main v-if="!isLoading" class="flex w-full flex-1 overflow-hidden" style="height: calc(100vh - 50px);">
    <!-- Sidebar -->
    <Sidebar :is-open="isSidebarOpen" @update:is-open="isSidebarOpen = $event"/>
    <!-- Main Content -->
    <div class="relative flex h-full flex-1 justify-center overflow-y-auto" id="main-content">
      <!-- Sidebar Open Button -->
      <div class="absolute top-[20px] z-50 md:top-[14px] left-[15px]">
        <button v-if="!isSidebarOpen" @click="toggleSidebar" class="box-border inline-flex w-fit items-center justify-center gap-2 rounded-lg hover:bg-gray-200 h-9 p-2 min-w-fit" id="side-panel-toggle" data-testid="sidePanelToggle">
          <SidebarOpenButton/>
        </button>
      </div>
      <!-- Main Content Slot -->
      <slot />
    </div>
  </main>

  <!-- Loading Screen -->
  <div v-else class="flex items-center justify-center h-screen">
    <div class="border-gray-300 h-20 w-20 animate-spin rounded-full border-8 border-t-orange-600" />
  </div>
</template>
