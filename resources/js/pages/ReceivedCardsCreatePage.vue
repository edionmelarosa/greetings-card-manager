<template>
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Received Cards Lists</div>

            <div class="card-body">
                <card-list :cards="cards" 
                    :loading="loading" 
                    template="received"/>
            </div>
        </div>
    </div>
</template>

<script>
    import {receivedCards} from '../http';

    export default {
        name: 'ReceivedCardsCreatePage',

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
                let cards =  await receivedCards();
                this.cards = cards.data;

                this.loading = false;
            } catch (error) {
                this.loading = false;
                notify_error(error_processing_message())
            }
        }
    }
</script>
