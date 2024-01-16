<template>
    <form @submit.prevent="submitForm">
        <input v-model="feedback.name" type="text" placeholder="Имя">
        <input v-model="feedback.phone" type="text" placeholder="Телефон">
        <textarea v-model="feedback.message" placeholder="Сообщение"></textarea>
        <button type="submit">Отправить</button>
    </form>
</template>

<script>
export default {
    data() {
        return {
            feedback: {
                name: '',
                phone: '',
                message: ''
            }
        };
    },
    methods: {
        async submitForm() {
            await this.$http.post('/api/feedback', this.feedback);
        }
    }
};
</script>
