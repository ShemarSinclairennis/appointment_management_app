<template>
    <dashboard-layout :header-caption="Dashboard" header="Dashboard">
        <div
            v-if="patient_profile_status == '0'"
            class="text-center bg-red-400 text-white rounded-full py-4 w-full mb-3"
        >
            <i class="fas fa-exclamation-circle text-white ml-3"></i>
            Your profile is incomplete, please select the information tab to add
            your personal information
        </div>
        <div class="flex">
            <user-card class="mr-12" />
            <div class="mr-12">
                <div class="text-md text-gray-700 mb-1">
                    Upcoming Appointment:
                </div>
                <date-card
                    class="mb-4"
                    :day="
                        dateSplitter(
                            'not current',
                            upcoming_appointment.appointment_date
                        )[0]
                    "
                    :month="
                        dateSplitter(
                            'not Current',
                            upcoming_appointment.appointment_date
                        )[1]
                    "
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
                                {{ dateSplitter("current", 0)[0] }}
                            </div>

                            <p class="text-md text-white">
                                {{ dateSplitter("current", 0)[1] }}
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
                        <p>{{ dateConvert(appointment.appointment_date) }}</p>

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

                    <div v-for="update in updates" :key="update.id">
                        <div class="flex font-light text-gray-800 mb-1">
                            <div class="mr-4">
                                <i
                                    v-if="update.status == 'Confirmed'"
                                    class="fas fa-check-circle text-green-300"
                                ></i>
                                <i
                                    v-if="update.status == 'Declined'"
                                    class="fas fa-times-circle text-red"
                                ></i>
                            </div>
                            <p>
                                {{
                                    updateApp(
                                        update.appointment_date,
                                        update.appointment_time,
                                        update.status
                                    )
                                }}
                            </p>
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
        updates: Array,
        appointments: Array,
        appointments_count: String,
        upcoming_appointment: Object,
        patient_profile_status: String,
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
        function dateSplitter(action, appointment) {
            if (action == "current") {
                const current = new Date();
                const month = months[current.getMonth() + 1];
                const day =
                    (current.getDate() < 10 ? "0" : "") + current.getDate();
                const date = [day, month];
                return date;
            } else {
                if (appointment == "0000-00-00") {
                    const month = "-";
                    const day = "-";
                    const date = [day, month];
                    return date;
                } else {
                    const current = new Date(appointment);
                    const month = months[current.getMonth() + 1];
                    const day =
                        (current.getDate() < 10 ? "0" : "") + current.getDate();
                    const date = [day, month];
                    return date;
                }
            }
        }

        function dateConvert(date) {
            let appointment_date = new Date(date);
            let result = formatDate(
                appointment_date.getFullYear() +
                    "-" +
                    (appointment_date.getMonth() + 1) +
                    "-" +
                    (appointment_date.getDate() + 1)
            );

            return result;
        }
        function updateApp(date, time, status) {
            if (status.toLowerCase() == "confirmed") {
                var message =
                    "Your appointment for " +
                    dateConvert(date) +
                    " at " +
                    timeConvert(time) +
                    " has been confirmed";
            } else {
                var message =
                    "Your appointment for " +
                    dateConvert(date) +
                    " at " +
                    timeConvert(time) +
                    " has been declined";
            }

            return message;
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
                time[3] = " ";
            }
            return time.join(""); // return adjusted time or original string
        }

        return {
            updateApp,
            dateConvert,
            dateSplitter,
            timeConvert,
        };
    },
};
</script>

<style></style>
