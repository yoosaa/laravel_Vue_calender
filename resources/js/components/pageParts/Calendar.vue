<template>
    <div>
        <v-sheet height="100vh">
            <v-calendar
                v-model="value"
                :events="events"
                @change="fetchEvent"
            ></v-calendar>
        </v-sheet>
    </div>
</template>

<script>
export default {
    name: 'Calendar',
    data: () =>({
        value: new Date('2021/09/01'),
        events: [],
    }),
    methods: {
        fetchEvent() {
            axios.get('/api/event')
                .then(response => {
                    this.events = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }
}
</script>