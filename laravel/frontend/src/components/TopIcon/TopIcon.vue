<template>
    <p>
        <a href="/member-management">
            <i
                class="nes-octocat"
                :class="{ animate: isActive }"
                @mouseover="isActive = true"
            ></i>
        </a>
    </p>
</template>

<script>
export default {
    name: "vc-top-icon",
    data() {
        return {
            isActive: false
        };
    }
};
</script>
