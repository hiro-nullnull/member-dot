<template>
    <!-- パスワード入力画面 -->
    <div class="memberOperationAuthorizeDialog">
        <div class="memberOperationAuthorizeDialog__body">
            <div>
                <div class="nes-field addMember__formItem">
                    <label class="addMember__formItemLabel" for="memberName">
                        なまえ
                    </label>
                    <input
                        v-model="authorizePassword"
                        id="memberName"
                        class="nes-input"
                        type="text"
                        name="memberName"
                        maxlength="20"
                    />
                </div>
                <button type="button" class="nes-btn is-primary">入力</button>
            </div>
        </div>
    </div>

    <!-- 操作選択 -->
    <section class="memberOperationListContainer">
        <!-- ふやす -->
        <!-- かえる -->
        <!-- けす -->
        <div class="nes-container memberOperation__operationSelect">
            <label
                v-for="(operation, key, index) in operationList"
                :key="index"
            >
                <input
                    v-model="selectedOperation"
                    :value="key"
                    type="radio"
                    class="nes-radio"
                    :name="key"
                    :checked="selectedOperation === key"
                />
                <span>{{ operation }}</span>
            </label>
        </div>
    </section>

    <!-- 操作ごとのコンポーネントを表示 -->
    <section class="memberOperationComponentContainer">
        <div v-if="selectedOperation === 'add'">
            <add-member></add-member>
        </div>
        <div v-if="selectedOperation === 'edit'">
            <edit-member :member-list="memberList"></edit-member>
        </div>
        <div v-if="selectedOperation === 'delete'">
            <delete-member :member-list="memberList"></delete-member>
        </div>
    </section>
</template>
<script>
import _AddMember from "@/components/MemberOperation/_AddMember";
import _DeleteMember from "@/components/MemberOperation/_DeleteMember";
import _EditMember from "@/components/MemberOperation/_EditMember";

export default {
    name: "vc-member-operation",
    components: {
        "add-member": _AddMember,
        "delete-member": _DeleteMember,
        "edit-member": _EditMember
    },
    props: {
        memberList: {
            type: Object,
            default: () => {}
        },
        password: {
            type: String,
            default: ""
        }
    },
    data() {
        return {
            operationList: {
                add: "ふやす",
                edit: "かえる",
                delete: "けす"
            },
            selectedOperation: "add",
            isAuthorized: false,
            authorizePassword: ""
        };
    }
};
</script>

<style lang="scss" scoped>
.memberOperationListContainer {
    text-align: center;
    margin-bottom: 60px;
}

.memberOperation__operationSelect {
    display: inline-flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-size: 20px;

    label {
        margin-bottom: 10px;
    }
}

.memberOperationComponentContainer {
    margin-bottom: 60px;
}
</style>
