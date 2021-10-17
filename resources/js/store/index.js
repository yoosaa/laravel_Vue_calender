import Vue from 'vue';
import Vuex from 'vuex';
import calendars from './modules/calendars';
import events from './modules/events';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        events,
        calendars,
    },
});
