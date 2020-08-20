@extends('layouts/layouts')

@section('title', 'Max Nierste, Vue Tasks')
@section('content')
<div class="container">
  <h1 class="text-center">Vue Js Examples</h1>
</div>
<div class="sectionBackgroundGray m-t-md p-t-md m-b-md p-b-md">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h3 class="m-b-0 aboutTitle title-color">To Do list Using Vue.Draggable</h3>
        <small class="m-t-0 aboutTitle">Pulls todos from database</small>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="well" id="drag">
          <task-draggable :tasks-completed=" {{ $tasksCompleted }}" :tasks-not-completed=" {{ $tasksNotCompleted }}"></task-draggable>

        </div> <!-- end app -->
      </div>
    </div>
  </div>
</div>


<div class="container">
  <div class="row m-b-md">
    <div class="col-12">
      <h3 class="text-center title-color">Other Example Components</h3>
    </div>
  </div>

  <div class="row">
<!-- example component template with vue -->
    <div class="col-6" id="exampleexample">
      <example-component></example-component>
    </div>
<!-- hover info -->
    <div class="col-6" id="exampleexample">
      <div class="row text-center">
        <div class="col-12">
          <div id="input-alert">
            <div class="row form-group">
              <div class="col-8" style="padding-right:0;
              ">
                <input class="form-control" v-model="message">
              </div>
              <div class="col-4" style="padding-left:0;">
                <button class="btn btn-success btn-block" v-on:click="say('Alert')">Alert</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <hr>
          <div id="hover-message">
            <h5 v-bind:title="message">
              Hover your mouse over me to see more info
            </h5>

          </div>

        </div>
      </div>

      <hr>

    <!-- See hide html -->
      <div class="row text-center" id="seen-hide">
        <div class="col-8">
          <div v-if="seen">
            <h5>Now you see me</h5>
          </div>

        </div>
        <div class="col-4" style="padding-left:0;">
          <button class="btn btn-success btn-block" @click='seeHide()'>See/Hide</button>
        </div>
      </div>
    </div>

  </div>
</div> <!-- end container -->


<div class="sectionBackgroundGray m-t-md m-b-md p-t-md p-b-md">
  <div class="container">
    <div class="row p-b-sm">
      <div class="col-12 text-center aboutTitle">
        <h3>New Instance of Counters Using the Same Component</h3>
        <small>(same template and function is used but each button maintains its own, separate count)</small>
      </div>
    </div>
  <!-- button component counter -->
    <div class="row text-center" id="counter-buttons">
      <div class="col-md-4 col-sm-12" >
        <button-counter></button-counter>
      </div>

      <div class="col-md-4 col-sm-12" >
        <button-counter></button-counter>
      </div>

      <div class="col-md-4 col-sm-12" >
        <button-counter></button-counter>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <div class="row p-b-sm">
    <div class="col-12 text-center">
      <h3>Form Data Manipulation</h3>
    </div>
  </div>

<!-- reverse Message -->
  <div class="row">
    <div class="col-md-4 col-sm-12">
      <div id="reverse-input">
        <h5 class="text-center">@{{ message }}</h5>
        <input class="form-control text-center" v-model="message">
        <button class="btn btn-danger btn-block" v-on:click="reverseMessage">Reverse Message</button>
      </div>
    </div>
    <!--Checkboxes -->
    <div class="col-md-4 col-sm-12 text-center" id="app-8">
      <div class="form-group col-12" >
        <h5>
          <input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
          <label for="jack">Jack</label>
          <input type="checkbox" id="jill" value="Jill" v-model="checkedNames">
          <label for="jill">Jill</label>
          <input type="checkbox" id="mike" value="Mike" v-model="checkedNames">
          <label for="mike">Mike</label>
        </h5>
      </div>
      <div class="col-12">
        Checked names:
      </div>
      <div class="col-12">
        <h5 class=""> @{{ checkedNames }}</h5>
      </div>
    </div>

    <div class="col-md-4 col-sm-12 text-center">
      <div id="app-9" >
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <select class="form-control" v-model="selected" v-on:change="totalprice">
              <option v-for="option in options" v-bind:value="option.value">
                @{{ option.text }}
              </option>
            </select>

          </div>
          <div class="col-md-6 col-sm-12">
            <div class="row">
              <div class="col-12">
                <p class="float-right m-a-0">Selected: $ @{{ selected }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <p class="float-right m-a-0">Tax: $ @{{ tax }}</p>
              </div>
            </div>

            <hr class="p-a-0 m-a-0">
            <div class="row">
              <div class="col-12">
                <p class="float-right ">Total: $ @{{ total }}</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</div><!-- end container -->

<div class="sectionBackgroundGray m-t-md p-t-md">
  <div class="container" id="app-7">

    <!-- TO-DO LIST -->
    <div class="row ">

      <div class="col-12 text-center aboutTitle p-b-md">
        <h3>Grocery List</h3>
        <small>Todo list w/ no tie into database</small>
      </div>
    </div>
    <div class="row m-b-sm">
      <div class="col-8" style="padding-right:0px;">
        <input  class="form-control" v-model="message">

      </div>
      <div class="col-md-4 col-sm-12" style="padding-left:0px;">
        <button class="btn btn-primary btn-block" @click="addTodo">Add Item</button>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header text-center weather-background ">
            <h5 class="aboutTitle">Items</h5>
          </div>
          <div class="card-body">
            <ul class="p-a-0 m-b-sm">
              <!--
                Now we provide each todo-item with the todo object
                it's representing, so that its content can be dynamic.
                We also need to provide each component with a "key",
                which will be explained later.
              -->
              <todo-item class="m-b-sm"
                v-for="(item, index) in groceryList"
                v-bind:todo="item"
                v-bind:key="item.id"
                v-on:remove="removeRow(index)"
                ></todo-item>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
<div>
@endsection
@section('scripts')



<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script>

  Vue.component('button-counter', {
    data: function () {
      return {
        count: 0
      }
    },
    template: '<button class="btn btn-primary" v-on:click="count++">clicked @{{ count }} times.</button>'
  })

  new Vue({ el: '#counter-buttons' })
</script>

<!-- ALERT MESSAGE -->
<script>
  //alert message
  new Vue({
    el: '#input-alert',
    data: {
      message: 'Enter Name'
    },
    methods: {
      say: function () {
        alert(this.message)
      },


    }
  })
</script>
<!-- ALERT MESSAGE #2-->

<script>
  //hover message
  var app2 = new Vue({
    el: '#hover-message',
    data: {
      message: 'You loaded this page on ' + new Date().toLocaleString()
    }
  })
</script>
<script>

  //seen-hide
  var app3 = new Vue({
    el: '#seen-hide',
    data: {
      seen: true
    },
    methods:{
      seeHide: function() {
        this.seen = !this.seen
      }
    }
  })
</script>

<script>
// Define a new component called todo-item
Vue.component('todo-item', {
  // The todo-item component now accepts a
  // "prop", which is like a custom attribute.
  // This prop is called todo.
  props: ['todo'],
  template: '<div class="card">\
                <div class="card-body">\
                  <div class="row">\
                    <div class="col-9">\
                      @{{ todo.text }}\
                    </div>\
                    <div class="col-3 ">\
                      <button class="btn btn-danger float-right" v-on:click="remove">X</button>\
                    </div>\
                  </div>\
                </div>\
              </div>',
  methods: {
    remove() {
      this.$emit('remove');
    }
  }
})

var app7 = new Vue({
  el: '#app-7',
  data: {
    id:3,
    groceryList: [
      { id: 0, text: 'Carrots' },
      { id: 1, text: 'Cheese' },
      { id: 2, text: 'Pork' }
    ],
    message: 'add item'
  },
  methods:{
    addTodo: function() {
      this.groceryList.push({ id: this.id++, text: this.message })
    },
    removeRow(index){
      this.groceryList.splice(index,1); // why is this removing only the last row?
    }


  }
})

</script>

<script>
  var app5 = new Vue({
    el: '#reverse-input',
    data: {
      message: 'Hello Vue!'
    },
    methods: {
      reverseMessage: function () {
        this.message = this.message.split('').reverse().join('')
      }
    }
  })

</script>

<script>

  new Vue({
    el: '#app-8',
    data: {
      checkedNames: []
    }
    })

</script>


<script>
new Vue({
  el: '#app-9',
  data: {
    selected: '6.72',
    salestax: '.07',
    tax: '.47',
    total: '7.19',
    options: [
      { text: 'Pepperoni', value: '8.00' },
      { text: 'Cheese', value: '6.72' },
      { text: 'Vegan', value: '9.98' }
    ]
  },
  methods: {
    totalprice: function () {

      this.tax = parseFloat(this.selected * this.salestax).toFixed(2)
      this.total = (parseFloat(this.selected) + parseFloat(this.tax)).toFixed(2)
      return this.total, this.tax
    }
  }

})

</script>


@endsection
