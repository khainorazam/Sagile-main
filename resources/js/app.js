require("./bootstrap");

window.Vue = require("vue");
import Vue from 'vue';
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';

// Register our components
Vue.component("kanban-board", require("./components/KanbanBoard.vue").default);
Vue.component("addtask-form", require("./components/AddTaskForm.vue").default);
Vue.component('v-select', vSelect);

const app = new Vue({
  el: "#app"
});
