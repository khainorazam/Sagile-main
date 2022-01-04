
<template>
  <form
    class="relative mb-3 flex flex-col justify-between bg-white rounded-md shadow overflow-hidden"
    @submit.prevent="handleAddNewTask"
  >

    <div class="p-3 flex-1">
      <input
        class="block w-full px-2 py-1 mb-4 text-lg border-b border-blue-800 rounded"
        type="text"
        placeholder="Enter a title"
        v-model.trim="newTask.title"
      />

      <div class="block w-full">
      <label class="text-lg">Sprint ID :</label>
      <v-select v-model="sprinte" class="bg-blue-300 text-white mb-4 mt-4 border-black-800 rounded" label="sprint" :options="sprints" :getOptionLabel="sprint => sprints" v-model.trim="newTask.sprint_id">

      </v-select>
      </div>

      <div class="block w-full">
      <label class="text-lg">User Story ID :</label>
      <v-select v-model="userstorye" class="bg-blue-300 text-white mt-4 border-black-800 rounded" label="userstory" :options="userstories" :getOptionLabel="userstory => userstories" v-model.trim="newTask.u_id"></v-select>
      </div>

      <!--

      <div class="block w-full">
      <label class="text-lg">User Story ID :</label>
      <select class="bg-blue-300 text-white mt-4 border-black-800 rounded" v-model="selected" v-model.trim="newTask.u_id">
      <option>A</option>
       
      </select>
      </div>
      -->

      <input
        class="block w-full px-2 py-1 mt-4 text-lg border-b border-blue-800 rounded"
        type="text"
        placeholder="Task ID"
        v-model.trim="newTask.id"
      />

      <textarea
        class="mt-3 mb-2 p-2 block w-full p-1 border text-sm rounded"
        rows="2"
        placeholder="Add a description (optional)"
        v-model.trim="newTask.description"
      ></textarea>

      <div class="mb-64">
      <label class="text-lg">Start Date :</label>
      <Datepicker v-model="start_date"  v-model.trim="newTask.start_date" format="dd-MM-yyyy" class="mr-20 mb-2 mt-2 border-2 border-solid border-black rounded"></Datepicker>
      
      <label class="text-lg">End Date :</label>
      <Datepicker v-model="end_date" v-model.trim="newTask.end_date" format="dd-MM-yyyy" class="mr-20 mb-64 mt-2 border-2 border-black rounded"></Datepicker>

      </div>



      <div v-show="errorMessage">
        <span class="text-xs text-red-500">
          {{ errorMessage }}
        </span>
      </div>
    </div>
    <div class="p-3 flex justify-between items-end text-sm bg-gray-100">
      <button
        @click="$emit('task-canceled')"
        type="reset"
        class="py-1 leading-5 text-gray-600 hover:text-gray-700"
      >
        Cancel
      </button>
      <button
        type="submit"
        class="px-3 py-1 leading-5 text-white bg-orange-600 hover:bg-orange-500 rounded"
      >
        Add
      </button>
    </div>
  </form>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import Vue from 'vue';
import vSelect from 'vue-select';

Vue.component('v-select', vSelect);

export default {
  components:{
    Datepicker
  },
  data: function(){
            return {
              customDate: new Date()
            }
        },

  props: {
    statusId: Number,
    sprint: Array,
    userstory:Array,
    sprinte:"",
    userstorye:"",

    getOptionLabel: {
      type: Function,
      default(option) {
        if (typeof option === 'object') {
          if (!option.hasOwnProperty(this.label)) {
            return console.warn(
              `[vue-select warn]: Label key "option.${this.label}" does not` +
                ` exist in options object ${JSON.stringify(option)}.\n` +
                'https://vue-select.org/api/props.html#getoptionlabel'
            )
          }
          return option[this.label]
        }
        return option
      },
    },
  

  getOptionKey: {
  type: Function,
  default(option) {
    if (typeof option === 'object' && option.id) {
      return option.id
    } else {
      try {
        return JSON.stringify(option)
      } catch(e) {
        return console.warn(
          `[vue-select warn]: Could not stringify option ` +
          `to generate unique key. Please provide 'getOptionKey' prop ` +
          `to return a unique key for each option.\n` +
          'https://vue-select.org/api/props.html#getoptionkey'
        )
        return null
      }
    }
  }
}

},
  data() {
    return {
      sprints: [],
      userstories: [],

      newTask: {
        title: "",
        sprint_id: "",
        u_id: "",
        id:"",
        description: "",
        status_id: null,
        start_date: "",
        end_date: "",
      },
      errorMessage: ""
    };
  },
  mounted() {
    this.newTask.status_id = this.statusId;
    this.sprints = JSON.parse(JSON.stringify(this.sprint));

    this.userstories = JSON.parse(JSON.stringify(this.userstory));

  },
  methods: {

    
    handleAddNewTask() {
      // Basic validation so we don't send an empty task to the server
      if (!this.newTask.title) {
        this.errorMessage = "The title field is required";
        return;
      }

      if (!this.newTask.sprint_id) {
        this.errorMessage = "The Sprint ID field is required";
        return;
      }

      if (!this.newTask.u_id) {
        this.errorMessage = "The User Story field is required";
        return;
      }

      if (!this.newTask.id) {
        this.errorMessage = "The ID field is required";
        return;
      }

      if (!this.newTask.start_date) {
        this.errorMessage = "The start date field is required";
        return;
      }

      if (!this.newTask.end_date) {
        this.errorMessage = "The end date field is required";
        return;
      }

      // Send new task to server
      axios
        .post("/tasks", this.newTask)
        .then(res => {
          // Tell the parent component we've added a new task and include it
          this.$emit("task-added", res.data);
        })
        .catch(err => {
          // Handle the error returned from our request
          this.handleErrors(err);
        });
    },
    handleErrors(err) {
      if (err.response && err.response.status === 422) {
        // We have a validation error
        const errorBag = err.response.data.errors;
        if (errorBag.title) {
          this.errorMessage = errorBag.title[0];
        } else if (errorBag.sprint_id) {
          this.errorMessage = errorBag.sprint_id[0];
        } else if (errorBag.u_id) {
          this.errorMessage = errorBag.u_id[0];
        } else if (errorBag.id) {
          this.errorMessage = errorBag.id[0];
        } else if (errorBag.description) {
          this.errorMessage = errorBag.description[0];
        } else if (errorBag.start_date) {
          this.errorMessage = errorBag.start_date[0];
        } else if (errorBag.end_date) {
          this.errorMessage = errorBag.end_date[0];
        } else {
          this.errorMessage = err.response.message;
        }
      } else {
        // We have bigger problems
        console.log(err.response);
      }
    }
  }
};
</script>
