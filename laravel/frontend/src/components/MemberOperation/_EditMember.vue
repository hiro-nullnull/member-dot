<template>
  <div class="editMember">
    <h2 class="editMember__title">ひと かえる</h2>

    <!-- メンバー一覧 -->
    <ul>
      <template v-for="(members, index) in displayMemberList" :key="index">
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
              <div class="editMember__memberCard" @click="openDialog(member)">
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
        <form>
          <vc-member-icon
            class="editMember__editDialogIcon"
            @click="isShowIconDialog = true"
            :icon-number="iconName"
            :scale-size="5"
          ></vc-member-icon>

          <div class="nes-field editMember__dialogItem">
            <label class="editMember__dialogItemLabel" for="memberName">
              なまえ
            </label>
            <input
              v-model="memberName"
              id="memberName"
              class="nes-input"
              type="text"
              name="memberName"
              maxlength="20"
            />
          </div>

          <div class="nes-field editMember__dialogItem">
            <label class="editMember__dialogItemLabel" for="memberIntroduction"
              >せつめい
            </label>
            <textarea
              v-model="memberIntroduction"
              id="memberIntroduction"
              class="nes-textarea"
              name="memberIntroduction"
            ></textarea>
          </div>

          <div class="editMember__editDialogBodyButtons">
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

          <p
            :class="[
              'editMember__editDialogMessage nes-text',
              { 'is-error': isError, 'is-primary': !isError }
            ]"
          >
            {{ message }}
          </p>
        </form>
      </div>
    </div>

    <!-- アイコン選択ダイアログ -->
    <div
      v-if="isShowIconDialog"
      class="editMember__iconDialog"
      @click="closeIconDialogOutsideBody"
      data-icon-dialog-background
    >
      <div class="editMember__iconDialogBody">
        <template v-for="(number, index) in 30" :key="index">
          <div
            class="editMember__iconDialogIconBox"
            @click="selectIcon(number)"
          >
            <vc-member-icon
              :icon-number="replaceIconNumber(number)"
            ></vc-member-icon>
          </div>
        </template>
      </div>
    </div>
  </div>
</template>

<script>
import store from "@/store";

export default {
  data() {
    return {
      displayMemberList: store.state.originalMemberList,
      columnTitles: {
        employee: "しゃいん",
        intern: "いんたーん",
        outsourcing: "がいぶいたく"
      },
      selectedMember: null,
      iconName: "",
      memberName: "",
      memberIntroduction: "",
      memberType: "",
      message: "",
      isShowEditDialog: false,
      isShowIconDialog: false,
      isError: false
    };
  },
  methods: {
    openDialog(member) {
      this.selectedMember = member;
      this.iconName = member.icon_name;
      this.memberName = member.name;
      this.memberIntroduction = member.introduction;
      this.memberType = member.member_type;
      this.message = "";
      this.isError = false;
      this.isShowEditDialog = true;
    },
    editMember() {
      const url = window.location.origin + "/member-management/web-api/edit";
      const requestParams = {
        memberId: this.selectedMember.id,
        name: this.memberName,
        iconName: this.iconName,
        introduction: this.memberIntroduction,
        memberType: this.memberType
      };
      this.axios.put(url, requestParams).then(res => {
        this.message = res.data.data.message;

        if (res.data.status === 0) {
          store.commit("updateMemberList", {
            id: this.selectedMember.id,
            name: this.memberName,
            icon_name: this.iconName,
            introduction: this.memberIntroduction,
            member_type: this.memberType
          });
        } else {
          this.isError = true;
        }
      });
    },
    closeEditDialogOutsideBody(event) {
      const dialogBackground = document.querySelector(
        "[data-dialog-background]"
      );
      if (event.target === dialogBackground) {
        this.isShowEditDialog = false;
      }
    },
    closeIconDialogOutsideBody(event) {
      const dialogBackground = document.querySelector(
        "[data-icon-dialog-background]"
      );
      if (event.target === dialogBackground) {
        this.isShowIconDialog = false;
      }
    },
    replaceIconNumber(number) {
      return ("000" + number).slice(-3);
    },
    selectIcon(number) {
      this.iconName = this.replaceIconNumber(number);
      this.isShowIconDialog = false;
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

%dialog {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgba(0, 0, 0, 0.5);
}

%dialogBody {
  display: flex;
  flex-direction: column;
  background-color: white;
  width: 100%;
  padding: 24px;
  text-align: center;
  box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
}

.editMember__editDialog {
  @extend %dialog;
  z-index: 10;
}

.editMember__editDialogBody {
  @extend %dialogBody;
  max-width: 600px;
}

.editMember__dialogItem {
  margin-bottom: 24px;

  textarea {
    min-height: 100px;
  }
}

.editMember__dialogItemLabel {
  font-size: 18px;
  margin-bottom: 18px;
  text-align: left;
  width: 100%;
}

.editMember__editDialogIcon {
  margin: 16px 0 40px;
}

.editMember__editDialogBodyButtons {
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  align-items: center;
  margin: 0 auto 18px;
  max-width: 300px;

  button {
    margin: 0 24px;
  }
}

.editMember__editDialogMessage {
  font-size: 18px;
}

.editMember__iconDialog {
  @extend %dialog;
  z-index: 20;
}

.editMember__iconDialogBody {
  @extend %dialogBody;
  flex-direction: row;
  flex-wrap: wrap;
  max-width: 600px;
}

.editMember__iconDialogIconBox {
  margin: 8px;

  &:hover {
    background-color: rgba(0, 0, 0, 0.3);
  }
}
</style>
