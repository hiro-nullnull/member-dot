import { createStore } from "vuex";

export default createStore({
  state() {
    return {
      originalMemberList: []
    };
  },
  mutations: {
    initialSetMemberList(state, memberList) {
      state.originalMemberList = memberList;
    },
    filterUpdateMemberList(state, inputMember) {
      const members = Object.values(
        state.originalMemberList[inputMember.member_type]
      );
      state.originalMemberList[inputMember.member_type] = members.filter(
        member => {
          return member.id !== inputMember.id;
        }
      );
    },
    updateMemberList(state, inputMember) {
      const members = Object.values(
        state.originalMemberList[inputMember.member_type]
      );
      state.originalMemberList[inputMember.member_type] = members.map(
        member => {
          return member.id === inputMember.id ? inputMember : member;
        }
      );
    }
  },
  actions: {},
  modules: {}
});
