<template>
    <div>
        <h2>Форма обратной связи</h2>
        <form @submit.prevent="submitFeedback" class="form-container">
            <div class="form-group">
                <label for="name">Имя:</label>
                <input v-model="formData.name" type="text" id="name" required>
                <span v-if="errors.name" class="error">{{ errors.name[0] }}</span>
            </div>
            <div class="form-group">
                <label for="phone">Телефон:</label>
                <input v-model="formData.phone" type="text" id="phone" required>
                <span v-if="errors.phone" class="error">{{ errors.phone[0] }}</span>
            </div>
            <div class="form-group">
                <label for="message">Сообщение:</label>
                <textarea v-model="formData.message" id="message" rows="4" required></textarea>
                <span v-if="errors.message" class="error">{{ errors.message[0] }}</span>
            </div>
            <button type="submit" class="submit-button">Отправить</button>
        </form>

        <!-- Отображаем список обратной связи -->
        <FeedbackList :feedbackList="feedbackList" />
    </div>
</template>
<script>
import FeedbackList from './FeedbackList.vue'; // Импортируем компонент

export default {
    components: {
        FeedbackList
    },
    data() {
        return {
            formData: {
                name: '',
                phone: '',
                message: '',
            },
            errors: {},
            feedbackList: []
        };
    },
    created() {
        // Выполняем запрос к серверу для загрузки списка обратной связи
        this.loadFeedbackList();
    },
    computed: {
        feedbackList() {
            return this.$store.state.feedbackList; // Получаем список обратной связи из стейта
        },
    },
    methods: {
        async loadFeedbackList() {
            await this.$store.dispatch('fetchFeedbackList');
        },
        async submitFeedback() {
            // Сбрасываем предыдущие ошибки валидации
            this.errors = {};

            // Валидация перед отправкой данных на сервер
            const isValid = this.validateForm();

            if (!isValid) {
                return;
            }

            try {
                // Отправляем данные формы на сервер
                await this.$store.dispatch('createFeedback', this.formData);

                // После успешной отправки очищаем форму
                this.formData = {
                    name: '',
                    phone: '',
                    message: '',
                };
            } catch (error) {
                console.error('Ошибка при отправке обратной связи:', error);
            }
        },
        validateForm() {
            const errors = {};

            if (!this.formData.name) {
                errors.name = ['Поле "Имя" обязательно для заполнения'];
            }

            if (!this.formData.phone) {
                errors.phone = ['Поле "Телефон" обязательно для заполнения'];
            } else if (!/^\d+$/.test(this.formData.phone)) {
                errors.phone = ['Поле "Телефон" должно содержать только цифры'];
            }

            if (!this.formData.message) {
                errors.message = ['Поле "Сообщение" обязательно для заполнения'];
            }

            this.errors = errors;

            return Object.keys(errors).length === 0;
        },
    },
};
</script>

<style scoped>
.error {
    color: red;
}

.form-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f8f8f8;
}

.form-group {
    margin-bottom: 15px;
}

h2 {
    text-align: center;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.error {
    color: red;
}

</style>
