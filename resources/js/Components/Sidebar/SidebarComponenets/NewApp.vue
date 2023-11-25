<template>
  <div class="relative items-center">
    <!-- New App Button -->
    <button class="inline-flex items-center justify-center gap-2 rounded-lg hover:bg-gray-200 px-3 py-1.5 h-9 mb-2.5 mt-[14px] whitespace-nowrap pr-[70px]" type="button">
      <NewAppButton/>
      <span class="">New App</span>
    </button>
  </div>
</template>
<script setup>
import NewAppButton from "@/Assets/SVG/Sidebar/NewAppButton.vue";
</script>