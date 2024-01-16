<template>
    <div>
        <h2>Список обратной связи</h2>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(feedback, index ) in feedbackList" :key="index">
                <td>{{ feedback.name }}</td>
                <td>{{ feedback.phone }}</td>
                <td>{{ feedback.message }}</td>
                <td>{{ feedback.created_at }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        feedbackList: Array, // Принимаем список обратной связи в виде пропса
    },
};
</script>

<style scoped>

h2 {
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background-color: #007bff;
    color: #fff;
}

th, td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}
</style>
