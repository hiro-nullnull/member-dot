<template>
    <div class="memberCard" @click="openDialog()">
        <vc-member-icon :icon-number="iconNumber"></vc-member-icon>
        <p>{{ memberName }}</p>
    </div>

    <!-- ダイアログ起動 -->
    <div
        v-if="isShowDialog"
        class="memberCardDialog"
        @click="closeDialogOutsideContainer"
        data-dialog-background
    >
        <div class="memberCardDialog__container">
            <div class="memberCardDialog__memberIcon">
                <vc-member-icon
                    :icon-number="iconNumber"
                    :scale-size="3.5"
                ></vc-member-icon>
            </div>
            <p class="memberCardDialog__memberName">{{ memberName }}</p>
            <p class="memberCardDialog__memberIntroduction">
                {{ memberIntroduction }}
            </p>
            <span
                class="memberCardDialog__closeButton"
                @click="closeDialogInContainer()"
            >
                とじる
            </span>
        </div>
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
        memberName: {
            type: String,
            default: ""
        },
        memberIntroduction: {
            type: String,
            default: ""
        }
    },
    data() {
        return {
            imgPath: `assets/img/character/${this.iconNumber}.png`,
            isShowDialog: false
        };
    },
    methods: {
        openDialog() {
            this.isShowDialog = true;
            document.getElementById("body").style.overflow = "hidden";
        },
        closeDialogOutsideContainer(event) {
            const dialogBody = document.querySelector(
                "[data-dialog-background]"
            );
            if (event.target === dialogBody) {
                document.getElementById("body").style.overflow = "scroll";
                this.isShowDialog = false;
            }
        },
        closeDialogInContainer() {
            document.getElementById("body").style.overflow = "scroll";
            this.isShowDialog = false;
        }
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
    border-radius: 6px;

    p {
        text-align: center;
        font-weight: bold;
    }

    &:hover {
        background-color: rgba(0, 0, 0, 0.1);
    }
}

.memberCardDialog {
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3);
    z-index: 50;
}
.memberCardDialog__container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-content: center;
    max-width: 500px;
    width: 100%;
    padding: 16px 24px;
    background-color: white;
    box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
}

.memberCardDialog__memberIcon {
    margin-bottom: 24px;
}

.memberCardDialog__memberName {
    font-size: 20px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 24px;
}

.memberCardDialog__memberIntroduction {
    font-size: 18px;
    margin-bottom: 24px;
}

.memberCardDialog__closeButton {
    display: block;
    width: 120px;
    padding: 8px;
    border: 1px solid #666;
    text-align: center;
    margin: auto;

    &:hover {
        background-color: rgba(0, 0, 0, 0.2);
    }
}
</style>
