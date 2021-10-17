<template>
    <v-card class="py-12">
        <v-card-text>
            <DialogSection icon="mdi-square" :color="color">
                <v-text-field v-model="name" label="カレンダー名"></v-text-field>
            </DialogSection>
            <DialogSection icon="mdi-palette">
                <ColorForm v-model="color" />
            </DialogSection>
        </v-card-text>
        <v-card-actions class="d-flex justify-end">
            <v-btn @click="close">キャンセル</v-btn>
            <v-btn @click="submit">保存</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
import { mapActions, mapGetters } from 'vuex';
import ColorForm from '../form/ColorForm';
import DialogSection from '../pageParts/DialogSection';

export default {
    name: 'CalendarFormDialog',
    components: {DialogSection, ColorForm},
    data: () => ({
        name: '',
        color: null,
    }),
    computed: {
        ...mapGetters('calendars', ['calendar']),
    },
    created(){
        this.name = this.calendar.name;
        this.color = this.calendar.color;
    },
    methods: {
        ...mapActions('calendars', ['createCalendar', 'setCalendar']),
        close(){
            this.setCalendar(null);
        },
        submit(){
            const user_id = document.getElementById('user_id').value;
            
            const params = {
                ...this.calendar,
                name: this.name,
                color: this.color,
                user_id: user_id,
            };
            if(params.id){
                this.updateCalendar(params);
            }else{
                this.createCalendar(params);
            }
            this.close();
        }
    }
}
</script>