<template>
    <div class="deleteMember">
        <h2 class="deleteMember__title">ひと けす</h2>

        <!-- メンバー一覧 -->
        <ul>
            <template
                v-for="(members, index) in displayMemberList"
                :key="index"
            >
                <li
                    v-if="Object.keys(members).length > 0"
                    class="nes-container with-title deleteMember_column"
                >
                    <p class="title deleteMember__listTitle">
                        {{ columnTitles[index] }}
                    </p>
                    <div class="deleteMember__listContent">
                        <div
                            v-for="(member, index) in members"
                            class="deleteMember__listContentItem"
                            :key="index"
                        >
                            <div
                                class="deleteMember__memberCard"
                                @click="
                                    openDialog(
                                        member.id,
                                        member.name,
                                        member.icon_name
                                    )
                                "
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

        <!-- 削除確認ダイアログ -->
        <div
            v-if="isShowDialog"
            class="deleteMember__confirmDialog"
            @click="closeDialogOutsideBody"
            data-dialog-background
        >
            <div class="deleteMember__confirmDialogBody">
                <vc-member-icon
                    :icon-number="selectedMemberIconName"
                ></vc-member-icon>

                <p class="deleteMember__confirmDialogBodyTitle">
                    <span v-if="!isDeleted"
                        >{{ selectedMemberName }} を けす？</span
                    >
                    <span v-else class="nes-text is-error"
                        >{{ selectedMemberName }} を けした</span
                    >
                </p>

                <div
                    v-if="!isDeleted"
                    class="deleteMember__confirmDialogBodyButtons"
                >
                    <button
                        @click="isShowDialog = false"
                        type="button"
                        class="nes-btn"
                    >
                        やめる
                    </button>
                    <button
                        @click="deleteMember()"
                        type="button"
                        class="nes-btn is-error"
                    >
                        けす
                    </button>
                </div>

                <p class="deleteMember__confirmDialogMessage nes-text is-error">
                    {{ message }}
                </p>
            </div>
        </div>
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
            isShowDialog: false,
            selectedMemberName: "",
            selectedMemberId: 0,
            isDeleted: false,
            selectedMemberIconName: "",
            message: "",
            displayMemberList: this.memberList,
            columnTitles: {
                employee: "しゃいん",
                intern: "いんたーん",
                outsourcing: "がいぶいたく"
            }
        };
    },
    methods: {
        openDialog(memberId, memberName, memberIconName) {
            this.selectedMemberId = memberId;
            this.selectedMemberName = memberName;
            this.selectedMemberIconName = memberIconName;
            this.isShowDialog = true;
        },
        deleteMember() {
            const url =
                window.location.origin + "/member-management/web-api/delete";
            this.axios
                .put(url, { memberId: this.selectedMemberId })
                .then(res => {
                    if (res.data.status === 0) {
                        this.isDeleted = true;
                        this.filterDisplayMemberList(this.selectedMemberId);
                    } else {
                        this.message = "けせなかった。。。";
                    }
                });
        },
        closeDialogOutsideBody(event) {
            const dialogBackground = document.querySelector(
                "[data-dialog-background]"
            );
            if (event.target === dialogBackground) {
                this.isShowDialog = false;
            }
        },
        filterDisplayMemberList(memberId) {
            Object.keys(this.displayMemberList).forEach(memberType => {
                const tmpList = Object.keys(
                    this.displayMemberList[memberType]
                ).map(index => {
                    return this.displayMemberList[memberType][index];
                });

                this.displayMemberList[memberType] = [
                    ...tmpList.filter(member => {
                        return member.id !== memberId;
                    })
                ];
            });
        }
    },
    watch: {
        isShowDialog() {
            if (this.isShowDialog) {
                return;
            }

            this.selectedMemberName = "";
            this.selectedMemberId = 0;
            this.isDeleted = false;
            this.selectedMemberIconName = "";
            this.message = "";
        }
    }
};
</script>

<style lang="scss" scoped>
.deleteMember {
    ul {
        list-style: none;
    }
}

.deleteMember__title {
    text-align: center;
    font-size: 24px;
    margin-bottom: 24px;
    background-color: #f7ebd7;
}

.deleteMember_column {
    margin: 0 40px 40px 40px;

    &.nes-container.with-title > .deleteMember__listTitle {
        font-size: 24px;
        background-color: #f7ebd7;
    }
}

.deleteMember__listContent {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-around;
    max-width: 100%;
    margin-bottom: 64px;
}

.deleteMember__listContentItem {
    max-width: 33.3%;
    width: 100%;
    margin-bottom: 8px;
    text-align: center;
}

.deleteMember__memberCard {
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

.deleteMember__confirmDialog {
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

.deleteMember__confirmDialogBody {
    display: flex;
    flex-direction: column;
    background-color: white;
    min-width: 300px;
    padding: 24px;
    text-align: center;
    box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
}

.deleteMember__confirmDialogBodyTitle {
    font-size: 18px;
    margin-bottom: 32px;
}

.deleteMember__confirmDialogBodyButtons {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    margin-bottom: 18px;

    button {
        margin: 0 24px;
    }
}

.deleteMember__confirmDialogMessage {
    font-size: 18px;
}
</style>
