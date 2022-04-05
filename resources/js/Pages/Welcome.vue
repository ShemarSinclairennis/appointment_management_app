<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template class="bg-white">
    <Head title="Welcome" />
    <div class="flex justify-between">
        <i class="fas fa-feather-alt fa-2x text-blue-700 ml-12 mt-6"></i>
        <div
            class="relative flex items-top justify-center sm:items-center sm:pt-0"
        >
            <div
                v-if="canLogin"
                class="hidden fixed top-0 right-0 px-6 py-4 sm:block"
            >
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="text-sm text-gray-700 underline"
                >
                    Dashboard
                </Link>

                <template v-else>
                    <div class="mt-4">
                        <Link
                            :href="route('login')"
                            class="font-bold text-gray-700"
                        >
                            Log in
                        </Link>

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="ml-4 bg-blue-700 hover:bg-green-300 text-white font-bold py-2 px-4 rounded-lg"
                        >
                            Register
                        </Link>
                    </div>
                </template>
            </div>
        </div>
    </div>
    <div class="mx-12">
        <div
            class="container pt-24 md:pt-48 px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center"
        >
            <div
                class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden"
            >
                <h1
                    class="my-4 text-3xl md:text-5xl text-blue-700 font-bold leading-tight text-center md:text-left slide-in-bottom-h1"
                >
                    Welcome to a simple appointment app.
                </h1>
                <p
                    class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left slide-in-bottom-subtitle"
                >
                    An app that focuses on making and managing doctor
                    appointments.
                </p>

                <p
                    class="text-blue-400 font-bold pb-8 lg:pb-6 text-center md:text-left fade-in"
                >
                    For more work done by or informtion on the creator :
                </p>
                <div
                    class="flex w-full justify-center md:justify-start pb-24 lg:pb-0 fade-in"
                >
                    <a
                        href="https://github.com/ShemarSinclairennis/patient_management_app"
                        target="_blank"
                    >
                        <button
                            class="bg-gradient-to-r from-purple-200 to-purple-300 hover:bg-green-300 text-white font-bold py-2 px-4 rounded-lg"
                        >
                            <i class="fab fa-github mr-2"></i>
                            GitHub
                        </button>
                    </a>

                    <a
                        href=" https://jm.linkedin.com/in/shemar-ennis-6154221b5"
                        target="_blank"
                    >
                        <button
                            class="bg-gradient-to-r from-cyan-400 to-cyan-500 hover:bg-green-300 text-white font-bold py-2 px-4 rounded-lg ml-4"
                        >
                            <i class="fab fa-linkedin mr-2"></i>
                            LinkedIn
                        </button>
                    </a>
                </div>
            </div>
            <div
                class="rounded-xl shadow-lg p-3 h-80 w-1/2 ml-12"
                style="
                    background-image: url(https://images.ctfassets.net/1ny4yoiyrqia/pRAV2OvC0sw4FB33wO76q/b5fedcfa5a10954ed7f45a4e1df8ed40/member-aad-home-950x446.png?w=950);
                "
            ></div>
        </div>
    </div>
</template>

<style scoped>
.bg-gray-100 {
    background-color: #f7fafc;
    background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
}

.border-gray-200 {
    border-color: #edf2f7;
    border-color: rgba(237, 242, 247, var(--tw-border-opacity));
}

.text-gray-400 {
    color: #cbd5e0;
    color: rgba(203, 213, 224, var(--tw-text-opacity));
}

.text-gray-500 {
    color: #a0aec0;
    color: rgba(160, 174, 192, var(--tw-text-opacity));
}

.text-gray-600 {
    color: #718096;
    color: rgba(113, 128, 150, var(--tw-text-opacity));
}

.text-gray-700 {
    color: #4a5568;
    color: rgba(74, 85, 104, var(--tw-text-opacity));
}

.text-gray-900 {
    color: #1a202c;
    color: rgba(26, 32, 44, var(--tw-text-opacity));
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-gray-800 {
        background-color: #2d3748;
        background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
    }

    .dark\:bg-gray-900 {
        background-color: #1a202c;
        background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
    }

    .dark\:border-gray-700 {
        border-color: #4a5568;
        border-color: rgba(74, 85, 104, var(--tw-border-opacity));
    }

    .dark\:text-white {
        color: #fff;
        color: rgba(255, 255, 255, var(--tw-text-opacity));
    }

    .dark\:text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }
}
.slide-in-bottom {
    -webkit-animation: slide-in-bottom 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)
        both;
    animation: slide-in-bottom 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
}
.slide-in-bottom-h1 {
    -webkit-animation: slide-in-bottom 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)
        0.5s both;
    animation: slide-in-bottom 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.5s
        both;
}
.slide-in-bottom-subtitle {
    -webkit-animation: slide-in-bottom 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)
        0.75s both;
    animation: slide-in-bottom 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.75s
        both;
}
.fade-in {
    -webkit-animation: fade-in 1.2s cubic-bezier(0.39, 0.575, 0.565, 1) 1s both;
    animation: fade-in 1.2s cubic-bezier(0.39, 0.575, 0.565, 1) 1s both;
}
.bounce-top-icons {
    -webkit-animation: bounce-top 0.9s 1s both;
    animation: bounce-top 0.9s 1s both;
}

@-webkit-keyframes slide-in-bottom {
    0% {
        -webkit-transform: translateY(1000px);
        transform: translateY(1000px);
        opacity: 0;
    }
    100% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
        opacity: 1;
    }
}
@keyframes slide-in-bottom {
    0% {
        -webkit-transform: translateY(1000px);
        transform: translateY(1000px);
        opacity: 0;
    }
    100% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
        opacity: 1;
    }
}
@-webkit-keyframes bounce-top {
    0% {
        -webkit-transform: translateY(-45px);
        transform: translateY(-45px);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
        opacity: 1;
    }
    24% {
        opacity: 1;
    }
    40% {
        -webkit-transform: translateY(-24px);
        transform: translateY(-24px);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
    }
    65% {
        -webkit-transform: translateY(-12px);
        transform: translateY(-12px);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
    }
    82% {
        -webkit-transform: translateY(-6px);
        transform: translateY(-6px);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
    }
    93% {
        -webkit-transform: translateY(-4px);
        transform: translateY(-4px);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
    }
    25%,
    55%,
    75%,
    87% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
        -webkit-animation-timing-function: ease-out;
        animation-timing-function: ease-out;
    }
    100% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
        -webkit-animation-timing-function: ease-out;
        animation-timing-function: ease-out;
        opacity: 1;
    }
}
@keyframes bounce-top {
    0% {
        -webkit-transform: translateY(-45px);
        transform: translateY(-45px);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
        opacity: 1;
    }
    24% {
        opacity: 1;
    }
    40% {
        -webkit-transform: translateY(-24px);
        transform: translateY(-24px);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
    }
    65% {
        -webkit-transform: translateY(-12px);
        transform: translateY(-12px);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
    }
    82% {
        -webkit-transform: translateY(-6px);
        transform: translateY(-6px);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
    }
    93% {
        -webkit-transform: translateY(-4px);
        transform: translateY(-4px);
        -webkit-animation-timing-function: ease-in;
        animation-timing-function: ease-in;
    }
    25%,
    55%,
    75%,
    87% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
        -webkit-animation-timing-function: ease-out;
        animation-timing-function: ease-out;
    }
    100% {
        -webkit-transform: translateY(0);
        transform: translateY(0);
        -webkit-animation-timing-function: ease-out;
        animation-timing-function: ease-out;
        opacity: 1;
    }
}
@-webkit-keyframes fade-in {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
@keyframes fade-in {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
</style>
