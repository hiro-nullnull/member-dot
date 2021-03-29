<template>
    <div class="addMember">
        <h2 class="addMember__title">ひと ふやす</h2>

        <!-- アイコン選択 -->
        <div>
            <!-- 選択したアイコンを表示する領域 -->
            <div></div>

            <!-- アイコン選択ダイアログ -->
            <div></div>
        </div>

        <!-- 名前の入力 -->
        <div class="nes-field addMember__formItem">
            <label class="addMember__formItemLabel" for="memberName"
                >なまえ</label
            >
            <input
                id="memberName"
                class="nes-input"
                type="text"
                name="memberName"
            />
        </div>

        <!-- 説明文の入力 -->
        <div class="nes-field addMember__formItem">
            <label class="addMember__formItemLabel" for="memberIntroduction"
                >せつめい
            </label>
            <input
                id="memberIntroduction"
                class="nes-input"
                type="text"
                name="memberIntroduction"
            />
        </div>

        <!-- メンバーの種類選択 -->
        <div class="addMember__formItem">
            <label class="addMember__formItemLabel" for="default_select">ぶんるい</label>
            <div class="nes-select">
                <select required id="default_select">
                    <option value="" disabled selected hidden>Select...</option>
                    <option value="0">しゃいん</option>
                    <option value="1">いんたーん</option>
                    <option value="2">がいぶいたく</option>
                </select>
            </div>
        </div>

        <!-- 偉い人か -->
        <div class="addMember__formItem">
            <label>
                <input type="checkbox" class="nes-checkbox" checked />
                <span>えらいひと</span>
            </label>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        iconList: {
            type: Array,
            default: () => {}
        }
    },
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
            isTop: ""
        };
    }
};
</script>

<style lang="scss" scoped>
.addMember {
    max-width: 600px;
    margin: auto;
}
.addMember__title {
    font-size: 24px;
    margin-bottom: 30px;
}

.addMember__formItem {
    margin-bottom: 24px;
}

.addMember__formItemLabel {
    font-size: 18px;
    margin-bottom: 18px;
}
</style>
