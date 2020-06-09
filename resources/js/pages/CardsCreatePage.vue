<template>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Create Card</div>

            <div class="card-body">
                <form>
                    <div class="form-group">
                        <div class="canvas-container w-full">
                            <canvas id="cardCanvas" 
                                width="400" 
                                height="400"
                                style="border:1px solid #ccc">
                            </canvas>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="canvas-text">Add Text</label>
                        <input type="text" 
                            class="form-control w-50"
                            id="canvas-text"
                            v-model="text">
                        <button class="btn btn-sm btn-info mt-2"
                            @click.prevent="addText">Add Text</button>
                    </div>

                    <div class="form-group">
                        <label for="canvas-bg-color">Background Color</label>
                        <photoshop v-model="colors"/>
                    </div>
                    <hr>
                    <button type="submit" 
                        class="btn btn-primary"
                        :disabled="saving"
                        >{{saving ? 'Sending...' : 'Send'}}</button>

                    <button type="button" 
                        class="btn btn-info"
                        @click.prevent="exportCanvas"
                        >Export</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import mixins from '../mixins';
    import {fabric} from 'fabric';
    import {otherUsers, sendCard} from '../http';
    import { Photoshop } from 'vue-color'

    export default {
        name: 'CardsCreatePage',
        mixins: [mixins],

        components: {
            Photoshop
        },

        watch: {
            colors: function(val) {
                this.canvasInstance.backgroundColor = this.colors.hex;
                this.canvasInstance.renderAll(); 
            }
        },

        data () {
            return {
                colors: {
                    hex: '#72BA96',
                    hsl: { h: 150, s: 0.5, l: 0.2, a: 1 },
                    hsv: { h: 150, s: 0.66, v: 0.30, a: 1 },
                    rgba: { r: 25, g: 77, b: 51, a: 1 },
                    a: 1
                },

                text: 'Sample text',

                canvas: {},
                canvasInstance: {},
                error: {},
                cardUrl: null,
                form: {},
                users: [],
                saving: false
            }
        },

        methods: {
            onCanvasBgColorChange() {
                this.canvasInstance.backgroundColor = this.canvas.bgColor;
                this.canvasInstance.renderAll();
            },

            addText: function() {
                this.addTextToCanvas(this.text);
            },

            addTextToCanvas(text) {
                if (!text) {
                   return; 
                }

                let newID = (new Date()).getTime().toString().substr(5);
                let newText = new fabric.IText(text, {
                    fontFamily: 'arial black',
                    left: 100,
                    top: 100,
                    myid: newID,
                    objecttype: 'text'
                });

                this.canvasInstance.add(newText);
            },

            async submit () {
                if (this.saving) {
                    return; 
                }

                this.saving = true;

                let formData = new FormData;

                formData.append('to', this.form.to ?? '');
                formData.append('card', this.form.card ?? '');

                try {
                    let response = await sendCard(formData);

                    notify_success('Greeting Card Succesfully sent!');
                    this.saving = false;
                } catch (error) {
                    this.saving = false;
                    this.error = error.response.data; 
                }
            },

            exportCanvas() {
                let canvas  = document.querySelector( 'canvas' );
                let link = document.createElement('a');

                link.innerHTML = 'download image';
                link.addEventListener('click', function(ev) {
                    link.href = canvas.toDataURL();
                    link.download = "mypainting.png";
                }, false);

                link.click();
            }
        },

        async created () {
            // this.loading = true;

            // try {
            //     let users =  await otherUsers();
            //     this.users = users.data;

            //     this.loading = false;
            // } catch (error) {
            //     this.loading = false;
            //     this.error = error.response.data;
            //     notify_error(error_processing_message())
            // }
        },

        mounted () {
            this.canvasInstance = new fabric.Canvas('cardCanvas');
            this.canvasInstance.backgroundColor = this.colors.hex;
            this.canvasInstance.renderAll(); 
        }
    }
</script>