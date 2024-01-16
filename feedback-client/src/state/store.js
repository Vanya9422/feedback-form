import Vuex from 'vuex';
import axiosInstance from '../config/axiosConfig.js';

export const store = new Vuex.Store({
    state: {
        feedbackList: [],
    },
    mutations: {
        setFeedbackList(state, feedbackList) {
            state.feedbackList = feedbackList;
        },
        addFeedback(state, feedback) {
            state.feedbackList.unshift(feedback);
        },
    },
    actions: {
        async fetchFeedbackList({ commit }) {
            try {
                const { data: {data: data} } = await axiosInstance.get('feedback');

                commit('setFeedbackList', data);
            } catch (error) {
                console.error('Ошибка при загрузке списка обратной связи:', error);
            }
        },
        async createFeedback({ commit }, feedbackData) {
            try {
                const { data: {data: data} } = await axiosInstance.post('feedback', feedbackData); // Уберите response

                commit('addFeedback', data); // После создания фидбека добавляем его в массив
            } catch (error) {
                console.error('Ошибка при создании обратной связи:', error);
            }
        },
    },
});
