<template>
  <p>
    <a href="/member-management">
      <i
        :class="['nes-octocat', { animate: isActive }]"
        @mouseover="isActive = true"
        @mouseleave="isActive = false"
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
