<template>
    <div>
        <v-sheet height="6vh" class="d-flex align-center">
            <v-btn outlined small class="ma-4" @click="setToday">TODAY</v-btn>
            <v-btn icon @click="$refs.calendar.prev()">
                <v-icon>mdi-chevron-left</v-icon>
            </v-btn>
            <v-btn icon @click="$refs.calendar.next()">
                <v-icon>mdi-chevron-right</v-icon>
            </v-btn>
            <v-toolbar-title>{{ title }}</v-toolbar-title>
        </v-sheet>
        <v-sheet height="94vh">
            <v-calendar
                ref="calendar"
                v-model="value"
                :events="events"
                @change="fetchEvents"
                locale="ja-jp"
                :day-format="(timestamp) => new Date(timestamp.date).getDate()"
                :month-format="(timestamp) => (new Date(timestamp.date).getMonth() + 1)"
                @click:event="showEvent"
            ></v-calendar>
        </v-sheet>

        <!--イベント詳細ダイアログ　追加-->
        <v-dialog :value="event !== null" @click:outside="closeDialog" width="600">
            <EventFormDetailDialog v-if="event !== null" />
        </v-dialog>
        <!--イベント詳細ダイアログ　追加ここまで-->

    </div>
</template>

<script>
import {format} from 'date-fns';
import {mapGetters, mapActions} from 'vuex';
import EventFormDetailDialog from '../events/EventFormDetailDialog';
// import EventFormDialog from '../events/EventFormDialog';

export default {
    name: 'Calendar',
    data: () =>({
        value: format(new Date(), 'yyyy/MM/dd'),
    }),
    components: {
        EventFormDetailDialog,
    },
    computed: {
        ...mapGetters('events', ['events', 'event']),
        title() {
            return format(new Date(this.value), 'yyyy/MM/dd');
        }
    },
    methods: {
        ...mapActions('events', ['fetchEvents', 'setEvent']),
        setToday() {
            this.value = format(new Date(), 'yyyy/MM/dd')
        },
        showEvent({event}){
            this.setEvent(event);
        },
        closeDialog(){
            this.setEvent(null);
        }
    }
}
</script>