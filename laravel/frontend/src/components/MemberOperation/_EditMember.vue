<template>
    <div class="editMember">
        <h2 class="editMember__title">ひと かえる</h2>

        <!-- メンバー一覧 -->
        <ul>
            <template
                v-for="(members, index) in displayMemberList"
                :key="index"
            >
                <li
                    v-if="Object.keys(members).length > 0"
                    class="nes-container with-title editMember_column"
                >
                    <p class="title editMember__listTitle">
                        {{ columnTitles[index] }}
                    </p>
                    <div class="editMember__listContent">
                        <div
                            v-for="(member, index) in members"
                            class="editMember__listContentItem"
                            :key="index"
                        >
                            <div
                                class="editMember__memberCard"
                                @click="openDialog(member)"
                            >
                                <vc-member-icon
                                    :icon-number="member.icon_name"
                                ></vc-member-icon>
                                <p>{{ member.name }}</p>
                            </div>
                        </div>
                    </div>
                </li>
            </template>
        </ul>

        <!-- 変更ダイアログ -->
        <div
            v-if="isShowEditDialog"
            class="editMember__editDialog"
            @click="closeEditDialogOutsideBody"
            data-dialog-background
        >
            <div class="editMember__editDialogBody">
                <vc-member-icon
                    :icon-number="selectedMember.icon_name"
                ></vc-member-icon>

                <div
                    v-if="!isEdited"
                    class="editMember__editDialogBodyButtons"
                >
                    <button
                        @click="isShowEditDialog = false"
                        type="button"
                        class="nes-btn"
                    >
                        やめる
                    </button>
                    <button
                        @click="editMember()"
                        type="button"
                        class="nes-btn is-primary"
                    >
                        かえる
                    </button>
                </div>

                <p class="editMember__editDialogMessage nes-text is-error">
                    {{ message }}
                </p>
            </div>
        </div>

        <!-- アイコン選択ダイアログ -->
    </div>
</template>

<script>
export default {
    props: {
        memberList: {
            type: Object,
            default: () => {}
        }
    },
    data() {
        return {
            displayMemberList: this.memberList,
            columnTitles: {
                employee: "しゃいん",
                intern: "いんたーん",
                outsourcing: "がいぶいたく"
            },
            selectedMember: null,
            message: "",
            isShowEditDialog: false,
            isEdited: false
        };
    },
    methods: {
        openDialog(member) {
            this.selectedMember = member;
            this.isShowEditDialog = true;
        },
        editMember() {
            const url =
                window.location.origin + "/member-management/web-api/edit";
            const requestParams = {
                memberId: this.selectedMember.id,
                name: this.selectedMember.name,
                iconName: this.selectedMember.icon_name,
                introduction: this.selectedMember.introduction
            };
            this.axios.put(url, requestParams);
        },
        closeEditDialogOutsideBody(event) {
            const dialogBackground = document.querySelector(
                "[data-dialog-background]"
            );
            if (event.target === dialogBackground) {
                this.isShowEditDialog = false;
            }
        }
    }
};
</script>

<style lang="scss" scoped>
.editMember {
    ul {
        list-style: none;
    }
}

.editMember__title {
    text-align: center;
    font-size: 24px;
    margin-bottom: 24px;
    background-color: #f7ebd7;
}

.editMember_column {
    margin: 0 40px 40px 40px;

    &.nes-container.with-title > .editMember__listTitle {
        font-size: 24px;
        background-color: #f7ebd7;
    }
}

.editMember__listContent {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-around;
    max-width: 100%;
    margin-bottom: 64px;
}

.editMember__listContentItem {
    max-width: 33.3%;
    width: 100%;
    margin-bottom: 8px;
    text-align: center;
}

.editMember__memberCard {
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

.editMember__editDialog {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 10;
}

.editMember__editDialogBody {
    display: flex;
    flex-direction: column;
    background-color: white;
    min-width: 300px;
    padding: 24px;
    text-align: center;
    box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
}

.editMember__editDialogBodyTitle {
    font-size: 18px;
    margin-bottom: 32px;
}

.editMember__editDialogBodyButtons {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    margin-bottom: 18px;

    button {
        margin: 0 24px;
    }
}

.editMember__editDialogMessage {
    font-size: 18px;
}
</style>
