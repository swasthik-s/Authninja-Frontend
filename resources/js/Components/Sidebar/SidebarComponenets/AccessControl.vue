<script setup>
import Licenses from "@/Assets/SVG/Sidebar/AccessControl/Licenses.vue";
import Tokens from "@/Assets/SVG/Sidebar/AccessControl/Tokens.vue";
import Subscription from "@/Assets/SVG/Sidebar/AccessControl/Subscription.vue";
import Sessions from "@/Assets/SVG/Sidebar/AccessControl/Sessions.vue";
import Webhooks from "@/Assets/SVG/Sidebar/AccessControl/Webhooks.vue";
import Files from "@/Assets/SVG/Sidebar/AccessControl/Files.vue";
import Variable from "@/Assets/SVG/Sidebar/AccessControl/Variable.vue";
</script>
<template>
  <label class="text-text-neutral-primary flex py-1.5 pl-3 text-sm font-semibold leading-6">Access Control</label>
  <ul class="border-box w-full pb-px">
    <li>
      <a href="#"
         class="flex items-center text-gray-900 rounded-lg hover:bg-gray-200 h-8 pr-2.5 text-lg pl-2.5 ">
        <Licenses/>
        <span class="ml-3">Licenses</span>
      </a>
    </li>
    <li>
      <a href="#"
         class="flex items-center text-gray-900 rounded-lg hover:bg-gray-200 h-8 pr-2.5 text-lg pl-2.5 ">
        <Tokens/>
        <span class="ml-3">Tokens</span>
      </a>
    </li>
    <li>
      <a href="#"
         class="flex items-center text-gray-900 rounded-lg hover:bg-gray-200 h-8 pr-2.5 text-lg pl-2.5 ">
        <Subscription/>

        <span class="ml-3">Subscription</span>
      </a>
    </li>
    <li>
      <a href="#"
         class="flex items-center text-gray-900 rounded-lg hover:bg-gray-200 h-8 pr-2.5 text-lg pl-2.5 ">
        <Sessions/>
        <span class="ml-3">Sessions</span>
      </a>
    </li>
    <li>
      <a href="#"
         class="flex items-center text-gray-900 rounded-lg hover:bg-gray-200 h-8 pr-2.5 text-lg pl-2.5 ">
        <Webhooks/>
        <span class="ml-3">Webhooks</span>
      </a>
    </li>
    <li>
      <a href="#"
         class="flex items-center text-gray-900 rounded-lg hover:bg-gray-200 h-8 pr-2.5 text-lg pl-2.5 ">
        <Files/>
        <span class="ml-3">Files</span>
      </a>
    </li>
    <li>
      <a href="#"
         class="flex items-center text-gray-900 rounded-lg hover:bg-gray-200 h-8 pr-2.5 text-lg pl-2.5 ">
        <Variable/>
        <span class="ml-3">Variable</span>
      </a>
    </li>
  </ul>
</template>
