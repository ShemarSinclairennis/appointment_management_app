<template>
    <base-card class="bg-peach h-64 w-72"
        ><img class="h-36 rounded-xl w-full" src="/img/img.jpg" />
        <div class="mt-6">
            <div class="flex">
                <div class="font-semibold">Name</div>
                <div class="font-light">
                    : {{ $page.props.auth.user.first_name }}
                    {{ $page.props.auth.user.last_name }}
                </div>
            </div>
            <div class="flex text-sm text-gray-700">
                <div class="font-semibold">Email</div>
                <div class="font-light">
                    : {{ $page.props.auth.user.email }}
                </div>
            </div>
        </div>
    </base-card>
</template>

<script>
import BaseCard from "@/Components/Common/BaseCard";
export default {
    components: {
        BaseCard,
    },
};
</script>

<style></style>
