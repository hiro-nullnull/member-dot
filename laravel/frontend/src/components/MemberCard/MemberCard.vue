<template>
    <div class="memberCard">
        <vc-member-icon :icon-number="iconNumber"></vc-member-icon>
        <p>{{ memberName }}</p>
    </div>
</template>

<script>
export default {
    name: "vc-member-card",
    props: {
        iconNumber: {
            type: String,
            default: ""
        },
        isScale: {
            type: Boolean,
            default: false
        },
        memberName: {
            type: String,
            default: ""
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
.memberCard {
    max-width: 160px;
    width: 100%;
    height: auto;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    margin: auto;
    padding: 8px;

    p {
        text-align: center;
        font-weight: bold;
    }

    &:hover {
        background-color: rgba(0, 0, 0, 0.1);
    }
}
</style>
