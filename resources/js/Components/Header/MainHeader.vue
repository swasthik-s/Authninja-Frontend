<template>
  <div class="flex h-full w-full flex-col ">
    <div aria-label="header container" class="header-container border-border-neutral-divider bg-gray-100 relative z-40 flex h-[50px] justify-between gap-4 border-b">
      <div class="flex">
        <!-- Switch Apps -->
        <div class="flex items-center relative ml-4 mr-2">
          <div class="hover:bg-gray-200 rounded-lg flex h-9 w-9 cursor-pointer items-center justify-center" id="headlessui-menu-button-:r0:" aria-haspopup="menu" aria-expanded="false">
            <SwitchAppsButton/>
          </div>
        </div>
        <!-- App Logo -->
        <div class="flex items-center justify-center">
          <ApplicationLogo/>
        </div>
      </div>
      <header class="bg-paper-system relative z-40 flex items-center justify-end pr-6">
        <HeaderDropdown/>
      </header>
    </div>
  </div>
</template>
<script setup>
import Header from "@/Components/Header/HeaderDropdown.vue";
import ApplicationLogo from "@/Components/Shared/ApplicationLogo.vue";
import HeaderDropdown from "@/Components/Header/HeaderDropdown.vue";
import SwitchAppsButton from "@/Assets/SVG/Sidebar/SwitchAppsButton.vue";
</script>