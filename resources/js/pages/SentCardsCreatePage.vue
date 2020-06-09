<template>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Send Cards Lists</div>

            <div class="card-body">
                <card-list :cards="cards" :loading="loading"/>
            </div>
        </div>
    </div>
</template>

<script>
    import {sentCards} from '../http';

    export default {
        name: 'SentCardsCreatePage',

        components: {
            CardList: () => import('../components/CardList')
        },

        data () {
            return {
                cards: [],
                loading: false
            }
        },

        async created () {
            this.loading = true;

            try {
                let cards =  await sentCards();
                this.cards = cards.data;

                this.loading = false;
            } catch (error) {
                this.loading = false;
                notify_error(error_processing_message())
            }
        }
    }
</script>
