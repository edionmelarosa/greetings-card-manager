<template>
    <div>
        <table 
            class="table table-striped"
            v-if="cards.length > 0">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">To</th>
                <th scope="col">Card</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(card, index) in cards" :key="index">
                <th scope="row">{{card.id}}</th>
                <td v-if="template === 'sent'">{{card.to.name}}</td>
                <td v-else>{{card.from.name}}</td>
                <td>
                    <img :src="card.card_file" 
                        class="rounded w-25 img-thumbnail">
                </td>
            </tr>
        </tbody>
        </table>
        <span v-if="loading">Loading cards...</span>
        <span v-if="cards.length <= 0 && !loading">No cards found!</span>
    </div>
</template>
<script>
export default {
    name: 'CardList',

    props: {
        cards: {
            type: Array,
            default: () => {
                return []
            }
        },
        loading: {
            type: Boolean,
            default: false
        },
        template: {
            type: String,
            default: 'sent'
        }
    }
}
</script>