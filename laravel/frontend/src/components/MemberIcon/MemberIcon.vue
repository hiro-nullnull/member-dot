<template>
    <div class="memberIconContainer">
        <div
            class="memberIconContainer__icon"
            :style="[
                { background: 'url(' + imgPath + ')' },
                { transform: 'translate(-50%, -50%) scale(' + scaleSize + ')' }
            ]"
        ></div>
    </div>
</template>

<script>
export default {
    name: "vc-member-icon",
    props: {
        iconNumber: {
            type: String,
            default: ""
        },
        scaleSize: {
            type: Number,
            default: 2.5
        }
    },
    data() {
        return {
            imgPath: `assets/img/character/${this.iconNumber}.png`
        };
    }
};
</script>

<style lang="scss" scoped>
.memberIconContainer {
    position: relative;
    min-width: 50px;
    min-height: 80px;
}

.memberIconContainer__icon {
    position: absolute;
    top: 50%;
    left: 50%;
    background: no-repeat;
    width: 20px;
    height: 30px;
    animation: move 1s steps(3) infinite;
    background-position: 0 -2px;
}

@keyframes move {
    to {
        background-position: -60px -2px;
    }
}
</style>
