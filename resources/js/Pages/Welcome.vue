<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ApplicationBrandLogo from "@/Components/Shared/ApplicationBrandLogo.vue";
import MobileTabs from "@/Pages/HomeComponents/MobileTabs.vue";
import DesktopTabs from "@/Pages/HomeComponents/DesktopTabs.vue";
import { ref, onMounted, onBeforeUnmount } from 'vue';
import '../../../resources/css/app.css';


const isMenuOpen = ref(false);
const animationDuration = ref('2s')
const isScrolled = ref(false);

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};

onMounted(() => {
  // Trigger the animations after the component is mounted
  showRightGradient.value = true;
  showLeftGradient.value = true;
});

const handleScroll = () => {
    isScrolled.value = window.scrollY > 0;
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onBeforeUnmount(() => {
    window.removeEventListener('scroll', handleScroll);
});

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

</script>
<template>
    <body class="bg-zinc-950 antialiased selection:bg-cyan-300 selection:text-cyan-800">
        <div class="overflow-clip">
            <div>
                <header :class="{ 'fixed': isScrolled, 'backdrop-blur-lg': isScrolled, 'border-b-2': isScrolled }"
                    class="absolute inset-x-0 top-0 z-10">
                    <!-- Mobile View-->
                    <div class="md:max-w-7xl mx-auto w-full max-w-5xl px-6">
                        <div class="absolute left-0 top-0 z-20 flex w-full flex-col items-center md:hidden">
                            <div class="flex w-full items-center px-6 py-4 bg-zinc-800  backdrop-blur-lg"
                                :class="{ 'scrolling-border': isScrolled }">
                                <div class="flex-auto">
                                    <a class="outline-none transition duration-150 ease-in-out " href="#">
                                        <ApplicationBrandLogo />
                                    </a>
                                </div>
                                <div class="flex flex-auto justify-end">
                                    <!-- Toggle Button -->
                                    <button @click="toggleMenu"
                                        class="inline-flex items-center justify-center rounded-md p-1 text-slate-100 hover:text-black transition ease-in-out hover:bg-slate-50 "
                                        type="button">
                                        <span class="sr-only">Toggle menu</span>
                                        <svg v-if="!isMenuOpen" aria-hidden="true" class="block h-8 w-8" fill="none"
                                            stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                        <svg v-else aria-hidden="true" class="block h-8 w-8" fill="none"
                                            stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div v-show="isMenuOpen" class="bg-zinc-950 w-full px-6 py-4 md:hidden" id="mobile-menu">
                                <div v-if="canLogin" class="flex w-full flex-col">
                                    <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                                        class="font-semi-bold text-gray-600 hover:text-gray-900">Client Area</Link>
                                    <template v-else>
                                        <Link :href="route('login')"
                                            class="h-11 pl-4 pr-4 rounded-md gap-2 font-semi-bold border-gray-500 text-slate-100 hover:bg-zinc-200 hover:text-black inline-flex items-center border justify-center select-none transition ease-in-out duration-200 mb-4 w-full">
                                        Log in</Link>
                                        <Link v-if="canRegister" :href="route('register')"
                                            class="h-11 pl-4 pr-4 rounded-md gap-2 font-semibold bg-white text-black inline-flex items-center border justify-center select-none transition ease-in-out duration-200 mb-4 w-full">
                                        Get Started</Link>
                                    </template>
                                    <MobileTabs />
                                </div>
                            </div>
                        </div>
                        <!-- Desktop View-->
                        <div
                            class="mx-auto hidden h-[58px] w-full items-center justify-between transition duration-500 ease-in-out md:flex">
                            <div class="flex lg:w-[225px]">
                                <span data-state="closed">
                                    <a class="outline-none backdrop-blur-lg transition duration-150 ease-in-out py-1 px-1"
                                        aria-label="AuthNinja" href="/#">
                                        <ApplicationBrandLogo />
                                    </a>
                                </span>
                            </div>
                            <DesktopTabs />
                            <div v-if="canLogin" class="flex gap-4">
                                <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                                    class=" flex outline-none text-sm h-10 pl-4 pr-2 gap-0 font-semibold bg-white text-black items-center justify-center select-none rounded-lg transition ease-in-out duration-200">
                                Client Area<span class="text-[#70757E]">
                                    <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.75 8.75L14.25 12L10.75 15.25" stroke="currentColor"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                        </path>
                                    </svg>
                                </span>
                                </Link>
                                <template v-else>
                                    <Link :href="route('login')"
                                        class="outline-none hover:bg-gray-50 hover:text-black transition duration-150 ease-in-out text-sm h-10 pl-4 pr-4 gap-0 font-semibold bg-slate-1 text-slate-100 hover:bg-slate-5 inline-flex items-center justify-center select-none rounded-lg lg:flex"
                                        data-state="closed">Log in</Link>
                                    <Link v-if="canRegister" :href="route('register')"
                                        class="outline-none text-sm h-10 pl-4 pr-2 gap-0 font-semibold bg-white text-black inline-flex items-center justify-center select-none rounded-lg transition ease-in-out duration-200"
                                        data-state="closed">Get Started
                                    <span class="text-[#70757E]">
                                        <svg fill="none" height="24" viewBox="0 0 24 24" width="24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.75 8.75L14.25 12L10.75 15.25" stroke="currentColor"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                            </path>
                                        </svg>
                                    </span>
                                    </Link>
                                </template>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
            <main>
                <section class="relative isolate transform-gpu pt-14">
                  <!-- bg-[image:radial-gradient(80%_50%_at_50%_-20%,hsl(206,81.9%,65.3%,0.5),rgba(255,255,255,0))] -->
                  <div class="absolute inset-0 -z-10 moving-gradient"></div>
                    <svg class="absolute inset-0 -z-10 h-full w-full stroke-white/5 [mask-image:radial-gradient(75%_50%_at_top_center,white,transparent)]"
                        aria-hidden="true">
                        <defs>
                            <pattern id="hero" width="80" height="80" x="50%" y="-1" patternUnits="userSpaceOnUse">
                                <path d="M.5 200V.5H200" fill="none"></path>
                            </pattern>
                        </defs>
                        <rect width="100%" height="100%" stroke-width="0" fill="url(#hero)">
                        </rect>
                    </svg>
                    <div class="py-24 sm:py-32 lg:pb-40">
                        <div class="mx-auto max-w-7xl px-6 lg:px-8">
                            <div class="relative mx-auto max-w-3xl text-center">
                                <h1 class="animate-[zoom-in_1s_ease-in-out] bg-gradient-to-br from-white to-zinc-500 bg-clip-text text-5xl/[1.07] font-bold tracking-tight text-transparent md:text-7xl/[1.07]" style="opacity: 1; transform: none;">Unleash the power of Cloud Authentication</h1>
                              <div class="animate-[fade-in-up_1s_ease-in-out] flex flex-col items-center justify-center gap-y-4">
                                <p ref="delayedParagraph" class="animate-[fade-in-up_1s_ease-in-out] mt-6 text-lg font-medium text-zinc-400 md:text-xl" style="opacity: 1; transform: none;">With the AuthNinja platform, you are able to
                                    seamlessly integrate cloud-based subscription hosting with open-source software.</p>
                                    <div style="opacity: 1; transform: none;">
                                        <div class="mt-10 flex gap-4 items-center justify-center gap-y-8">
                                            <!-- Updated to a flex container with row layout -->
                                            <button class="group relative rounded-full p-px text-sm/6 text-zinc-400 duration-300 hover:text-zinc-100 hover:shadow-glow" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:Rjljaqla:" data-state="closed">
                                                <Link v-if="canRegister" :href="route('register')" class="h-11 pl-4 pr-4 rounded-md gap-2 font-semibold bg-transparent text-zinc-400 hover:text-white inline-flex items-center border justify-center select-none transition ease-in-out duration-200 mb-4">
                                                Get Started</Link>
                                                <span class="absolute -bottom-0 left-[1.125rem] h-px w-[calc(100%-2.25rem)] bg-gradient-to-r from-cyan-400/0 via-cyan-400/90 to-cyan-400/0 opacity-0 transition-opacity duration-500 group-hover:opacity-40"></span>
                                            </button>

                                            <button class="group relative rounded-full p-px text-sm/6 text-zinc-400 duration-300 hover:text-zinc-100 hover:shadow-glow" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:Rjljaqla:" data-state="closed">
                                                <Link v-if="canRegister" :href="route('register')" class="h-11 pl-4 pr-4 rounded-md gap-2 font-semibold bg-transparent text-zinc-400 hover:text-white inline-flex items-center border justify-center select-none transition ease-in-out duration-200 mb-4">
                                                Documentation</Link>
                                                <span class="absolute -bottom-0 left-[1.125rem] h-px w-[calc(100%-2.25rem)] bg-gradient-to-r from-cyan-400/0 via-cyan-400/90 to-cyan-400/0 opacity-0 transition-opacity duration-500 group-hover:opacity-40"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="group" style="opacity: 1; margin-top: 1rem;">
                                        <!-- Adjusted margin-top for spacing -->
                                      <a class="flex flex-col items-center gap-1 justify-center" href="/#intro">
                                        <p class="animate-bounce w-9 h-9 rounded-full hover:text-white border text-center flex items-center justify-center">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                               viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                               stroke-linecap="round" stroke-linejoin="round"
                                               class="text-zinc-400">
                                            <path d="M12 5v14"></path>
                                            <path d="m19 12-7 7-7-7"></path>
                                          </svg>
                                        </p>
                                      </a>
                                    </div>
                                </div>
                            </div>
                            <div class="perspective-[1500px] relative pt-16" style="opacity: 1;">
                                <div class="pointer-events-none absolute -top-36 left-1/2 h-[32rem] w-full -translate-x-1/2 -translate-y-1/2 overflow-hidden lg:w-[60rem]"
                                    id="tsparticles">
                                    <canvas
                                        style="width: 100% !important; height: 100% !important; position: fixed !important; z-index: 0 !important; top: 0px !important; left: 0px !important; pointer-events: none;"
                                        data-generated="false" aria-hidden="true" width="960" height="512"></canvas>
                                </div>
                              <div class="relative">
                                <div class="absolute -top-px right-20 h-2 w-20 [mask-image:linear-gradient(to_right,rgba(217,217,217,0)_0%,#d9d9d9_25%,#d9d9d9_75%,rgba(217,217,217,0)_100%)] md:w-32 lg:w-64">
                                  <div class="h-px w-full animate-starlight-right bg-gradient-to-r from-cyan-400/0 via-cyan-400 to-cyan-400/0"></div>
                                </div>
                                <div class="rounded-md bg-zinc-950 ring-1 ring-white/10 lg:rounded-2xl">
                                  <div class="" style="opacity: 1;">
                                    <img alt="App screenshot" fetchpriority="high" width="4200" height="2490" decoding="async" data-nimg="1" class="rounded-md lg:rounded-2xl" style="color:transparent" sizes="(max-width: 768px) 100vw, (max-width: 1200px) 50vw, 40vw" src="#">
                                  </div>
                                </div>
                                <div class="absolute -bottom-2 left-20 h-2 w-20 [mask-image:linear-gradient(to_right,rgba(217,217,217,0)_0%,#d9d9d9_25%,#d9d9d9_75%,rgba(217,217,217,0)_100%)] md:w-32 lg:w-64">
                                  <div class="h-px w-full animate-starlight-left bg-gradient-to-r from-cyan-400/0 via-cyan-400 to-cyan-400/0"></div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </body>
</template>
