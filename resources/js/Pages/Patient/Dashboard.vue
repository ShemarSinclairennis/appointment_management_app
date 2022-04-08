<template>
    <dashboard-layout :header-caption="Dashboard" header="Dashboard">
        <div class="flex">
            <user-card class="mr-12" />
            <div class="mr-12">
                <div class="text-md text-gray-700 mb-1">
                    Upcoming Appointment:
                </div>
                <date-card
                    class="mb-4"
                    day="25"
                    month="APRIL"
                    :time="timeConvert(upcoming_appointment.appointment_time)"
                    :reason="upcoming_appointment.reason"
                />
                <div class="grid gap-5 grid-cols-2">
                    <base-card class="bg-gray-50 h-28 w-32">
                        <div class="grid place-items-center mt-2">
                            <p class="text-6xl font-bold text-gray-700">
                                {{ appointments_count }}
                            </p>
                            <p class="text-sm">Appointments</p>
                        </div>
                    </base-card>

                    <base-card class="bg-blue-800 h-28 w-32">
                        <div class="grid place-items-center mt-1">
                            <div class="text-xs text-white">Current Date:</div>
                            <div class="text-4xl font-bold text-white">
                                {{ currentDate()[0] }}
                            </div>

                            <p class="text-md text-white">
                                {{ currentDate()[1] }}
                            </p>
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
                <div v-for="appointment in appointments" :key="appointment.id">
                    <div
                        class="grid gap-2 grid-cols-2 font-light text-gray-800 mb-1"
                    >
                        <p>{{ formatDate(appointment.appointment_date) }}</p>

                        <div>
                            {{ timeConvert(appointment.appointment_time) }}
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
import useFormatter from "@/Components/composables/useFormatter";
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
    props: {
        appointments: Array,
        appointments_count: String,
        upcoming_appointment: Object,
    },
    setup(props) {
        const { formatDate } = useFormatter();
        const months = [
            "-- --",
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];
        function currentDate() {
            const current = new Date();
            console.log(current);
            const month = months[current.getMonth() + 1];
            const day = (current.getDate() < 10 ? "0" : "") + current.getDate();
            const date = [day, month];
            return date;
        }

        function timeConvert(time) {
            // Check correct time format and split into components
            if (time == "--:--:--") {
                return time;
            }
            time = time
                .toString()
                .match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

            if (time.length > 1) {
                // If time format correct
                time = time.slice(1); // Remove full string match value
                time[5] = +time[0] < 12 ? "AM" : "PM"; // Set AM/PM
                time[0] = +time[0] % 12 || 12; // Adjust hours
            }
            return time.join(""); // return adjusted time or original string
        }

        return {
            formatDate,
            currentDate,
            timeConvert,
        };
    },
};
</script>

<style></style>
