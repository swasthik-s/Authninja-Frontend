<script setup>
import { defineProps } from 'vue';
import SidebarCloseButton from "@/Assets/SVG/Sidebar/SidebarCloseButton.vue";
import AccessControl from "@/Components/Sidebar/SidebarComponenets/AccessControl.vue";
import UserManagement from "@/Components/Sidebar/SidebarComponenets/UserManagement.vue";
import Communication from "@/Components/Sidebar/SidebarComponenets/Communication.vue";
import LoggingAndMonitoring from "@/Components/Sidebar/SidebarComponenets/LoggingAndMonitoring.vue";
import Settings from "@/Components/Sidebar/SidebarComponenets/Settings.vue";
import Security from "@/Components/Sidebar/SidebarComponenets/Security.vue";
import Upgrade from "@/Components/Sidebar/SidebarComponenets/Upgrade.vue";
import NewApp from "@/Components/Sidebar/SidebarComponenets/NewApp.vue";




defineProps({
  isOpen: Boolean
})

const emit = defineEmits(['update:isOpen'])

function close() {
  emit('update:isOpen', false)
}

</script>

<template>
  <div class="bg-gray-100 absolute left-0 z-30 h-full w-64 xl:relative xl:border-r xl:shadow-none" :class="{'transition-all transform ease-in-out duration-200': true, '-translate-x-full': !isOpen}"
       :style="{ width: isOpen ? '256px' : '0' }">
    <!-- Sidebar Content -->
    <div class="h-[calc(100%-45px)]" style="transform: none;">
      <div class="absolute top-[20px] z-50 md:top-[14px] right-[15px]">
        <div class="duration-75" style="transform: none;">
          <!-- Sidebar Close Button -->
          <button @click="close" class="box-border inline-flex w-fit items-center justify-center gap-2 rounded-lg hover:bg-gray-200 h-9 p-2 min-w-fit">
              <span aria-hidden="true" class="ds-inline-flex ds-shrink-0 ds-self-center ds-w-5 ds-h-5">
                <SidebarCloseButton/>
              </span>
          </button>
        </div>
      </div>
      <div class="h-full overflow-hidden">
        <div class="flex h-full min-w-[256px] flex-col items-start pl-2 pr-2">
          <!-- New App-->
          <NewApp/>
          <div class="bg-gray-200 my-2 h-[1px] w-full"></div>
          <div class="w-full">
                <AccessControl/>
                <UserManagement/>
                <Communication/>
                <LoggingAndMonitoring/>
                <Settings/>
                <Security/>
                <Upgrade/>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

