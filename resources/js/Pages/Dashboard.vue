<template>
    <dashboard-layout :header-caption="Dashboard" header="Dashboard">
        <div class="flex">
            <user-card class="mr-12" name="Jessy Jane" email="jane@gmail.com" />
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
                            <p class="text-6xl">25</p>
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
    </dashboard-layout>
</template>

<script>
import DashboardLayout from "@/Layouts/DashboardLayout";
import BaseCard from "@/Components/Common/BaseCard";
import UserCard from "@/Components/Common/UserCard";
import DateCard from "@/Components/Common/DateCard";
import NewsCard from "@/Components/Common/NewsCard";

export default {
    components: {
        DashboardLayout,
        UserCard,
        DateCard,
        BaseCard,
        NewsCard,
    },
};
</script>

<style></style>
