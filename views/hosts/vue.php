<?php
/**
 * Created by PhpStorm.
 * User: ukerzheng
 * Date: 2017/3/19
 * Time: 21:10
 */

?>

<div style="height: 768px">

    <div id="app">
        {{ message }}
    </div>
    <div id="app-2">
        <span v-bind:title="message">
            Hover your mouse over me for a few seconds to see my dynamically bound title!
        </span>
    </div>
    <div id="app-3">
        <p v-if="seen">Now you see me</p>
    </div>
    <div id="app-4">
        <ol>
            <li v-for="todo in todos">
                {{ todo.text }}
            </li>
        </ol>
    </div>
    <div id="app-5">
        <p>{{ message }}</p>
        <button v-on:click="reverseMessage">Reverse Message</button>
    </div>
---------
    <div id="app-6">
        <p>{{ message }}</p>
        <input v-model="message">
    </div>
---------
    <div id="app-7">
        <ol>
            <!-- Now we provide each todo-item with the todo object    -->
            <!-- it's representing, so that its content can be dynamic -->
            <todo-item v-for="item in groceryList" v-bind:todo="item"></todo-item>
        </ol>
    </div>

-------
    <ul id="example-1">
        <li v-for="item in items">
            {{ item.message }}
        </li>
    </ul>
    --------
    <ul id="example-2">
        <li v-for="(item, index) in items">
            {{ parentMessage }} - {{ index }} - {{ item.message }}
        </li>
    </ul>


</div>
