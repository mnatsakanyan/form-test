
<template>
  <div class="container mt-5">
          <div class="container mt-5">
        <form :action="formAction" method="POST" v-on:submit.prevent="onSubmit">
            <input type="hidden" name="_token" :value="csrf">
            <div class="row">
                <div class="col">
                    <div class="form-group" v-for="(item, index) in items">
                        <input type="text" class="form-control" v-model="item.value" :readonly="view"
                               v-on:keydown.enter.prevent="onEnter" v-on:keyup.delete.prevent="onDelete(item.value, index)" ref="input">
                    </div>
                </div>
                <div class="col text-right">
                    <button type="button" class="btn btn-dark" v-on:click="onEdit">View / Edit</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
</template>

<script lang="ts">
import { Vue, Component, Prop } from "vue-property-decorator";
import axios from 'axios'

@Component
export default class ItemsComponent extends Vue {
    $refs:{input:any} = {input: []}
    @Prop() formAction!: string;
    @Prop() csrf!: string;
    items: Array<any> = [];
    view:boolean =  true;

   onEdit() {
        if(! (this.view = !this.view)) {
            let index = this.items.length - 1;
            let input = this.$refs.input[index];
                    input.focus();
        }
    };

    onSubmit() {
        axios
            .post(this.formAction, {
                items: this.items
            })
            .then(response => {
                this.items = response.data.values;

                    if(! this.items.length) {
                        this.items.push({});
                        this.$nextTick(() => {
                        let input = this.$refs.input[0];
                            input.focus();
                        });
                    }
                });
            };

    onEnter() {
        if(! this.view) {
            this.items.push({});
            this.$nextTick(() => {
                    let index = this.items.length - 1;
                    let input = this.$refs.input[index];
                    input.focus();
            });
        }
    };

    onDelete(value:any, index:any) {
        if(value === '') {
            this.items.splice(index, 1);
                this.$nextTick(() => {
                    let input = this.$refs.input[this.items.length - 1];
                    input.focus();
                });
            }
        };

    mounted() {

        axios
            .get(this.formAction)
            .then(response => {
                this.items = response.data.values;
                if(! this.items.length) {
                    this.items.push({});
                    this.$nextTick(() => {
                        let input = this.$refs.input[0];
                        input.focus();
                    });
                    this.view = false;
                }
            });
    }
}
</script>

<style>
    form {
        padding: 15px;
        border: 1px solid #000;
        min-height: 400px;
    }

    .form-control[readonly] {
        border: none;
        box-shadow: none;
    }
</style>
