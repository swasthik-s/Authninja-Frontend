  <script setup>
  import DropdownLink from "@/Components/Shared/DropdownLink.vue";
  import Dropdown from "@/Components/Shared/Dropdown.vue";
  import {router} from "@inertiajs/vue3";
  import {ref} from "vue";

  const showingNavigationDropdown = ref(false);

  const logout = () => {
    router.post(route('logout'));
  };
  </script>

  <template>
    <nav class="flex-0 flex items-center gap-3">
      <div class="">
        <div class="ms-3 relative ">
          <!-- Header Dropdown -->
          <Dropdown align="right" width="48">
            <template #trigger>
              <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
              </button>
                <span v-else class="inline-flex rounded-md">
                  <button type="button" class="inline-flex items-center px-1 py-1 border border-transparent text-sm leading-4 font-medium rounded-md bg-gray-100 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 active:bg-gray-100 transition ease-in-out duration-150">
                    <img class="h-8 w-8 rounded-full object-cover" :src="'https://ui-avatars.com/api/?name=' + encodeURIComponent($page.props.auth.user.name) + '&color=7F9CF5&background=EBF4FF'" :alt="$page.props.auth.user.name">
                  </button>
                </span>
            </template>
            <!-- Header Dropdown Content -->
            <template #content>
              <div class="block px-4 py-2 text-xs text-gray-400">Manage Account</div>
              <DropdownLink :href="route('profile.show')">Profile</DropdownLink>
              <div class="border-t border-gray-200" />
              <form @submit.prevent="logout"><DropdownLink as="button">Log Out</DropdownLink></form>
            </template>
          </Dropdown>
        </div>
      </div>
    </nav>
  </template>
