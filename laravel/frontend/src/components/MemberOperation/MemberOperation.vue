<template>
    <!-- パスワード入力画面 TODO コンポーネント作成 -->
    <div>
        えらばれしものかしょうめいしなさい
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
        }
    },
    data() {
        return {
            operationList: {
                add: "ふやす",
                edit: "かえる",
                delete: "けす"
            },
            selectedOperation: "edit"
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
