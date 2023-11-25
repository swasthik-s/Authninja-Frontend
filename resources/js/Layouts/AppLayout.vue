<script setup>
import {ref} from "vue";
import Sidebar from "@/Components/Sidebar/Sidebar.vue";
import MainHeader from "@/Components/Header/MainHeader.vue";
import SidebarOpenButton from "@/Assets/SVG/Sidebar/SidebarOpenButton.vue";
import Banner from "@/Components/Shared/Banner.vue";

defineProps({
  title: String,
});

const isSidebarOpen = ref(true);

function toggleSidebar() {
  isSidebarOpen.value = !isSidebarOpen.value;
}

</script>

<template>
  <Banner />
  <!-- Header -->
  <div class="relative flex h-full w-full">
    <MainHeader/>
  </div>
  <!-- Page Heading -->
  <!-- Sidebar & Main Content -->
  <main class="flex w-full flex-1 overflow-hidden" style="height: calc(100vh - 50px);">
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
</template>
