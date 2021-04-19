<template>
  <div class="addMember">
    <h2 class="addMember__title">ひと ふやす</h2>

    <form class="nes-container with-title">
      <!-- アイコン選択 -->
      <div class="addMember__formItem addMember__selectIcon">
        <!-- 選択したアイコンを表示する領域 -->
        <div v-if="iconName !== ''">
          <vc-member-icon
            :icon-number="iconName"
            :scale-size="5"
          ></vc-member-icon>
        </div>
        <button type="button" class="nes-btn" @click="isShowIconDialog = true">
          アイコンを選択する
        </button>

        <!-- アイコン選択ダイアログ -->
        <div
          v-if="isShowIconDialog"
          class="addMember__iconDialog"
          @click="closeDialogOutsideBody"
          data-dialog-background
        >
          <div class="addMember__iconDialogBody">
            <template v-for="(number, index) in 30" :key="index">
              <div
                class="addMember__iconDialogIconBox"
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

      <!-- 名前の入力 -->
      <div class="nes-field addMember__formItem">
        <label class="addMember__formItemLabel" for="memberName">
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

      <!-- 説明文の入力 -->
      <div class="nes-field addMember__formItem">
        <label class="addMember__formItemLabel" for="memberIntroduction"
          >せつめい
        </label>
        <textarea
          v-model="memberIntroduction"
          id="memberIntroduction"
          class="nes-textarea"
          name="memberIntroduction"
        ></textarea>
      </div>

      <!-- メンバーの種類選択 -->
      <div class="addMember__formItem">
        <label class="addMember__formItemLabel" for="default_select"
          >ぶんるい</label
        >
        <div class="nes-select">
          <select v-model="memberType" required id="default_select">
            <option value="" disabled selected hidden>えらぶのだ. . .</option>
            <option
              v-for="(typeValue, typeKey, index) in memberTypeList"
              :value="typeKey"
              :key="index"
              >{{ typeValue }}
            </option>
          </select>
        </div>
      </div>

      <!-- submit -->
      <div class="addMember__formItem">
        <button
          :class="[
            'addMember__submitButton nes-btn is-primary',
            { 'is-disabled': isLoading }
          ]"
          type="button"
          @click="onClickSubmit()"
        >
          ふやす
        </button>
      </div>

      <!-- 通信結果メッセージ -->
      <p
        :class="[
          'addMember__message nes-text',
          { 'is-primary': !isError, 'is-error': isError }
        ]"
      >
        {{ message }}
      </p>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      memberTypeList: {
        employee: "しゃいん",
        intern: "いんたーん",
        outsourcing: "がいぶいたく"
      },
      iconName: "",
      memberName: "",
      memberIntroduction: "",
      memberType: "",
      isShowIconDialog: false,
      isLoading: false,
      message: "",
      isError: false
    };
  },
  methods: {
    onClickSubmit() {
      this.isLoading = true;
      this.message = "";
      this.isError = false;

      const requestData = {
        name: this.memberName,
        iconName: this.iconName,
        memberType: this.memberType,
        introduction: this.memberIntroduction
      };

      const url = window.location.origin + "/member-management/web-api/add";
      this.axios
        .post(url, requestData)
        .then(res => {
          this.message = res.data.data.message;
          if (res.data.status === 0) {
            this.resetData();
          } else {
            this.isError = true;
          }
        })
        .catch(() => {
          this.message = "しっぱいしたよ";
          this.isError = true;
        })
        .finally(() => {
          this.isLoading = false;
        });
    },
    replaceIconNumber(number) {
      return ("000" + number).slice(-3);
    },
    selectIcon(number) {
      this.iconName = this.replaceIconNumber(number);
      this.isShowIconDialog = false;
    },
    closeDialogOutsideBody(event) {
      const dialogBackground = document.querySelector(
        "[data-dialog-background]"
      );
      if (event.target === dialogBackground) {
        this.isShowIconDialog = false;
      }
    },
    resetData() {
      this.memberName = "";
      this.iconName = "";
      this.memberType = "";
      this.memberIntroduction = "";
    }
  }
};
</script>

<style lang="scss" scoped>
.addMember {
  max-width: 600px;
  margin: auto;
}

.addMember__title {
  text-align: center;
  font-size: 24px;
  margin-bottom: 24px;
  background-color: #f7ebd7;
}

.addMember__selectIcon {
  margin-top: 16px;

  button {
    display: block;
    margin: 50px auto 0;
  }
}

.addMember__iconDialog {
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

.addMember__iconDialogBody {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  background-color: white;
  max-width: 600px;
  box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
}

.addMember__iconDialogIconBox {
  margin: 8px;

  &:hover {
    background-color: rgba(0, 0, 0, 0.3);
  }
}

.addMember__formItem {
  margin-bottom: 24px;

  textarea {
    min-height: 100px;
  }
}

.addMember__formItemLabel {
  font-size: 18px;
  margin-bottom: 18px;
}

.addMember__submitButton {
  display: block;
  padding: 8px;
  margin: auto;
  width: 100px;
}

.addMember__message {
  font-size: 24px;
  margin-bottom: 24px;
  text-align: center;
}
</style>
