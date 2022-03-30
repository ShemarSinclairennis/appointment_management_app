<template>
    <dashboard-layout :header-caption="Dashboard" header="Dashboard">
        <div class="flex">
            <user-card class="mr-12" />
            <div class="mr-12">
                <date-card
                    class="mb-8"
                    day="25"
                    month="APRIL"
                    time="8:00 PM"
                    reason="Update based on car accident."
                />
                <div class="grid gap-5 grid-cols-2">
                    <base-card class="bg-gray-50 h-28 w-32">
                        <div class="grid place-items-center mt-2">
                            <p class="text-6xl font-bold text-gray-700">15</p>
                            <p class="text-sm">Appointments</p>
                        </div>
                    </base-card>

                    <base-card class="bg-blue-800 h-28 w-32">
                        <div class="grid place-items-center mt-2">
                            <i class="fas fa-plus text-6xl text-white"></i>

                            <p class="text-xs text-white">Add Appointments</p>
                        </div>
                    </base-card>
                </div>
            </div>

            <news-card />
        </div>
        <div class="flex mt-14">
            <div class="w-72 mr-12">
                <div class="text-xl text-gray-700 mb-3">
                    Upcoming Appointments
                </div>
                <div
                    class="grid gap-2 grid-cols-2 font-bold mb-2 text-gray-700"
                >
                    <p>Date</p>
                    <p>Time</p>
                </div>
                <div v-for="n in 5" :key="n">
                    <div
                        class="grid gap-2 grid-cols-2 font-light text-gray-800 mb-1"
                    >
                        <p>May 22,2022</p>
                        <div class="flex">
                            <div>8:00 PM</div>
                            <div class="ml-8">
                                <i
                                    class="fas fa-check-circle text-green-300"
                                ></i>
                            </div>
                        </div>
                    </div>
                    <div class="py-2">
                        <div class="w-full border-t border-gray-700"></div>
                    </div>
                </div>
            </div>

            <base-card class="bg-blue-60 h-72 w-4/5">
                <div class="m-4">
                    <div class="text-xl text-gray-700 mb-4">Updates</div>

                    <div v-for="n in 4" :key="n">
                        <div class="flex font-light text-gray-800 mb-1">
                            <div class="mr-4">
                                <i
                                    class="fas fa-check-circle text-green-300"
                                ></i>
                            </div>
                            <p>May 22, 2022 appointment has been confirmed</p>
                        </div>
                        <div class="py-2">
                            <div class="w-full border-t border-gray-700"></div>
                        </div>
                    </div>
                </div>
            </base-card>
        </div>
    </dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import BaseCard from "@/Components/Common/BaseCard";
import UserCard from "@/Components/Common/UserCard";
import DateCard from "@/Components/Common/DateCard";
import NewsCard from "@/Components/Common/NewsCard";
import SmallTable from "@/Components/Common/SmallTable";

export default {
    components: {
        DashboardLayout,
        UserCard,
        DateCard,
        BaseCard,
        NewsCard,
        SmallTable,
    },
};
</script>

<style></style>
